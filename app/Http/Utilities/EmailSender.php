<?php
namespace App\Http\Utilities;

use Mail;

class EmailSender{

	 /**
     * Envia el usuario y la contrasena por email
     *
     * @param contrasena sin hash
     * @param User model
     */
	public static function sendUserInfo($password, $user){
		Mail::send('emails.newUser', ['password'=>$password, 'username'=>$user->username], function($m) use ($user){
			$m->from('contacto@club-innova.com', 'Club Innova');

			$m->to($user->email, $user->first_name)->subject("Informacion de usuario");
		});
	}

	public static function sendResetPassInfro($password, $email){
		Mail::send('emails.resetPass', ['password'=>$password, 'email'=>$email], function($m) use ($email){
			$m->from('contacto@club-innova.com', 'Club Innova');

			$m->to($email, null)->subject("Informacion de usuario");
		});
	}
}