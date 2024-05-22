<script src="../js/index.js" async></script>
<script src="../js/miser.js" async></script>
<script src="../js/vignettes.js" async></script>
<?php
	// On inclu les paramètres dynamiques 'matchs.php' dans le modèle de 'vignettes.php'
	session_start();
	include_once '../data/matchs.php';

		foreach($matchs as $match){	
			$jsonEncodedMatche = json_encode($match);
			$matchIsOver = isset($match['scoreA']);
			$matchState = $matchIsOver ? "Terminé" : "A venir";
			$matchStateColor = $matchIsOver ? "red" : "green";
			$matchStateStyle = "text-align:center;margin-top:2%;color:" . $matchStateColor;

			$maxCote = $match['coteEquipeA'] + $match['coteEquipeB'];
			$coteAPercentage = $match['coteEquipeB'] * 100 / $maxCote;
			$coteBPercentage = $match['coteEquipeA'] * 100 / $maxCote;
			$coteAProgressBarStyle = "width:" . $coteAPercentage . "%";
			$coteBProgressBarStyle = "width:" . $coteBPercentage . "%";

			$userIsConnected = isset($_SESSION['role']) && $_SESSION['role'] == "utilisateur";
			$parieClickFunction = '\'parier(' . json_encode($match) .');\'';
			
			?>

			<!-- Résumé ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<?php echo '<br/>'; ?>			
	<div id="effectifs" class="details">
	<hr>				
		<p><span class="titre"><?= $match['titre']; ?></span></p>
			<p><?= $match['intitulé']; ?></p>
	<hr>
			<p><?= $match['horaire']; ?></p>
			<p><?= $match['météo']; ?></p>
	</div>				


			<!-- Card dynamique ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
			<div class="vignette">	
				<div><img src=<?= $match['coverImage'] ?> width="450px" height="200px" style="border-radius:35px 35px 0 0" onclick='effectifs()' /></div>
					<div style="display:grid;grid-template-columns: 33% 33% 33%;gap:5px;text-align:center;">	
						<div>&nbsp;</div>
						<div style="color:white;font-weight:bold;text-align:center;margin-top:2%;">Match NFL<span style="display:block;font-size:0.6rem"><?= $match['date'] ?></span></div>
						<div style=<?= $matchStateStyle ?>><?= $matchState ?></div>

						<div style="float:right;color:white;font-weight:bold;margin-top:2%;"><?= $match['nameEquipeA'] ?></div>
							<?php
								if($matchIsOver) { 
									$displayedScore = $match['scoreA'] . ' - ' . $match['scoreB'];
							?>
						<div><button style="color: white;background-color:rgba(225, 0, 20, 0.5);border-radius:5px;margin: 0 5px 0 5px"><?= $displayedScore ?></button></div>
						<div style="color:white;font-weight:bold;text-align:center;margin-top:2%;"><?= $match['nameEquipeB'] ?></div>
						
							<?php } 
								 else {
							?> 			
						<div>&nbsp;</div>
						<div style="color:white;font-weight:bold;text-align:center;margin-top:2%;"><?= $match['nameEquipeB']; ?></div>

						<div><button class="parier gagne" id="EquipeA" onclick='parier(<?= $userIsConnected ? htmlspecialchars(json_encode($match)) : "null" ?>, "A");'><span style="font-size:12px"><?= $match['nameEquipeA']; ?></span><span style="display:block"><?= $match['coteEquipeA']; ?></span></button></div>
						<div>&nbsp;</div>
						<div><button class="parier" id="EquipeB" onclick='parier(<?= $userIsConnected ? htmlspecialchars(json_encode($match)) : "null" ?>, "B");'><span style="font-size:12px"><?= $match['nameEquipeB']; ?></span><span style="display:block"><?= $match['coteEquipeB']; ?></span></button></div>
						
						<div class="progress">
							<div class="progress-bar bg-success" role="progressbar" style=<?= $coteAProgressBarStyle ?> aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<div>&nbsp;</div>
						<div class="progress">
							<div class="progress-bar bg-danger" role="progressbar" style=<?= $coteBProgressBarStyle ?> aria-valuemin="0" aria-valuemax="100"></div>
						</div>	
					<?php } ?>
					</div>
				</div>
			</div>
				 	
					<p>&nbsp;</p>		
			

		<!-- Effectifs + Hide ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		
<div style="display:grid;grid-template-columns: 50% 50%;text-align:center;gap:25px;">
	<div class="equipe" style="width:80%" onclick="displayEffectif(this,2)"><?= $match['nameEquipeA']; ?></div>
	<div class="equipe" style="width:80%" onclick="displayEffectif(this,3)"><?= $match['nameEquipeB']; ?></div>
	
		<!-- Effectif A -->
	<div id="effectifs" style="visibility: hidden; height:0">
			<?php 	
			foreach ($match as $key => $value){		
				if($key == 'effectifA'){	
					foreach ($value as $subcle => $subval){
							echo '<strong>' . $subcle . '</strong>' . '<br/>' . '<br/>';
							foreach ($subval as $subsubcle => $subsubval){	
							echo $subsubval . '<br/>';}
							echo '<br/>';
						}	
				}
			}
			?>
	</div>
		<!-- Effectif B -->
		<div id="effectifs" style="visibility: hidden; height:0">	
				<?php 
				foreach ($match as $key => $value){		
					if($key == 'effectifB'){	
						foreach ($value as $subcle => $subval){
								echo '<strong>' . $subcle . '</strong>' . '<br/>' . '<br/>';
								foreach ($subval as $subsubcle => $subsubval){	
								echo $subsubval . '<br/>';}
								echo '<br/>';
							}	
					}
				}
				?>
		</div>
</div>
<p>&nbsp;</p>			
	<?php } ?>

			<!-- // pour logger en php une array
			// $json = json_encode($match);
			// echo "<script>console.log($json)</script>"; -->