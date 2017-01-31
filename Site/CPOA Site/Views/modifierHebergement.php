<?php
		$title='Modifier Hébergement';
		$pageCSS='modfierHebergement';
		ob_start(); //mise en tempon début

		echo '

			<div id="corpsModification">







        <form  method="post" action="index.php?action=modifierHebergement&id='.$hebergemenByID["IDHebergement"].'">
          <fieldset>
            <label>Nom</label>
            <input type="text" name="NomHebergement" value="'.$hebergemenByID["nomHebergement"].'">
            <label>Type</label>
            <input type="text" name="TypeHebergement" value="'.$hebergemenByID["type"].'">
            <label>Nombre de places</label>
            <input type="number" min="0" name="NombrePlacesHebergement" value="'.$hebergemenByID["nb_places_dispo"].'">

            <label>Services</label><a href="#" onclick="addFields()">+</a>
            <div id="services">
            <input type="text" name="nomService0" placeholder="'.$hebergemenByID["nom"].'"><br>
          </fieldset>


          <button>Modifier</button>

          <a class="button" type="button" value="Retour" href="index.php?page=accueil" >Retour</a>
					  <a class="button" type="button" value="Retour" href="index.php?action=supprimerHebergement&idhebergement='.$hebergemenByID["IDHebergement"].'" >Supprimer l\'Hébergement</a>
        </form>











			 </div>';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("./Views/layout.php"); //appelle layout avec le nouveau content



?>
