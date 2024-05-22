<?php // URL écrite en PHP
			session_start();
			
			$servername = 'localhost';
            $username = 'root';
            $password = '';
			$bdd = 'membres';
            
            // on essaie de se connecter
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);
                // on définit le mode d'erreur de PDO sur Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Connexion réussie';
				if(isset($_POST['email'])){
									$sth = $conn->prepare("SELECT email FROM `personne` WHERE email = :email"); // demander la correspondance email
									$sth->bindParam(':email' , $_POST['email']);    
									$sth->execute();
									$resultat = $sth->fetch(PDO::FETCH_ASSOC);
									// cherche l'unicité d'un tel enregistrement 
									if(isset($resultat['email'])){ // cas avec succès		
										// écriture sur la console du navigateur 																														
										?>     
										<script>console.log('correspondance email trouvée');</script>
								   <?php
								   // traitement spécifique	avec renvoie par email d'un mot de passe ...
								   // Ici le code ?
								   // fin du traiement spécifique							
									header("Location: confirmation-email.php");}								
								else{ // pas de traitement spécifique															
								header("Location: confirmation-email.php"); 
									}
								}
				} 
							            
            
            /* On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci */
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>