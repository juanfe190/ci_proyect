<?php
namespace App\Http\Utilities;

use App\Http\Requests\UsuarioRequest;
use App\User;
class UsernameGenerator{
	/**
	* Genera el nombre de usuario, agrega o suma el ultimo digito
	* en caso de estar repetido
	*
	* @param App\Http\Requests\UsuarioRequest;
	* @return String username
	*/
	public static function generate(UsuarioRequest $request){
		$firstName = self::sanitize($request->first_name);
		$lastName =  self::sanitize($request->last_name);
		$username = $firstName . $lastName;

		$findUser = User::where('username', $username);

		if($findUser->count() > 0){
			$lastdigit = substr($username, -1);
			$splitted = str_split($username, strlen($username)-1);
			$username = is_numeric($lastdigit) ? $splitted[0] . ($lastdigit+1) : $username . 1;
		}
		return $username;
	}

   /**
	* Elimina las tildes
	*
	* @param String
	* @return String texto sin tilde
	*/
	private static function sanitize($text){
		$invalidChars = ["á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú"];
		$sanitized = str_replace($invalidChars, "" ,$text);
		$lowerCase = strtolower($sanitized);
		
		return $lowerCase;
	}
}

