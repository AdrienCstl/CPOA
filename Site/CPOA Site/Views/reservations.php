<?php
		$title='Liste des réservations';
		$pageCSS='reservations';
		ob_start(); //mise en tempon début



		echo "<table id='tableReservation'> <th>Nom</th> <th>VIP</th> <th>Hebergement</th> <th>Date Arrivée</th> <th>Heure Arrivée</th> <th>Date départ</th><th>...</th>";

		foreach ($listeReservation as $reservation)
				echo '
						<tr>
							<td >'.$reservation["nom"].'</td>
							<td>'.$reservation["nomVIP"].' '.$reservation["prenomVIP"].'</td>
							<td>'.$reservation["nomHebergement"].' </td>
							<td>'.$reservation["dateArrivee"].'</td>
							<td>'.$reservation["heureArrivee"].'</td>
							<td>'.$reservation["dateDepart"].'</td>
							<td><a href="index.php?action=annulerReservation&idreservation='.$reservation["IDReservation"].'">Annuler</a></td>

						</tr>';

			echo '</table>';








			echo '</div>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("./Views/layout.php"); //appelle layout avec le nouveau content



?>
