<?php

class Language 
{
	
	static $language;
	
	const KEY_NOT_FOUND = 'NO-LANGUAGE-KEY-FOUND-ERROR';
	
	
	public static function Get($key)
	{
		if(isset(self::$language[$key])) {
			return self::$language[$key];
		}
		return self::KEY_NOT_FOUND;
	}
	
	public static function setLanguage($language) {
		self::$language = $language;
	}
	
}