<?php
namespace App\Http\Utilities;

use Hash;

class PasswordGenerator{
	/**
	* Genera una contrasena aleatoria del tamano en la variable
	* $size
	*
	* @return Array contrasena sin hash y hasheada
	*/
	public static function generate(){
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvqxyz0123456789';
		$generatedPass = '';
		$size = 6;

		for($x = 0; $x < $size; $x++){
			$random = rand(0, strlen($chars));
			$generatedPass .= substr($chars, $random, 1);
		}

		return ['plain'=>$generatedPass, 'hashed'=> Hash::make($generatedPass)];
	}
}