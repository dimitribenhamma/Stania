<?php
    // Je teste pour savoir si j'ai quelque chose dans POST
    if(isset($_POST['keywords']) && !empty($_POST)) {
        // J'ai quelque chose donc je peux continuer

        // Je commence à séparer les différents mots clés
        $keywords = explode(' ', $_POST['keywords']);
        // J'initialise ma variable pour la requête SQL
        $like = "";
        foreach($keywords as $keyword) {
            // Si le mot clé est supérieur à 3 caractères (tu n'es pas obligé)
            if(strlen($keyword) >= 3) {
                // Je concatène
                // Le % en SQL est un joker, ça remplace n'importe quel caractère. Si tu veux que se soit une recherche explicite retire les %
                $like.= " resultats LIKE '%".$keyword."' OR";
				$like.= " resultats LIKE '%".$keyword."%' OR";
				$like.= " resultats LIKE '".$keyword."%'";
            }
        }
        // Je retire le dernier OR qui n'a pas lieu d'être
        $like = substr($like, 0, strlen($like) - 3);
        session_start();

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$bdd = 'membres';

	// On essaie de se connecter en base
    try{
	$conn = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);
	 // On veut définir le mode d'erreur de PDO sur Exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
        $req = "SELECT resultats FROM `personne` WHERE ".$like;
	if(isset($_POST['keywords'])){
        $sth = $conn->prepare($req); // demander la correspondance identifiant et mot de passe											     
        $sth->execute();
        $resultat = $sth->fetch(PDO::FETCH_ASSOC);
        ?>     
            <script>console.log('Recherche par mot-clé en cours');</script>
       <?php  
	echo $resultat['resultats'];	
    } else {
        // Je n'ai rien, j'informe l'utilisateur
	?>     
            <script>console.log('Rien dans le champs de recherche');</script>
       <?php
        die('Veuillez saisir quelque chose dans le champs de recherche.');
    }
?>
