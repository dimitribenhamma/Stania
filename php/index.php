<?php
	// On inclu les paramètres dynamiques 'matchs.php'
	include_once '../data/matchs.php';
?>
<!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parier en ligne : Stania</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<script src="../js/index.js" async></script>
  </head>
  <body> 
	<?php	  
		include_once './components/header.php';
		include_once './components/sport.php';
	?>
	<section style="position:absolute;top:20%;left:30%;bottom:30%">
	<!-- Partie centrale de l'application -->
	<div class="titre">Tous les matchs</div>

	<!-- Partie php dynamique de vignette avec MODELE -->
	<?php
		include_once './components/vignettes.php';
	?>
	
	</section>
	
	<aside style="position:fixed;top:20%;left:70%;">
	<div class="titre">Votre séléction</div>
	<?= (isset($_SESSION['role']) && ($_SESSION['role'] == "utilisateur")) ? "Bienvenue vous êtes en ligne !" : "" ?>
	<div id="selection" class="content-selection" style="padding-left:25%;padding-top:50%;">
		<img src="../img/paris en cours.JPG" style="border-radius:50%;margin-left:15%" />
		<span style="display:block">Pas de paris en cours</span>
	</div>

	</aside>
	<?php
		include_once './components/footer.php';
	?>
 </body>
</html>