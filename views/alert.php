<?php
/*
 * TP PHP
 * Vue alert
 *
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * alerts: http://www.w3schools.com/bootstrap/bootstrap_alerts.asp
 */

// fonction d'affichage des alertes
function alert($classeAlert, $messageAlert) 
{
	?>
	<div class="alert alert-<?php echo $classeAlert; ?>">
		<strong><?php echo $messageAlert; ?></strong>
	</div>
	<?php
}

// vérification et traitement du message reçu
if(isset($message))
{
	// on definit la classe et le message à afficher et on l'affiche
	switch($message) {
	 // Generiques
		case "page_non_trouvee":
			alert('danger',TEXTE_PAGE_404);
		break;
	// Default pour message inconnu
		default: 
			alert('danger',MESSAGE_ERREUR);
	}
}

