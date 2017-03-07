<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Http\Utilities\UrlSanitizer;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('CheckCategory:url', ['only' => ['edit']]);
        $this->middleware('CheckCategory:id', ['only' => ['destroy', 'update']]);
    }
    
    /**
     * Muestra el view categorias.index con todas las categorias
     * del sistema
     *
     */
    public function index(){
        $categorias = Category::all();
        return view('pages.categorias.index', ['categorias'=>$categorias]);
    }

    /**
     * Muestra el view categorias.create 
     *
     */
    public function create(){
    	return view('pages.categorias.create');
    }

    /**
    * Almacena la nueva categoria
    *
    * @param CategoryRequest
    */
    public function store(CategoryRequest $request){
        $name = $request->name;
        $url = UrlSanitizer::sanitize($name);
        $request["url"] = $url;

        $categoria = Category::create($request->all());
        return redirect()->route('categories.index');
    }

    /**
    * Devulve view categories.edit con la informacion de la categoria
    *
    * @param String name
    */
    public function edit($url){
        $categoria = Category::where('url',$url)->first();
        return view('pages.categorias.edit')->with('category',  $categoria);
    }

    /**
    * Actualiza la categoria en la BD
    * 
    * @param CategoryRequest
    * @param int id
    */
    public function update(CategoryRequest $request, $id){
        $name = $request->name;
        $url = UrlSanitizer::sanitize($name);
        $request["url"] = $url;

        $categoria = Category::find($id);
        $categoria->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
    * Elimina la cateogira de la BD
    *
    * @param int id
    */
    public function destroy($id){
        Category::destroy($id);
        return redirect()->route('categories.index');
    }
    
}
