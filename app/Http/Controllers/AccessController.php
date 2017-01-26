<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\AccessRequest;

class AccessController extends Controller
{
    
    public function __construct(){
        $this->middleware('login', ['only' => 'login']);
        $this->middleware('guest', ['except' => 'logout']);
    }

    /*
     * Author: Kenneth Chévez
     * Muestra pantalla de login al sistema
     *
     * @return view
     */
    
    public function showLogin(){
    	return view('pages.login');
    }
    
    
    public function login(AccessRequest $request){
    	return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
