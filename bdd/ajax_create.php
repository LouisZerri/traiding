<?php

	require "database.php";
	require "../include/functions.php";

	function isAjax()
	{
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
	}

	if(isAjax())
	{

		$errors = array();

		if(is_numeric($_POST['nom']) || empty($_POST['nom']))
		{
			$errors['nom'] = "Votre nom ne peut pas être une valeur numérique";
		}

		if(is_numeric($_POST['prenom']) || empty($_POST['prenom']))
		{
			$errors['prenom'] = "Votre prénom ne peut pas être une valeur numérique";
		}

		if(!formatDate($_POST['date']) || empty($_POST['date']))
		{
			$errors['naissance'] = "Votre date de naissance doit être au format JJ/MM/AAAA";
		}

		if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$errors['email'] = "Votre email n'est pas valide";
		}
		else
		{
			
			if(checkEmail($_POST['email']))
			{
				$errors['email'] = "Cet email est déjà utilisé pour un autre compte";
			}
		}

		if(is_numeric($_POST['societe']))
		{
			$errors['societe'] = "La société ne peut pas être une valeur numérique";
		}

		if($_POST['password'] != $_POST['password_confirm'])
		{
			$errors['password_confirm'] = "Les deux mots de passe ne correspondent pas";
		}

		if(!empty($errors))
		{
			?>
			<p>Vous n'avez pas rempli le formulaire correctement : </p>
			<ul>
				<?php foreach ($errors as $error): ?>
					<li><?= $error; ?></li>
				<?php endforeach; ?>
			</ul>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<?php
		}
		else
		{
			insertUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['date'], $_POST['email'], $_POST['telephone'], $_POST['societe'], $_POST['password']);
		}
		
	}
	else
	{
		header('Location: index.php');
	}



?>