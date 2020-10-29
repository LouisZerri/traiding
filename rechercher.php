<?php
	
	require "include/header.php";
	require "include/functions.php";

  	logged_only();

  	if(!empty($_POST))
	{
		$errors = array();

		if(is_numeric($_POST['societe']))
		{
			$errors['societe'] = "L'enseigne ne peut pas être une valeur numérique";
		}

		if(!preg_match('#^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$#', $_POST['telephone'])) 
		{
		 	$errors['telephone'] = "Le numéro de téléphone n'est pas au bon format";
		}

		if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$errors['email'] = "Votre email n'est pas valide";
		}

		if(!is_numeric($_POST['quantite']))
		{
			$errors['quantite'] = "La quantité doit être une valeur numérique";
		}

		if(!formatDate($_POST['date_commande']) || empty($_POST['date_commande']))
		{
			$errors['date_commande'] = "La date de commande doit être au format JJ/MM/AAAA";
		}

		if(!formatDate($_POST['date_livraison']) || empty($_POST['date_livraison']))
		{
			$errors['date_livraison'] = "La date de livraison doit être au format JJ/MM/AAAA";
		}

		if(empty($errors))
		{
			sendEmailForSearch(utf8_decode($_POST['societe']),utf8_decode($_POST['telephone']),utf8_decode($_POST['email']),utf8_decode($_POST['matiere']),utf8_decode($_POST['tds']),utf8_decode($_POST['usage']),utf8_decode($_POST['reglement']),utf8_decode($_POST['quantite']),utf8_decode($_POST['unite']),utf8_decode($_POST['date_commande']),utf8_decode($_POST['date_livraison']),utf8_decode($_POST['lieu_livraison']));

			$_SESSION['flash']['success'] = 'Votre email a été envoyé avec succès';

			header('Location: accueil');
		}
	}

?>

<main>
	<section>
		<header>
			<div class="fondrecherche"></div>
		</header>
		<article class="search_section">
	    	<h1 class="text-white font-weight-bold display-4">JE RECHERCHE</h1>
	    	<?php if(!empty($errors)): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<p>Vous n'avez pas rempli le formulaire correctement : </p>
					<ul>
						<?php foreach ($errors as $error): ?>
							<li><?= $error; ?></li>
						<?php endforeach; ?>
					</ul>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
	    	<div class="card mt-3 search-card">
	    		<h4 class="display-4 pl-2">Informations générales</h4><hr>
	    		<div class="card-body">
	    			<div class="container">
	    				<form action="" method="POST">
	    					<div class="row">
	    						<div class="col">
	    							<div class="form-group">
				    					<label for="">Société</label>
				    					<input type="text" class="form-control" name="societe" required>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Téléphone</label>
				    					<input type="text" class="form-control" name="telephone" required>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Email</label>
				    					<input type="email" class="form-control" name="email" required>
				    				</div>
			    				</div>
			    				<div class="col">
			    					<div class="form-group">
				    					<label for="">Matières recherchées</label>
				    					<input type="text" class="form-control" name="matiere" required>
				    				</div>
				    				<div class="form-group">
				    					<label for="">TDS</label>
				    					<input type="text" class="form-control" name="tds" required>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Usage</label>
				    					<input type="text" class="form-control" name="usage" required>
				    				</div>
			    				</div>
			    				<div class="col">
			    					<div class="form-group">
				    					<label for="">Condition de réglement</label>
				    					<input type="text" class="form-control" name="reglement" required>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Quantité</label>
				    					<input type="text" class="form-control" name="quantite" required>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Unité</label>
				    					<input type="text" class="form-control" name="unite" required>
				    				</div>
					    		</div>
	    					</div>
	    					<div class="form-group">
		    					<label for="">Date souhaitée de commande</label>
		    					<input type="text" class="form-control" name="date_commande" placeholder="Date de commande (JJ/MM/AAAA)" required>
		    				</div>
	    					<div class="form-group">
		    					<label for="">Date souhaitée de livraison</label>
		    					<input type="text" class="form-control" name="date_livraison" placeholder="Date de livraison (JJ/MM/AAAA)" required>
		    				</div>
		    				<div class="form-group">
		    					<label for="">Lieu de livraison</label>
		    					<input type="text" class="form-control" name="lieu_livraison" required>
		    				</div>
		    				<div class="form-group">
		    					<button type="submit" class="btn btn-primary">Envoyer</button>
		    				</div>
	    				</form>
	    			</div>
	    		</div>
	    	</div>
		</article>
	</section>
</main>


<?php

	require "include/footer.php";

?>