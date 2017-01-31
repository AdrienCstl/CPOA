<?php
		$title='Accueil';
		$pageCSS='accueil';
		ob_start(); //mise en tempon début

		echo '

			<div id="corpsAccueil">
			';
			if($statutUtilisateur == 0)
			{
			echo '<div id="boite">';
			echo '	<a class="btn" id="btnAjout" >Ajouter un Hébergement</a>';
			echo '<div id="ajout">

			<form  method="post" action="index.php?action=ajouterHebergement">

				<label>Nom</label>
				<input type="text" name="NomHebergement" required >

				<label>Type</label>
				<input type="text" name="TypeHebergement" required >

				<label>Nombre de places</label>
				<input type="number" name="NombrePlacesHebergement" required min="0">

				<label>Services (entrer Null si pas de service)</label><a href="#" onclick="addFields()"><br>+</a><br>
				<div id="services">
				<input type="text" name="nomService0"  required >
				</div>
				<input type="hidden" name="IDGerant" value="'.$utilisateurID.'" >
				<button>Ajouter</button>


			</form>
			<a class="button" type="button" value="Retour" href="index.php?page=accueil" >Retour</a>
			</div>';
			echo "<table id='tabListeHotels'> <th>Nom</th> <th>Type</th> <th>Nombre de places</th> <th>Service(s)</th>";

			foreach ($listeHotelsGerant as $hotel)
					echo '
							<tr>
								<td class="nh">'.$hotel["nomHebergement"].'</td>
								<td>'.$hotel["type"].'</td>
								<td>'.$hotel["nb_places_dispo"].'</td>
								<td>'.$hotel["nom"].'</td>
								<td> <a class="modifier" href="index.php?page=modifier&id='.$hotel["IDHebergement"].'"> Modifier</a> </td>

							</tr>';

				echo '</table>';
				echo '</div>';
			}




			else if($statutUtilisateur == 1)
			{






				echo '<div id="boite">';
				echo '	<a class="btn" id="btnAjout" >Ajouter un Hébergement</a>';
				echo '<a  class="btn" id="btnListeReservation" href="index.php?page=reservations"> Afficher les réservations</a>';
				echo '<a  class="btn" id="btnAffect" href="#"> Affecter un VIP</a>';

				echo '<div id="ajout">

	      <form  method="post" action="index.php?action=ajouterHebergement">

	        <label>Nom</label>
	        <input type="text" name="NomHebergement" required >

	        <label>Type</label>
	        <input type="text" name="TypeHebergement" required >

	        <label>Nombre de places</label>
	        <input min="0" type="number" name="NombrePlacesHebergement" required >

					<label>Gérant de l\'hebergement</label>
					<select type="text" name="IDGerantParMembre" required>';
	        foreach ($listeGerant as $gerant) {
	            echo '<option value="'.$gerant['utilisateurID'].'">'.$gerant['prenom'].' '.$gerant['nom'].'</option>';
	        }

	        echo '</select>

	        <label>Services (entrer Null si pas de service)</label><a href="#" onclick="addFields()"><br>+</a><br>
	        <div id="services">
	        <input type="text" name="nomService0"  required >
					</div>

	        <button>Ajouter</button>


	      </form>
				<a class="button" type="button" value="Retour" href="index.php?page=accueil" >Retour</a>
				</div>';





				echo '<div id="affect" ><form  method="post" action="index.php?action=affecter">
	        <label for="vip">Nom Prenom</label>
	        <select type="text" name="vip" required>';
	        foreach ($listeVIP as $vip) {
	            echo '<option value="'.$vip['IDVIP'].'">'.$vip['prenom'].' '.$vip['nom'].'</option>';
	        }

	        echo '</select>

	        <label>Hébergement</label>
	        <select type="text" name="hotel" required>';

	        foreach ($listeHotels as $hotel) {
	            echo '<option value='.$hotel['IDHebergement'].' >'.$hotel['nomHebergement'].'</option>';
	        }

	        echo '
	        </select>
					<input type="hidden" value='.$hotel['IDHebergement'].' name="IDHebergementReservation">
					<label>Nom</label>
					<input type="text" name="nomReservation"  required>
					<label>Date</label>
					<input type="date"  name="dateReservation" required min="2017-01-01">
					<label>Heure Arrivée</label>
					<input type="time"  name="heureArrivee" required min="00:00">
					<label>Date Départ</label>
					<input type="date"  name="dateDepart" required min="2017-01-01">

	        <button>Affecter</button>

					<a class="button" type="button" value="Retour" href="index.php?page=accueil" >Retour</a>
	      </form>
				</div>
				</div>';

				echo "<table id='tabListeHotels'> <th>Nom</th> <th>Type</th> <th>Nombre de places</th> <th>Service(s)</th>";

				foreach ($listeHotels as $hotel)
						echo '
								<tr>
									<td class="nh">'.$hotel["nomHebergement"].'</td>
									<td>'.$hotel["type"].'</td>
									<td>'.$hotel["nb_places_dispo"].'</td>
									<td>'.$hotel["nom"].'</td>
									<td> <b><a class="modifier" href="index.php?page=modifier&id='.$hotel["IDHebergement"].'"> Modifier</a> </b></td>
								</tr>';

					echo '</table>';

			}








			echo '</div>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("./Views/layout.php"); //appelle layout avec le nouveau content



?>
