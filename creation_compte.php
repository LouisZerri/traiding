<?php
	
	require "include/header.php";
	require "include/functions.php";
	require 'bdd/database.php';
?>

<main>
	<section>
		<header>
			<div class="fondsecurity"></div>
		</header>
		<article class="search_section">
	    	<h1 class="text-white font-weight-bold display-4">CREATION DE COMPTE</h1>
			<div id="alert"></div>
	    	<div class="card mt-5 search-card mb-5">
	    		<h4 class="display-4 pl-2">Informations générales</h4><hr>
	    		<div class="card-body">
	    			<div class="container">
	    				<form action="" method="POST">
	    					<div class="row">
	    						<div class="col">
	    							<div class="form-group">
				    					<label for="">Nom</label>
				    					<input id="nom" type="text" class="form-control" name="nom" required>
				    					<div class="invalid-feedback feedback-nom"></div>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Prénom</label>
				    					<input id="prenom" type="text" class="form-control" name="prenom" required>
				    					<div class="invalid-feedback feedback-prenom"></div>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Date de naissance</label>
				    					<input id="date" type="text" class="form-control" name="naissance" required>
				    					<div class="invalid-feedback feedback-date"></div>
				    				</div> 				
	    						</div>
	    						<div class="col">
	    							<div class="form-group">
				    					<label for="">Email</label>
				    					<input id="email" type="email" class="form-control" name="email" required>
				    					<div class="invalid-feedback feedback-email"></div>
				    				</div>
	    							<div class="form-group">
				    					<label for="">Téléphone</label>
				    					<input id="telephone" type="text" class="form-control" name="telephone" required>
				    					<div class="invalid-feedback feedback-telephone"></div>
				    				</div>
				    				<div class="form-group">
				    					<label for="">Société</label>
				    					<input id="societe" type="text" class="form-control" name="societe" required>
				    					<div class="invalid-feedback feedback-societe"></div>
				    				</div>
	    						</div>
	    					</div>
	    					<div class="form-group">
		    					<label for="">Mot de passe</label>
		    					<input id="password" type="password" class="form-control" name="password" required>
		    					<div class="invalid-feedback feedback-password"></div>
		    				</div>
		    				<div class="form-group">
		    					<label for="">Confirmation du mot de passe</label>
		    					<input id="password_confirm" type="password" class="form-control" name="password_confirm" required>
		    				</div>
		    				<div class="form-group">
		    					<button type="submit" class="btn btn-primary" id="create">Créer mon compte</button>
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