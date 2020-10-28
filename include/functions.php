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

	function sendEmailForSearch($societe, $telephone, $email, $matiere, $tds, $usage, $reglement, $quantite, $unite, $date_commande, $date_livraison, $lieu_livraison)
	{
		$mail = 'l.zerri@gmail.com';

		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
		{
			$passage_ligne = "\r\n";
		}
		else
		{
			$passage_ligne = "\n";
		}
		//=====Déclaration des messages au format texte et au format HTML.
		$message_txt = "Societe : $societe\n\n
						Telephone : $telephone\n\n
						Email : $email\n\n
						Matieres premieres : $matiere\n\n
						TDS : $tds\n\n
						Usage : $usage\n\n
						Condition de reglement : $reglement\n\n
						Quantite : $quantite\n\n
						Unite : $unite\n\n
						Date de commande : $date_commande\n\n
						Date de livraison : $date_livraison\n\n
						Lieu de livraison : $lieu_livraison";

		$message_html = "<p>Societe : $societe</p>
						 <p>Telephone : $telephone</p>
						 <p>Email : $email</p>
						 <p>Matieres premieres : $matiere</p>
						 <p>TDS : $tds</p>
						 <p>Usage : $usage</p>
						 <p>Condition de reglement : $reglement</p>
						 <p>Quantite : $quantite</p>
						 <p>Unite : $unite</p>
						 <p>Date de commande : $date_commande</p>
						 <p>Date de livraison : $date_livraison</p>
						 <p>Lieu de livraison : $lieu_livraison</p>";
		
		//==========
		
		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========
		
		//=====Définition du sujet.
		$sujet = "Recherche sur la qualification du besoin";
		//=========
		
		//=====Création du header de l'e-mail.
		$header = "From: \"Pepperbay\"<contact@pepperbay.fr>".$passage_ligne;
		$header.= "Reply-to: \"Pepperbay\" <contact@pepperbay.fr>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========
		
		//=====Création du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========
		
		//=====Envoi de l'e-mail.
		mail($mail,$sujet,$message,$header);
		//==========

	}

	function sendEmailForSale($societe, $telephone, $email, $matiere, $disponibilite, $usage, $quantite)
	{
		$mail = 'l.zerri@gmail.com';

		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
		{
			$passage_ligne = "\r\n";
		}
		else
		{
			$passage_ligne = "\n";
		}
		//=====Déclaration des messages au format texte et au format HTML.
		$message_txt = "Societe : $societe\n\n
						Telephone : $telephone\n\n
						Email : $email\n\n
						Matieres à vendre : $matiere\n\n
						Disponibilite : $disponibilite\n\n 
						Usage : $usage\n\n
						Quantite : $quantite\n\n";

		$message_html = "<p>Societe : $societe</p>
						 <p>Telephone : $telephone</p>
						 <p>Email : $email</p>
						 <p>Matieres premieres : $matiere</p>
						 <p>Disponibilite : $disponibilite</p>
						 <p>Usage : $usage</p>
						 <p>Quantite : $quantite</p>";
		
		//==========
		
		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========
		
		//=====Définition du sujet.
		$sujet = "Vente de matières premières";
		//=========
		
		//=====Création du header de l'e-mail.
		$header = "From: \"Pepperbay\"<contact@pepperbay.fr>".$passage_ligne;
		$header.= "Reply-to: \"Pepperbay\" <contact@pepperbay.fr>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		//==========
		
		//=====Création du message.
		$message = $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format texte.
		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_txt.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary.$passage_ligne;
		//=====Ajout du message au format HTML
		$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		$message.= $passage_ligne.$message_html.$passage_ligne;
		//==========
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
		//==========
		
		//=====Envoi de l'e-mail.
		mail($mail,$sujet,$message,$header);
		//==========

	}


?>