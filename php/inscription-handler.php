<?php 
			session_start();
			
			$servername = 'localhost';
            $username = 'root';
            $password = '';
			$bdd = 'membres';

		try{			
				$conn = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);
                // On veut definir le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				?>     
				<script>console.log('Connexion réussie');</script>
		   		<?php
						if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['user']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['date'])){											
								$sth = $conn->prepare("SELECT id,user from `personne` WHERE user = :user");	// paramètres nommés pour contrer les injections SQL								
								$sth->bindParam(':user' , $_POST['user']);        
								// $sth->bindParam(':password' , $_POST['password']);
								// Tester les utilisateurs correspondants
								$sth->execute();
								$resultat = $sth->fetch(PDO::FETCH_ASSOC);
									if(!isset($resultat['id'])){
										// Utilisateur non dans la base de donnée
										$st = $conn->prepare("INSERT INTO `personne` VALUES('', '".$_POST['name']."', '".$_POST['surname']."', '".$_POST['user']."','".$_POST['password']."', '".$_POST['email']."' , '".$_POST['date']."')"); // On passe a l'enregistrement en base de donn�es						
										// $st->bindParam(':name' , $_POST['name']);        
										// $st->bindParam(':surname' , $_POST['surname']);
										// $st->bindParam(':user' , $_POST['user']);        
										// $st->bindParam(':password' , $_POST['password']);
										// $st->bindParam(':email' , $_POST['email']);        
										// $st->bindParam(':date' , $_POST['date']);
										$st->execute();
										// Enregistrer les donnees de sessions
										$_SESSION['user'] = $resultat['user'];
										$_SESSION['role'] = 'utilisateur';
										header("Location:index.php");										
									}
										// Utilisateur déjà dans la base de donnée
									else {
									?>     
									<script>console.log('Utilisateur déjà dans la base de donnée !');</script>
									<?php	
									header("Location:inscription.php");}
						}
						else{
							header("Location:inscription.php");
						}
			}catch (Throwable $e){
				// lancera l'exception
				echo "TOTO";
				var_dump($e);
				error_log($e->getMessage());
				// header("Location:login.php");
			}												
?>