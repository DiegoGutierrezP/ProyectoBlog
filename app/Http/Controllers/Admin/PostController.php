<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
         //aplicacion de middleware para proteger rutas
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories= Category::all();
        $categories= Category::pluck('name','id');/* genera una array pero solo toma el campo name y id, en formato atributo valor */
        $tags = Tag::all();
        //return $categories;
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //return Storage::put('posts',$request->file('file'));/* primer parametro le pasamos la carpeta donde queremos q se guarde, segundo parametro donde se encuentra la img actualmente q es en una carpeta temporal*/

        //el id del usuario q ha creado el post lo pasamos con observer PostObserver

        $post = Post::create($request->all());

        if($request->file('file')){//si hay imagen
           $url = Storage::put('posts',$request->file('file'));
           $post->image()->create([
               'url' => $url
           ]);
        }

        if($request->tags){
            //relacion muchos a muchos
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.edit',$post)->with('msginfo','El post se creo correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //policy creada // autorizacion para que el usuario no pueda ver post q no le pertnecen
        $this->authorize('author',$post);
        //
        $categories= Category::pluck('name','id');/* genera una array pero solo toma el campo name y id, en formato atributo valor */
        $tags = Tag::all();

        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        //policy creada // autorizacion para que el usuario no pueda ver post q no le pertnecen
        $this->authorize('author',$post);
        //

      $post->update($request->all());

      if($request->file('file')){
          $url = Storage::put('posts',$request->file('file'));

        if($post->image){//si el post tiene imagen
            //eliminamos imagen relacionado al post
            Storage::delete($post->image->url);
            //actualizamos la tabla images
            $post->image()->update([
                'url' => $url,
            ]);
        }else{
            $post->image()->create([
                'url' => $url,
            ]);
        }
      }

      if($request->tags){
            //relacion muchos a muchos para actualizar
            $post->tags()->sync($request->tags);//sync(), si madamos etiquetas q ya estan registradas ya no lo va actualizar y si no hay la etiqueta en la coleccion q le mandamos lo va eliminar
        }

      return redirect()->route('admin.posts.edit',$post)->with('msginfo','El post se actualizo con exito');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        //policy creada // autorizacion para que el usuario no pueda ver post q no le pertnecen
        $this->authorize('author',$post);
        //

        /*
        Storage::delete($post->image->url);//eliminamos imagen relacionado al post
        $post->image()->delete(); */
        //el borrado de la imagen lo hacemos con observers , en ves de hacerlo aca

        $post->delete();

        return redirect()->route('admin.posts.index')->with('msginfo','El post se elimino con exito');
    }
}
