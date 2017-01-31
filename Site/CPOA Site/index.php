<?php
session_name ('user'); //nommer la session
session_start (); //start la session actuelle
require_once("Model/UsersManager.php");
require_once("Model/HebergementsManager.php");
require_once("Model/VIPManager.php");
require_once("Model/reservationManager.php");


$um1 = new UsersManager();
$hm = new HebergementsManager();
$vm = new VIPManager();
$rm = new reservationManager();
$listeHotels = $hm->getHebergements();
$listeVIP = $vm->getVIP();
$listeReservation = $rm ->getReservation();
$listeGerant = $um1->getGerant();





if( isset($_POST['identifiant']) && isset($_POST['motDePasse']) ) //on test que les login soit entrés
{


	$testConnexion = $um1->getUsers($_POST['identifiant'],$_POST['motDePasse']);
	if ($testConnexion == false) //si mauvais logins
	{
		require('Views/connexion.php');

	}else //sinon on ouvre une session utilisateur
	{

		$_SESSION ['Login'] = $_POST['identifiant']; // stocke la variable de session avec l'identifiant de l'utilisateur
		header('Location: ./');

	}
}


if(isset($_SESSION ['Login'])) //si un utilisateur est connecté
{

	$um2 = new UsersManager();
	$prenom = $um2->getUserName($_SESSION ['Login']);
	$utilisateurID = $um2->getUserID($_SESSION ['Login']);
	$statutUtilisateur = $um2->getStatut($_SESSION ['Login']);
	$listeHotelsGerant = $hm->getHebergementsByIDGerant($utilisateurID);


	if(isset($_GET["action"]))
	{
		if ($_GET["action"] == "deconnexion")
		{
			$_SESSION = array();
			session_unset ();
			session_destroy ();
			header('Location: ./');
			exit(0);
		}
		elseif ($_GET["action"] == "ajouterHebergement") {
			if(isset($_POST['NomHebergement']) && isset($_POST['TypeHebergement']) && isset($_POST['NombrePlacesHebergement']))
			{


				if(isset($_POST['IDGerant']))
				{
					$IDHebergement = $hm->addHebergement($_POST['NomHebergement'],$_POST['TypeHebergement'],$_POST['NombrePlacesHebergement'],0,$utilisateurID);
				}else {

					$IDHebergement = $hm->addHebergement($_POST['NomHebergement'],$_POST['TypeHebergement'],$_POST['NombrePlacesHebergement'],0,$_POST['IDGerantParMembre']);

				}


				$inc = 0;

				while(isset($_POST['nomService'.$inc]))
				{

					$hm->addService($_POST['nomService'.$inc],$IDHebergement);
					$inc++;
				}


				header('Location: index.php');
			}
		}
		elseif ($_GET["action"] == "modifierHebergement" && isset($_GET["id"]) ) {
			if(isset($_POST['NomHebergement']) && isset($_POST['TypeHebergement']) && isset($_POST['NombrePlacesHebergement']))
			{
				 $hm->modifyHebergement($_POST['NomHebergement'],$_POST['TypeHebergement'],$_POST['NombrePlacesHebergement'],$_GET["id"]);

				$inc = 0;

				while(isset($_POST['nomService'.$inc]))
				{

					$hm->addService($_POST['nomService'.$inc],$_GET["id"]);
					$inc++;
				}

				header('Location: index.php');
			}
		}
			elseif ($_GET["action"] == "affecter")
			{
				if(isset($_POST['vip']) && isset($_POST['hotel']))
				{
					$rm->setReservation($_POST['vip'],$_POST['hotel'],$_POST['nomReservation'],$_POST['dateReservation'],$_POST['heureArrivee'],$_POST['dateDepart']);
					$hm->setNbPlace($_POST['IDHebergementReservation']);
						header('Location: index.php');
				}else {
					echo "Vous devez remplir tous les champs";
				}

			}
			elseif ($_GET["action"] == "annulerReservation" && isset($_GET['idreservation']) )
			{
				$rm->annulerReservation($_GET['idreservation']);
				header('Location: index.php?page=reservations');
			}
			elseif ($_GET["action"] == "supprimerHebergement" && isset($_GET['idhebergement']) )
			{
				$hm->supprimerService($_GET['idhebergement']);
				$rm->supprimerReservationByHebergement($_GET['idhebergement']);
				$hm->supprimerHebergement($_GET['idhebergement']);
				header('Location: index.php');
				echo "oui";

			}




	}
	else if(isset($_GET["page"]))
	{


/*----------------------------------------ACCUEIL----------------------------------------*/

			if ($_GET["page"] == "accueil")
			{

				require_once("Views/accueil.php");
			}
			elseif ($_GET["page"] == "ajout")
			{
				require_once("Views/AjoutHebergement.php");
			}
			elseif ($_GET["page"] == "modifier" && isset($_GET["id"]))
			{
				$hebergemenByID = $hm -> getHebergementByID($_GET["id"]);

				require_once("Views/modifierHebergement.php");

			}
				elseif ($_GET["page"] == "reservations" )
				{
						require_once("Views/reservations.php");
				}


	}
	else
		{
			require_once("Views/accueil.php");
		}

}
else //si personne n'est connecté, on afficher la page de connexion
{
		require_once("Views/connexion.php");
}



?>
