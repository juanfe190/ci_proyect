<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Utilities\PasswordGenerator;
use App\PassReset;
use App\User;
use Hash;
use App\Http\Utilities\EmailSender;

class PassResetsController extends Controller
{
	function __construct(){
        $this->middleware('CheckIfResetExists', ['only' => ['index']]);
		$this->middleware('CheckPassOnReset', ['only' => ['store']]);
        $this->middleware('CheckUser:email', ['only' => ['forgotpassword']]);
	}

    /**
     * Muestra el view pages.password_reset con el la info
     * del password_resets table que se va a cambiar
     *
     * @param int id
     * @return view
     */
    public function index($id){
    	$passResetInfo = PassReset::find($id);
    	return view('pages.password_reset')->with('passResetInfo', $passResetInfo);
    }

    /**
     * Realiza el cambia de la nueva password en la tabla 'users'
     * Elimina el registro de la tabla 'password_resets'
     *
     * @param App\Http\Requests
     * @param int id
     *
     * @return route 
     */
    public function store(Request $request, $id){
    	$passResetInfo = PassReset::find($id);
    	$newPass = $request->new_password;
    	$user = User::where('email', $passResetInfo->email)->first();

    	$user->password = Hash::make($newPass);
    	$user->save();

    	$passResetInfo->delete();
    	return redirect()->route('showLogin');
    }

    /**
     * Funcionalidad cuando el usuario pierde la contrasena
     *
     * @param App\Http\Requests
     *
     * @return route 
     */
    public function forgotpassword(Request $request){
        $password = PasswordGenerator::generate();
        PassReset::create(['email'=>$request->email, 'password'=>$password['hashed']]);

        //MODIFICAR EMAIL
        EmailSender::sendResetPassInfro($password['plain'], $request->email);
        return redirect()->route('showLogin'); //MOSTRAR ALGUN AVISO?
    }
}
