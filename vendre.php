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

		if(empty($errors))
		{
			sendEmailForSale(utf8_decode($_POST['societe']),utf8_decode($_POST['telephone']),utf8_decode($_POST['email']),utf8_decode($_POST['matiere']),utf8_decode($_POST['disponibilite']),utf8_decode($_POST['usage']),utf8_decode($_POST['quantite']));

			$_SESSION['flash']['success'] = 'Votre email a été envoyé avec succès';

			header('Location: accueil');
		}
	}

?>

<main>
	<section>
		<header>
			<div class="fondvente"></div>
		</header>
		<article class="search_section">
	    	<h1 class="text-white font-weight-bold display-4">VENDRE MES PRODUITS</h1>
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
	    	<div class="card mt-5 search-card mb-5">
	    		<h4 class="display-4 pl-2">Informations générales</h4><hr>
	    		<div class="card-body">
	    			<div class="container">
	    				<form action="" method="POST">
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
		    					<input type="text" class="form-control" name="email" required>
		    				</div>
	    					<div class="row">	
			    				<div class="col">
			    					<div class="form-group">
				    					<label for="">Matière à vendre</label>
				    					<input type="text" class="form-control" name="matiere" required>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Adresse de disponibilité</label>
				    					<input type="text" class="form-control" name="disponibilite" required>
				    				</div>
				    			</div>
			    				<div class="col">
			    					<div class="form-group">
				    					<label for="">Usage</label>
				    					<input type="text" class="form-control" name="usage" required>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Quantité</label>
				    					<input type="text" class="form-control" name="quantite" required>
				    				</div>
			    				</div>
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