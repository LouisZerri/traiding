<?php
	
	require "include/header.php";
	require "include/functions.php";
	require "bdd/database.php";

	logged_only();

	if(isset($_GET['search']))
	{
		$search = rechercherProduit($_GET['search']);
	}
	else
	{
		$search = rechercherProduit('');
	}

	

?>

<main>
	<section>
		<header>
			<div class="fondsearchproduit"></div>
		</header>
		<article class="search_section">
			<div class="container mt-4">
				<form action="" method="post">
					<div class="input-group">
						<?php if(isset($_GET['search'])): ?>
	  						<input id="search" type="text" class="form-control" name="product" placeholder="Rechercher un produit" value="<?= $_GET['search'] ?>">
	  					<?php else: ?>
	  						<input id="search" type="text" class="form-control" name="product" placeholder="Rechercher un produit">
	  					<?php endif; ?>
	  					<div class="input-group-append">
	    					<button type="submit" class="btn btn-success" id="nameFilter"><i class="fa fa-search"></i>&nbsp;&nbsp;Rechercher</button>
	  					</div>
					</div>				
				</form>
			</div>
	    </article>
	    <article>
	    	<table id="search_product" class="table table-striped mt-5 w-75">
				<thead>
					<tr>
		  				<th scope="col">Identifiant</th>
				      	<th scope="col">Vendeur</th>
				      	<th scope="col">Nom</th>
				      	<th scope="col">Classification</th>
				      	<th scope="col">Origine</th>
				      	<th scope="col">Prix</th>
				      	<th scope="col">Disponibilité</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($search as $donnees): ?>
						<tr>
      						<th scope="row"><?= $donnees->id ?></th>
      						<td class="text-primary"><i><?= $donnees->vendeur ?></i></td>
      						<td><?= $donnees->nom ?></td>
      						<td><?= $donnees->classification ?></td>
      						<td><?= $donnees->origine ?></td>
      						<td><?= $donnees->prix ?></td>
      						<?php if($donnees->disponibilite == 'En stock'): ?>
      							<td><span class="badge badge-success"><?= $donnees->disponibilite ?></span></td>
      						<?php elseif($donnees->disponibilite == 'Approvisionnement'): ?>
      							<td><span class="badge badge-info"><?= $donnees->disponibilite ?></span></td>
      						<?php elseif($donnees->disponibilite == 'Rupture de stock'): ?>
      							<td><span class="badge badge-danger"><?= $donnees->disponibilite ?></span></td>
      						<?php endif;?>
      					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
	    </article>
	</section>
</main>

<?php

	require "include/footer.php";

?>