<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UsuarioRequest;
use App\User;
use App\Rol;
use App\PassReset;
use App\Http\Utilities\PasswordGenerator;
use App\Http\Utilities\Usernamegenerator;
use App\Http\Utilities\EmailSender;

class UserController extends Controller
{
    function __construct(){
        $this->middleware('CheckUser:username', ['only' => ['edit']]);
        $this->middleware('CheckUser:id', ['only' => ['destroy', 'update']]);
    }


    /**
     * Muestra el view usuarios.index con todos los usuarios
     * del sistema
     *
     */
    public function index(){
        $users = User::all();
        return view('pages.usuarios.index')->with('users',$users);
    }


      /**
     * Muestra el view usuarios.create con todos los roles
     * del sistema
     *
     */
    public function create(){
        $rols = Rol::orderBy('rol_name')->pluck('rol_name', 'id');
    	return view('pages.usuarios.create')->with('rols', $rols->toArray());
    }


     /**
     * Almacena el usuario en la base de datos.
     * La informacion es validad en el request.
     * La contrasena es generada y guardada en la table 'pasword_resets'
     *
     * @param App\Http\Requests\UsuarioRequest;
     * @return view users.index
     */
    public function store(UsuarioRequest $request){
    	$user = User::create($request->all());
        $user->username = Usernamegenerator::generate($request);
        $user->save();

        $password=PasswordGenerator::generate();
        PassReset::create(['email'=>$user->email, 'password'=>$password['hashed']]);
        EmailSender::sendUserInfo($password['plain'], $user);
        return redirect()->route('users.index');
    }


    /** 
    * Muestra la vista users.edit con los datos del usuario
    * a editar
    * @param String username
    * @return view users.edit with User and Rol
    */
    public function edit($name){
        $user = User::where('username', $name)->first();
        $rols =Rol::orderBy('rol_name')->pluck('rol_name', 'id');
        return view('pages.usuarios.edit')->with(['user'=>$user, 'rols'=>$rols]);
    }


    /** 
    * Actualiza el usuario en la BD
    * @param App\Http\Requests\
    * @param int id
    */
    public function update(UsuarioRequest $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
