<?php
		require_once ("Model.php");
	 	class UsersManager extends Model
		{

		public function getUsers($login,$pass)
		{
			$requete = $this->executerRequete('SELECT identifiant, motDePasse FROM Utilisateurs where identifiant = ? and motDePasse = ?', array($login,$pass));
			$data = $requete->fetch();
			return $data;
		}



		public function getUserName($login)
		{
			$requete = $this->executerRequete('SELECT prenom FROM Utilisateurs where identifiant = ?', array($login));
			$data = $requete->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function getUserID($login)
		{
			$req = $this->executerRequete('SELECT utilisateurID FROM Utilisateurs WHERE identifiant=?', array($login));
			$data=$req->fetch(PDO::FETCH_ASSOC);
			return $data['utilisateurID'];
		}

		public function getStatut($login)
		{
			$req = $this->executerRequete('SELECT Utilisateurs.statut FROM Utilisateurs WHERE identifiant=?', array($login));
			$data=$req->fetch();
			return $data['statut'];
		}

		public function getGerant()
		{
			$req = $this->executerRequete('SELECT statut, nom,prenom,utilisateurID FROM Utilisateurs WHERE statut=0');
			$data=$req->fetchALL(PDO::FETCH_ASSOC);
			return $data;
		}




	/*	public function addUser($para)
		{
			$requete = $this->executerRequete('insert into User(Login, Pass, Nom, Mail) values(?, ?, ?, ?), array($para['Login'], $para['Pass'], $para['Nom'], $para['Mail']) ')
		}*/


	}
