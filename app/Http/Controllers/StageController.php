<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StageRequest;
use App\Course;
use App\Stage;
use App\Http\Utilities\UrlSanitizer;

class StageController extends Controller
{
      function __construct(){
        $this->middleware('SetStagePosition', ['only' => ['store']]);
        $this->middleware('CheckStage:url', ['only' => ['edit']]);
        $this->middleware('CheckStage:id', ['only' => ['destroy', 'update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_url)
    {
        $curso = Course::where('url',$course_url)->first();
        $etapas = Stage::where('course_id', $curso->id)->get();
        return view('pages.etapas.index', ['curso'=>$curso, 'etapas'=>$etapas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_url)
    {
        $curso = Course::where('url',$course_url)->first();
        return view('pages.etapas.create', ['curso'=>$curso]);
    }

    /**
     * Guarda un nuevo stage, el ID del curso se agrega en el middleware
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StageRequest $request, $course_url)
    {   
        $name = $request->name;
        $url = UrlSanitizer::sanitize($name);
        $request["url"] = $url;

        $stage = Stage::create($request->all());
        return redirect()->route('stages.index', ['course_url'=>$course_url]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_url, $url)
    {
        $curso = Course::where('url',$course_url)->first();
        $etapa = Stage::where('url',$url)->first();
        return view('pages.etapas.edit', ['curso'=>$curso, 'etapa'=>$etapa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StageRequest $request, $course_url, $id)
    {
        $name = $request->name;
        $url = UrlSanitizer::sanitize($name);
        $request["url"] = $url;

        $stage = Stage::find($id);
        $stage->update($request->all());

        return redirect()->route('stages.index', ['course_url'=> $course_url]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_url, $id)
    {
        Stage::destroy($id);
        return redirect()->route('stages.index', ['course_url'=> $course_url]);
    }
}
