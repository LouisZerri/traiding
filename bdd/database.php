<?php

	function debug($var)
	{
		echo '<pre>'.print_r($var,true).'</pre>';
	}
	
	function connexionBaseDeDonnee()
	{
		$pdo = new PDO('mysql:host=localhost;port=3308;dbname=traiding;charset=utf8', 'root', '');

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

		return $pdo;
	}

	function checkEmail($email)
	{
		$pdo = connexionBaseDeDonnee();

		$query = $pdo->prepare('SELECT id FROM utilisateur WHERE email = ?');
		
		$query->execute([$email]);
		
		$mail = $query->fetch();

		if($mail != null)
		{
			return true;
		}

		return false;
	}

	function insertUtilisateur($nom, $prenom, $date, $email, $telephone, $societe, $password)
	{
		$pdo = connexionBaseDeDonnee();

		$query = $pdo->prepare("INSERT INTO utilisateur SET nom = ?, prenom = ?, date_naissance = ?, email = ?, telephone = ?, societe = ?, mot_de_passe = ?");

		$password = password_hash($password, PASSWORD_BCRYPT);

		$query->execute([$nom, $prenom, $date, $email, $telephone, $societe, $password]);

	}

	function utilisateurExist($email)
	{
		$pdo = connexionBaseDeDonnee();

		$req = $pdo->prepare('SELECT * FROM utilisateur WHERE email = ?');

		$req->execute([$email]);

		$vendeur = $req->fetch();

		return $vendeur;
	}




?>