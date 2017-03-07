<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	$url = Storage::url('introductions/video-QAgIOTWc8u.mp4');
    	$categorias = 
	    	DB::table('categories')
				->select(
					'categories.*',
					DB::raw('(SELECT count(stages.id) from stages WHERE stages.id = courses.id) AS stages '), 
					'difficulty.name AS difficulty',
					'courses.name AS course_name',
					'courses.description AS course_description')
				->join('courses', 'courses.category_id', '=', 'categories.id')
				->leftJoin('difficulty', 'courses.difficulty_id', '=', 'difficulty.id')
				->get();

    	return view('pages.home', ['url' => $url, 'categorias' => $categorias]);
    }
}
