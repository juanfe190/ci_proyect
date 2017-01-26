<?php
namespace App\Http\Utilities;

class UrlSanitizer{
	/**
	* Elimina acento y reemplaza espacio con '-'
	*
	* @param String word
	*/

	public static function sanitize($word){
		$word = StringUtil::eliminateUnwantedChars($word);
		$word = str_replace(" ", "-" ,$word);
		$word = strtolower($word);

		return $word;
	}
}
