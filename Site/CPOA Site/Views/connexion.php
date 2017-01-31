
<html>
<head>


	<link href="./style/connexion.css" media="all" rel="stylesheet " type="text/css" />
</head>

<?php

		echo '



				<div id="boxLogin">

						<h1 class="titreConnexion">Connexion</h1>

					<div id="WarpperForm">
						<p>Pour vous connecter, veuillez remplir les champs utilisateur et mot de passe suivants:</p>

							<form method ="post" action="index.php" >
								<label>identifiant</label>
								<input name="identifiant" size="20" maxlength="20" type="text" required="" placeholder="ex: oui"/><br>
								<label>Mot de passe</label>
								<input name="motDePasse" size="20" maxlength="55" type="password" required=""/>

								';
								if(isset($testConnexion) && $testConnexion == false)
								{
									echo "<p class='echec'>Erreur  identifiants incorrects</p>";
								}
								echo '

								<button>SE CONNECTER</button>
							</form>

					</div>
				</div>



			';

?>
</body>

</html>
