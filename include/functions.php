<?php
	
	function formatDate($date)
	{
		$string = explode("/",$date);

		$newdate = implode($string);

		if(strlen($newdate) == 8 && is_numeric($newdate))
		{
			return true;
		}
		
		return false;
	}

	function formatTelephone($telephone)
	{
		$result = "+ 33";
		$telephone = str_replace(" ", "", $telephone);
		$string = substr($telephone, 1);
		return $result."".$string;
	}

	function logged_only()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		if(!isset($_SESSION['auth']))
		{
			$_SESSION['flash']['danger'] = "Veuillez vous connectez pour accéder à cette page";
			header('Location: connexion');
			exit();
		}
	}


?>