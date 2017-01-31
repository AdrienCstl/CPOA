<?php
		require_once ("Model.php");
	 	class VIPManager extends Model
		{

      public function getVIP()
     {
       $requete = $this->executerRequete('SELECT * FROM vip');
       $data = $requete->fetchALL(PDO::FETCH_ASSOC);
       return $data;
     }

	}
