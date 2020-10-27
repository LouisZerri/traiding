<?php
	
	require "include/header.php";
  require "include/functions.php";

  logged_only();

?>

<main>
	<section>
		<header>
			<div class="fondpromotion"></div>
		</header>
		<article class="search_section">
	    	<h1 class="text-white font-weight-bold display-4">PRODUITS EN PROMOTION</h1>
	    	<table class="table table-striped mt-5 w-75">
  				<thead>
    				<tr>
				    	<th scope="col">Identifiant</th>
				    	<th></th>
				      	<th scope="col">Produit</th>
				      	<th scope="col">Classification</th>
				      	<th scope="col">Origine</th>
				      	<th scope="col">Prix</th>
				      	<th></th>
    				</tr>
  				</thead>
  				<tbody>
    				<tr>
      					<th scope="row">1</th>
      					<td><img src="assets/images/sucre.jpg" alt=""></td>
      					<td>Sucre</td>
      					<td>Edulcorants</td>
      					<td>Brésil</td>
      					<td>$200.00 - $500.00 / Metric Ton</td>
      					<td><span class="badge badge-success">En stock</span></td>
    				</tr>
    				<tr>
      					<th scope="row">2</th>
      					<td><img src="assets/images/tomate.jpg" alt=""></td>
      					<td>Concentré de tomate</td>
      					<td>Sauce tomate</td>
      					<td>Xinjiang, China</td>
      					<td>$6.00 - $10.00 / Carton</td>
      					<td><span class="badge badge-success">En stock</span></td>
    				</tr>
    				<tr>
      					<th scope="row">3</th>
      					<td><img src="assets/images/soude.jpg" alt=""></td>
      					<td>Soude</td>
      					<td>Hydroxyde de sodium</td>
      					<td>Shandong, China</td>
      					<td>2,94 € / 500g</td>
      					<td><span class="badge badge-success">En stock</span></td>
    				</tr>
    				<tr>
      					<th scope="row">4</th>
      					<td><img src="assets/images/polyethylene.jpg" alt=""></td>
      					<td>Polyéthylène</td>
      					<td>Auxiliaires chimiques</td>
      					<td>China</td>
      					<td>1,10 $US - 1,20 $US / Kilogramme</td>
      					<td><span class="badge badge-success">En stock</span></td>
    				</tr>
    				<tr>
      					<th scope="row">5</th>
      					<td><img src="assets/images/polypropylene.jpg" alt=""></td>
      					<td>Polypropylène</td>
      					<td>Auxiliaires chimiques</td>
      					<td>China</td>
      					<td>2 000,00 $US - 3 000,00 $US / Tonne métrique</td>
      					<td><span class="badge badge-success">En stock</span></td>
    				</tr>

  				</tbody>
			</table>
	   	</article>
	</section>
</main>

<?php
	
	require "include/footer.php";

?>