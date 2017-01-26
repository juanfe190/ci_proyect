<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ItemRequest;
use App\Course;
use App\Stage;
use App\Item;
use App\ItemType;
use App\Http\Utilities\UrlSanitizer;


class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('SetItemPosition', ['only' => ['store']]);
        $this->middleware('ItemCode', ['only' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_url, $stage_url)
    {
    	$curso = Course::where('url',$course_url)->first();
        $etapa = Stage::where('url', $stage_url)->where('course_id', $curso->id)->first();
        $items = Item::where('stage_id', $etapa->id)->get();
        return view('pages.items.index', ['curso'=>$curso, 'etapa'=>$etapa, 'items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_url, $stage_url)
    {
        $curso = Course::where('url',$course_url)->first();
        $etapa = Stage::where('url', $stage_url)->where('course_id', $curso->id)->first();
        $tiposItem = ItemType::all()->pluck('name', 'id');
        return view('pages.items.create', ['curso'=>$curso, 'etapa'=>$etapa, 'tiposItem'=>$tiposItem]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request, $course_url, $stage_url)
    {
        $name = $request->name;
        $url = UrlSanitizer::sanitize($name);
        $request["url"] = $url;

        $item = Item::create($request->all());

        return redirect()->route('items.index', ['course_url' => $course_url, 'stage_url' => $stage_url]);
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
    public function edit($course_url, $stage_url, $url)
    {
        $curso = Course::where('url',$course_url)->first();
        $etapa = Stage::where('url',$stage_url)->first();
        $item = Item::where('url',$url)->first();
        $tiposItem = ItemType::all()->pluck('name', 'id');

        return view('pages.items.edit', ['curso'=>$curso, 'etapa'=>$etapa, 'item'=>$item, 'tiposItem'=>$tiposItem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $course_url, $stage_url, $id)
    {
        return 'hola mundo';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($course_url, $stage_url, $id)
    {
        Item::destroy($id);
        return redirect()->route('items.index', ['course_url'=> $course_url, 'stage_url'=>$stage_url]);
    }
}
