<!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S'inscrire | Stania</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
  </head>
  <body>  
  <header class="fixed-top"><div class="border border-dark text-center text-white p-0" style="border:1px solid black"><img src="../img/stania.png" width="80px" height="80px" /></div>
</header>
<section>
<!-- la largeur du formulaire est de 35% --> 
<div class="formulaire" style="width:35%">
		<form method="POST" action="inscription-handler.php">																																																														
			<h2 style="font-size:36px">Inscription</h2>

			<div class="grille"> <!-- disposition en grille -->
				<!-- grille divisée en 2 -->
				<!-- input avec une largeur à 80% de base mais padding 20px et grille -->
				<div><label for="name" style="display:block">Nom</label><input type="text" name="name" placeholder="Nom" autofocus="true" required /></div>										
				<div><label for="surname" style="display:block">Prénom</label><input type="text" name="surname" placeholder="Prénom" required /></div>
				
				<div><label for="user" style="display:block">Nom d’utilisateur</label><input type="text" name="user" minlenght="4" maxlenght="10" placeholder="Nom d'utilisateur" required /></div>															
				<div><label for="password" style="display:block">Mot de passe</label><input type="password" name="password" placeholder="Mot de passe" minlenght="4" maxlenght="15" required /></div>	
				
				<div><label for="email" style="display:block">Email</label><input type="email" name="email" minlenght="4" maxlenght="30" placeholder="Email" required /></div>														
				<div><label for="date" style="display:block">Date de naissance</label><input type="date" name="date" placeholder="Date de naissance" required /></div>	 <!-- Type date calendrier -->				
				
			</div>
			
			<button type="submit" style="background-color:green;color:white;">Je Démarre</button>						
		</form>					
</div>	
</section>	
	<?php
		include_once './components/footer.php';
	?>
  </body>
</html>