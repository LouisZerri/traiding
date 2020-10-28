<?php
	
	require "database.php";
	require "../include/functions.php";

	logged_only();

	function isAjax()
	{
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
	}

	$search = $_POST['search'];

	if(isAjax())
	{
		$result = rechercherProduit($search);
		?>
		<?php if($result != null): ?>
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
					<?php foreach($result as $donnees): ?>
						<tr>
      						<th scope="row"><?= $donnees->id ?></th>
      						<td class="text-primary"><i><?= $donnees->vendeur ?></i></td>
      						<td><?= $donnees->nom ?></td>
      						<td><?= $donnees->classification ?></td>
      						<td><?= $donnees->origine ?></td>
      						<td><?= $donnees->prix ?></td>
      						<?php if($donnees->promo == 1): ?>
	      						<?php if($donnees->disponibilite == 'En stock'): ?>
	      							<td><span class="badge badge-success"><?= $donnees->disponibilite ?></span>&nbsp;<span class="badge badge-warning">Promo !</span></td>
	      						<?php elseif($donnees->disponibilite == 'Approvisionnement'): ?>
	      							<td><span class="badge badge-info"><?= $donnees->disponibilite ?></span>&nbsp;<span class="badge badge-warning">Promo !</span></td>
	      						<?php elseif($donnees->disponibilite == 'Rupture de stock'): ?>
	      							<td><span class="badge badge-danger"><?= $donnees->disponibilite ?></span>&nbsp;<span class="badge badge-warning">Promo !</span></td>
	      						<?php endif;?>
	      					<?php else: ?>
	      						<?php if($donnees->disponibilite == 'En stock'): ?>
	      							<td><span class="badge badge-success"><?= $donnees->disponibilite ?></span></td>
	      						<?php elseif($donnees->disponibilite == 'Approvisionnement'): ?>
	      							<td><span class="badge badge-info"><?= $donnees->disponibilite ?></span></td>
	      						<?php elseif($donnees->disponibilite == 'Rupture de stock'): ?>
	      							<td><span class="badge badge-danger"><?= $donnees->disponibilite ?></span></td>
	      						<?php endif;?>
	      					<?php endif; ?>
      					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		<?php else: ?>

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
					<tr>
  						<th scope="row">1</th>
  						<td>Aucune données à afficher</td>
  						<td></td>
  						<td></td>
  						<td></td>
  						<td></td>
  						<td></td>
  					</tr>
				</tbody>
			</table>
		<?php endif; ?>
		<?php

	}
	else
	{
		header('Location: accueil');
	}
	

?>