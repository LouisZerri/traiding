<?php

	require "include/header.php";
	require "include/functions.php";

  	logged_only();

?>

<main>
	<section>
		<header>
			<div class="fondvente"></div>
		</header>
		<article class="search_section">
	    	<h1 class="text-white font-weight-bold display-4">VENDRE MES PRODUITS</h1>
	    	<div class="card mt-5 search-card mb-5">
	    		<h4 class="display-4 pl-2">Informations générales</h4><hr>
	    		<div class="card-body">
	    			<div class="container">
	    				<form action="" method="POST">
	    					<div class="form-group">
		    					<label for="">Société</label>
		    					<input type="text" class="form-control">
		    				</div>
		    				<div class="form-group">
		    					<label for="">Téléphone</label>
		    					<input type="text" class="form-control">
		    				</div>
		    				<div class="form-group">
		    					<label for="">Email</label>
		    					<input type="text" class="form-control">
		    				</div>
	    					<div class="row">	
			    				<div class="col">
			    					<div class="form-group">
				    					<label for="">Matière à vendre</label>
				    					<input type="text" class="form-control">
				    				</div>
				    				<div class="form-group">
				    					<label for="">Origine</label>
				    					<input type="text" class="form-control">
				    				</div>
				    			</div>
			    				<div class="col">
			    					<div class="form-group">
				    					<label for="">Usage</label>
				    					<input type="text" class="form-control">
				    				</div>
				    				<div class="form-group">
				    					<label for="">Quantité</label>
				    					<input type="text" class="form-control">
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