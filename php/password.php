	<!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parier en ligne : Stania</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<script src="../js/my.js" async></script>
  </head>
  <body>  
    <header class="fixed-top"><div class="border border-dark text-center text-white p-2" style="border:1px solid black"><img src="../img/stania.png" width="80px" height="80px" /></div>
	</header>
	
<section style="position: fixed;" class="body">
	
	
	<form method="POST" action="password-handler.php">																																																														
	<div style="text-align:center;font-size:32px;font-weight:bold">Mot de passe oublié</div>
		<label for="email" class="label1">Adresse e-mail</label><input type="email" name="email" placeholder="email (manquant)" autofocus="true" minlenght="6" maxlenght="15" required /> <!-- required pour obliger une saisie non vide -->		
				<div>&nbsp;</div>
				<div>Si cet email existe, nous vous renverrons le mot de passe (manquant) associé à ce compte</div>
				<div class="submit"><input type="submit" name="Renvoyer" value="Renvoyer" style="background-color:green;color:white;"></div>	
		    	</form>
	</section>	
		<?php
			include_once './components/footer.php';
		?>
  </body>
</html>