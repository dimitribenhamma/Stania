<?php // URL écrite en PHP
	include_once 'login-handler.php';
?>
<!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter | Stania</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
  </head>
  <body>
	<!-- le bandeau est celui de la page principale --> 
    <header class="fixed-top"><div class="border border-dark text-center text-white p-2" style="border:1px solid black"><img src="../img/stania.png" width="80px" height="80px" /></div>
	</header>

	<!-- la largeur du formulaire est de 35% --> 
	<div class="formulaire">
		<form method="POST" action="login-handler.php">																																																														
			<h2 style="font-size:36px">Connexion</h2>
			<label for="user" class="label1">Nom d'utilisateur</label>
				<!-- input avec une largeur 80% --> 
			<input type="text" name="user" placeholder="Nom d'utilisateur" autofocus="true" minlenght="6" maxlenght="15" required />
			<label for="password" class="label2">Mot de passe</label>
			<input type="password" name="password" placeholder="Mot de passe" minlenght="6" maxlenght="15" required />
			<button type="submit" style="background-color:green;color:white;">Je Démarre</button>	
			<div style="padding-top:15px;padding-bottom:25px">
				<a href="inscription.php"><span class="pied-gauche"><u>Inscription</u></span></a>
				<a href="password.php"><span class="pied-droit"><u>Mot de passe oublié</u></span></a>
			</div>
		</form>
	</div>	
	<?php
		include_once './components/footer.php';
	?>	
</body>
</html>