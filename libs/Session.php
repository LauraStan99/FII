<?php

class Session
{

	public static function init()
	{
		@session_start();
		Session::set('loggedIn', "logged");
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if (isset($_SESSION[$key]))
			return $_SESSION[$key];
	}

	public static function destroy()
	{
		unset($_SESSION["nume"]);
		unset($_SESSION["prenume"]);
		unset($_SESSION["email"]);
		unset($_SESSION["adresa"]);
		unset($_SESSION["parola"]);
		unset($_SESSION["telefon"]);
		unset($_SESSION["loggedIn"]);
		unset($_SESSION["id_utilizator"]);
		
		session_destroy();
	}
}
