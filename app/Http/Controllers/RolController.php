<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;
use Auth;
use App\Http\Requests\RolRequest;
use App\Rol;

class RolController extends Controller
{
    function __construct(){
        $this->middleware('CheckRol:name', ['only' => ['edit']]);
        $this->middleware('CheckRol:id', ['only' => ['destroy', 'update']]);
        $this->middleware('CheckRolUserRelation', ['only' => ['destroy']]);
    }

    /**
     * Muestra vista roles con un arreglo de roles
     *
     * @return view pages.roles.index
     */
    public function index(){
        $rols = Rol::all();
    	return view('pages.roles.index')->with('rols',$rols);
    }

    public function create(){
    	return view('pages.roles.create');
    }

    public function store(RolRequest $request){
    	$rol = Rol::create($request->all());
    	//Log::info('El usuario '.Auth::user()->username.' ha agregado un rol.'. $rol->toArray());
    	return redirect()->route('roles.index');
    }

    public function edit($name){
        $rol = Rol::where('rol_name', $name)->first();
        return view('pages.roles.edit')->withRol($rol);
    }

     /**
     * Actualiza el rol con el respectivo id
     *
     * @param App\Http\Requests
     * @param  string $id
     * @return view pages.roles.index
     */
    public function update(Request $request, $id){
        $rol = Rol::find($id);
        $rol->update($request->all());
        return redirect()->route('roles.index');
    }

     /**
     * Elimina el rol con el respectivo id
     *
     * @param  string $id
     * @return view pages.roles.index
     */

    public function destroy($id){
        Rol::destroy($id);
        return redirect()->route('roles.index');
    }
}
