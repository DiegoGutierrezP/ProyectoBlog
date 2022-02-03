<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        //aplicacion de middleware para proteger rutas
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.edit')->only('edit','update');
        $this->middleware('can:admin.categories.create')->only('create','store');
        $this->middleware('can:admin.categories.destroy')->only('destroy');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion formulario
        $request->validate([
            'name'=> 'required',
            'slug'=>'required|unique:categories',/* este campo tiene que ser unico en la tabla categories de la bd */
        ]);

        $category = Category::create($request->all());

        return redirect()->route('admin.categories.edit',$category)->with('msginfo', 'La categoria se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //validacion formulario
        $request->validate([
            'name'=> 'required',
            'slug'=>"required|unique:categories,slug,$category->id",/* valida que la category sea unica pero excepto la categoria a la que queremos actualizar */
        ]);

        $category->update($request->all());

        //redireccionamos y enviamos mensaje de sesion
        return redirect()->route('admin.categories.edit',$category)->with('msginfo', 'La cateogria se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('msginfo', 'La categoria se elimino con exito');
    }
}
