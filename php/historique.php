<?php
	// On inclu les paramètres dynamiques 'matchs.php'
	include_once '../data/matchs.php';
?>
<!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tous vos paris</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<script src="../js/historique.js" async></script>
  </head>
  <body> 
	<?php	  
		include_once './components/header.php';
		include_once './components/sport.php';
	?>
	<section style="position:absolute;top:20%;left:30%;bottom:30%">
	<!-- partie centrale de l'application -->
	<div class="titre">Tous vos paris</div>
	<div id ="pari">&nbsp;</div>
	<!-- partie php dynamique de l'historique avec MODELE -->
	<?php
		include_once 'paris.php';
	?>	
	</section>
 </body>
</html>