<?php
		require_once ("Model.php");
	 	class HebergementsManager extends Model
		{


		public function getHebergements()
		{
			$requete = $this->executerRequete('SELECT DISTINCT Hebergement.* ,  GROUP_CONCAT(nom SEPARATOR ", " ) as nom  FROM Hebergement  join Services on Services.IDHebergement = Hebergement.IDHebergement group by IDHebergement'	);
			$data = $requete->fetchall(PDO::FETCH_ASSOC);
			return $data;
		}
		public function getHebergementsByIDGerant($IDGerant)
		{
			$requete = $this->executerRequete('SELECT DISTINCT Hebergement.* ,  GROUP_CONCAT(nom SEPARATOR ", " ) as nom  FROM Hebergement  join Services on Services.IDHebergement = Hebergement.IDHebergement where IDGerant = ? group by IDHebergement',array($IDGerant));
			$data = $requete->fetchall(PDO::FETCH_ASSOC);
			return $data;
		}

		public function getHebergementByID($IDHebergement)
		{
			$requete = $this->executerRequete('SELECT DISTINCT Hebergement.* ,  GROUP_CONCAT(nom SEPARATOR ", " ) as nom  FROM Hebergement  join Services on Services.IDHebergement = Hebergement.IDHebergement and Hebergement.IDHebergement = ?',array($IDHebergement));
			$data = $requete->fetch();
			return $data;
		}

		public function getIDHebergement($nomHebergement)
		{
			$requete = $this->executerRequete('SELECT IDHebergement FROM Hebergement where nomHebergement = ? ',array($nomHebergement));
			$data = $requete->fetch();
			return $data;
		}

		public function addHebergement($nomHebergement,$type,$nb_places_dispo,$Nb_service,$IDGerant)
		{
				$requete = $this->executerRequete('INSERT INTO Hebergement (nomHebergement,type,nb_places_dispo,Nb_service,IDGerant) values (?,?,?,?,?) ', array($nomHebergement,$type,$nb_places_dispo,$Nb_service,$IDGerant));
					$id = $this->getBdd()->lastInsertId();
				 return $id;

		}
		public function addService($nomService,$IDHebergement)
		{
			$req = $this->executerRequete('SELECT IDService from Services where nom = ? and IDHebergement = ?', array($nomService,$IDHebergement));
			$nbser = $req->fetch();
			if ($nomService != "" &&  $nbser == false )
			{
				$requete = $this->executerRequete('INSERT INTO Services (nom,IDHebergement) values (?,?) ', array($nomService,$IDHebergement));
			}

		}


		public function modifyHebergement($nomHebergement,$type,$nb_places_dispo,$idHebergement)
		{
				$requete = $this->executerRequete('UPDATE Hebergement SET nomHebergement = ? , type = ? , nb_places_dispo = ? where IDHebergement = ?', array($nomHebergement,$type,$nb_places_dispo,$idHebergement));


		}
		public function supprimerHebergement($IDHebergement)
	 {

		 $requete = $this->executerRequete('DELETE FROM Hebergement where IDHebergement = ? ',array($IDHebergement));

	 }
	 public function supprimerService($IDHebergement)
	{

		$requete = $this->executerRequete('DELETE FROM Services where IDHebergement = ? ',array($IDHebergement));

	}
	public function setNbPlace($IDHebergement)
	{
			$requete = $this->executerRequete('UPDATE Hebergement SET nb_places_dispo = (nb_places_dispo - 1) where IDHebergement = ? ', array($IDHebergement));


	}




	}
