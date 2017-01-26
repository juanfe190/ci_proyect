<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

class DashboardController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	$url = Storage::url('introductions/video-QAgIOTWc8u.mp4');
    	return view('pages.home')->with('url', $url);
    }
}
