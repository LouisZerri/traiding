<?php

	require "include/header.php";

	session_start();
	
	if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password']))
	{
	    require_once 'bdd/database.php';

		$user = utilisateurExist($_POST['email']);

	    if($user == null)
	    {
	        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
	    }
	    elseif(password_verify($_POST['password'], $user->mot_de_passe))
	    {
	        $_SESSION['auth'] = $user;
	        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
	        header('Location: home');
	    }
	    else
	    {	
	        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
	    }
	}

?>

<main>
	<section>
		<header>
			<div class="fondsecurity"></div>
		</header>
		<article class="search_section">
	    	<h1 class="text-white font-weight-bold display-4">CONNEXION A VOTRE COMPTE</h1>
	    	<?php if(isset($_SESSION['flash'])): ?>
		  		<?php foreach($_SESSION['flash'] as $type => $message): ?>
					<div class="alert alert-<?= $type;?> alert-dismissible fade show" role="alert">
			  			<?= $message; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    		<span aria-hidden="true">&times;</span>
				  		</button>
					</div>
		  		<?php endforeach; ?>
		  		<?php unset($_SESSION['flash']); ?>
			<?php endif; ?>
	    	<div class="card mt-5 search-card mb-5 w-50">
	    		<h4 class="display-4 pl-2">Informations générales</h4><hr>
	    		<div class="card-body">
	    			<div class="container">
	    				<form action="" method="POST">
							<div class="form-group">
		    					<label for="">Email</label>
		    					<input type="text" class="form-control" name="email" required>
		    				</div>
		    				<div class="form-group">
		    					<label for="">Mot de passe</label>
		    					<input type="password" class="form-control" name="password" required>
		    				</div>
		    				<div class="form-group">
		    					<button type="submit" class="btn btn-success">Me connecter</button>
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