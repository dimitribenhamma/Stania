<?php
session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$bdd = 'membres';
$sql = "SELECT id FROM `personne` WHERE user = :user AND password = :password"; // paramètres nommés pour contrer les injections SQL

// On essaie de se connecter en base
try{
    $conn = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);
    // On veut définir le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     ?>     
     <script>console.log('Connexion réussie');</script>
<?php
    if(isset($_POST['user']) AND isset($_POST['password'])){
        $sth = $conn->prepare("SELECT id FROM `personne` WHERE user = :user AND password = :password"); // demander la correspondance identifiant et mot de passe											
        $sth->bindParam(':user' , $_POST['user']);        
        $sth->bindParam(':password' , $_POST['password']);
        $sth->execute();
        $resultat = $sth->fetch(PDO::FETCH_ASSOC);
        // cas avec succès
        if(isset($resultat['id'])){
            // On passe par un token unique sur id d'un utilisateur					
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['role'] = 'utilisateur';
            ?>     
            <script>console.log('Bienvenue vous êtes en ligne !');</script>
       <?php            
            header("Location: index.php");
        } else{	
            ?>     
            <script>console.log('Réessayez de vous connecter');</script>
       <?php    																
            header("Location: login.php");
        }
    }
}	
catch(PDOException $e){
    error_log($e->getMessage());
}