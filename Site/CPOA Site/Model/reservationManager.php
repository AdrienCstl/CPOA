<?php
		require_once ("Model.php");
	 	class reservationManager extends Model
		{

      public function setReservation($IDVIP,$IDHebergement,$nomReservation,$dateArrivee,$heureArrivee,$dateDepart)
     {

       $requete = $this->executerRequete('INSERT INTO Reservation (IDVIP, IDHebergement, nom, dateArrivee, heureArrivee, dateDepart) values (?,?,?,?,?,?)',array($IDVIP,$IDHebergement,$nomReservation,$dateArrivee,$heureArrivee,$dateDepart));

     }
		 public function getReservation()
 		{
 			$requete = $this->executerRequete('SELECT Reservation.*, vip.nom as nomVIP, vip.prenom  as prenomVIP , Hebergement.nomHebergement as nomHebergement FROM Reservation  join  vip on Reservation.IDVIP = vip.IDVIP  join Hebergement on Hebergement.IDHebergement = Reservation.IDHebergement '	);
 			$data = $requete->fetchall(PDO::FETCH_ASSOC);
 			return $data;
 		}
		public function annulerReservation($IDReservation)
	 {

		 $requete = $this->executerRequete('DELETE FROM Reservation where IDReservation = ? ',array($IDReservation));

	 }
	 public function supprimerReservationByHebergement($IDHebergement)
	{

		$requete = $this->executerRequete('DELETE FROM Reservation where IDHebergement = ? ',array($IDHebergement));

	}


	}
