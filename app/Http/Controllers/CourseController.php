<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CourseRequest;
use App\Category;
use App\Course;
use App\Difficulty;
use App\Http\Utilities\UrlSanitizer;

class CourseController extends Controller
{


    function __construct(){
        $this->middleware('CheckCategoryNotEmpty', ['only' => ['create']]);
        $this->middleware('VideoCourseCode', ['only' => ['store']]);
        $this->middleware('CheckCourse:url', ['only' => ['edit']]);
        $this->middleware('CheckCourse:id', ['only' => ['destroy', 'update']]);
    }
    
	/**
	 *
     * Muestra el view cursos.index con todos las cursos
     *
     */
    public function index(){
        $cursos = Course::all();
        return view('pages.cursos.index', ['cursos' => $cursos]);
    }


    /*
    * Retorna view con array de categorias
    *
    * @author Felix Vasquez
    */
    public function create(){
        $categorias = Category::all()->pluck('name', 'id');
        $difficulties = Difficulty::all()->pluck('name', 'id');
        return view('pages.cursos.create', ['categorias' => $categorias->toArray(), 'difficulties' => $difficulties->toArray()]);
    }


    /*
    * Guarda el curso en la BD
    *
    * @author Felix Vasquez
    */
    public function store(CourseRequest $request){
        $name = $request->name;
        $url = UrlSanitizer::sanitize($name);
        $request["url"] = $url;

        Course::create($request->all());
        return redirect()->route('courses.index');
    }

    /**
    * Retorna view con la informacion del curso
    *
    * @param String: url
    */
    public function edit($url){
        $curso = Course::where('url',$url)->first();
        $categorias = Category::all()->pluck('name', 'id');
        $difficulties = Difficulty::all()->pluck('name', 'id');
        return view('pages.cursos.edit', ['curso'=>$curso, 'categorias'=>$categorias->toArray(), 'difficulties' => $difficulties->toArray()]);
    }

    /**
    * Actualiza un curso por su ID
    * 
    * @param Request
    * @param Int id
    */
    public function update(CourseRequest $request, $id){
        $name = $request->name;
        $url = UrlSanitizer::sanitize($name);
        $request["url"] = $url;

        $curso = Course::find($id);
        $curso->update($request->all());

        return redirect()->route('courses.index');
    }

    /**
    * Elimina curso
    *
    * @param Int id
    */
    public function destroy($id){
        Course::destroy($id);
        return redirect()->route('courses.index');
    }

}
