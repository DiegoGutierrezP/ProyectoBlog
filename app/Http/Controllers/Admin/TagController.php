<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
         //aplicacion de middleware para proteger rutas
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.edit')->only('edit','update');
        $this->middleware('can:admin.tags.create')->only('create','store');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $colors=[
            'red'=>'rojo',
            'blue'=>'azul',
            'yellow'=>'amarillo',
            'indigo'=>'indigo',
            'pink'=>'rosado',
            'purple'=>'purple'
        ];
        return view('admin.tags.create',compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug'=>'required|unique:tags',/* unico en la tabla tags */
            'color'=>'required'
        ]);

        $tag  = Tag::create($request->all());

        return redirect()->route('admin.tags.edit',compact('tag'))->with('msginfo','La etiqueta se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show',compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $colors=[
            'red'=>'rojo',
            'blue'=>'azul',
            'yellow'=>'amarillo',
            'indigo'=>'indigo',
            'pink'=>'rosado',
            'purple'=>'purple'
        ];

        return view('admin.tags.edit',compact('tag','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug'=>"required|unique:tags,slug,$tag->id",/* unico en la tabla tags */
            'color'=>'required'
        ]);

        $tag->update($request->all());

        return redirect()->route('admin.tags.edit',$tag)->with('msginfo','La etiqueta de actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('msginfo','La etiqueta se elimino con exito');
    }
}
