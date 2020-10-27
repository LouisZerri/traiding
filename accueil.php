<?php

	require "include/header.php";
	require "include/functions.php";

	logged_only();

	$nom = $_SESSION['auth']->nom;
	$prenom = $_SESSION['auth']->prenom;

?>
<style>

body
{
	overflow-x: hidden;
}

</style>

<main>
	<section>
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<a style="font-size: 20px" class="navbar-brand display-4" href="home">
					<img src="assets/images/logo.png" alt="">
					Shop Pepperbay
				</a>
			  	<ul class="navbar-nav ml-auto">
					<form action="test.php" method="get" class="form-inline my-2 my-lg-0 mr-5">
						<div class="form-group">
							<div class="input-group-prepend">
					    		<span class="input-group-text">Rechercher</span>
					  		</div>
				      		<input style="width: 400px;" class="form-control" type="search" aria-label="Search">
				      		<div class="input-group-prepend">
					    		<span class="input-group-text search">
					    			<i class="fa fa-search fa-2x"></i>
					    		</span>	
				      		</div>
						</div>
				    </form>
				    <ul class="navbar-nav ml-auto">
				    	<li class="nav-item dropdown">
					    	<a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					        	Bonjour <?= $prenom ?> <?= $nom ?>
					        </a>
					        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					        	<a class="dropdown-item" href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Votre pannier</a>
					          	<a class="dropdown-item" href="deconnexion"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Deconnexion</a>
					        </div>
					     </li>
					</ul>
				</ul>
			</nav>
		</header>
		<article>
			<div class="row mt-3 ml-5">
				<div class="pointer col">
					<a href="https://www.total.fr/" target="_blank">
						<img class="pub" src="assets/images/total.jpg" alt="">
					</a>
				</div>
				<div class="pointer col">
					<a href="https://pepperbay.fr/" target="_blank">
						<img class="pub" src="assets/images/pepperbay.jpg" alt="">
					</a>
				</div>
				<div class="pointer col">
					<a href="https://www.trade-easy.fr/" target="_blank">
						<img class="pub" src="assets/images/tradeeasy.png" alt="">
					</a>
				</div>
				<div class="pointer col">
					<a href="https://www.bollore-logistics.com/fr" target="_blank">
						<img class="pub" src="assets/images/bolloré.png" alt="">
					</a>
				</div>
			</div>
		</article>
		<article>
			<div class="row choice">
				<div class="col ml-4">
					<a href="rechercher">
						<div class="jumbotron jumbotron-fluid">
	              			<div class="container">
	    						<h1 class="display-4 text-center">Je recherche</h1>
	    						<p class="lead text-center">Effectuer une recherche sur la qualification du besoin.</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col">
					<a href="promotion">
						<div class="jumbotron jumbotron-fluid">
	              			<div class="container">
	    						<h1 class="display-4 text-center">Nos promotions</h1>
	    						<p class="lead text-center">Liste des matières en promotion disponibles sur le comptoir.</p>
							</div>
						</div>
					</a>
				</div>
				<div class="col">
					<div class="jumbotron jumbotron-fluid">
              			<div class="container">
    						<h1 class="display-4 text-center">TRADE EASY</h1>
    						<p class="lead text-center">
    							<a href="https://hhk-preprod.trade-easy.fr" target="_blank">
    								<span class="click text-primary">Cliquez-ici</span>
    							</a> 
    							pour vous connecter à votre compte TRADE EASY.
    						</p>
						</div>
					</div>
				</div>
				<div class="col mr-4">
					<a href="vendre">
						<div class="jumbotron jumbotron-fluid">
	              			<div class="container">
	    						<h1 class="display-4 text-center">Je vends</h1>
	    						<p class="lead text-center">Vendez vos matières premières.</br></br></p>
							</div>
						</div>
					</a>
				</div>
			</div>
		</article>			
		<footer>
			<div id="fondecran"></div>	
		</footer>
	</section>
</main>


<?php

	require "include/footer.php";

?>