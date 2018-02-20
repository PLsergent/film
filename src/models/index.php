<?php
// Textes
define('ERREUR_CONNECT_BDD','Erreur de connection à la base de données');
define('ERREUR_INSCRIPTION', "Login inconnu");
define('ERREUR_QUERY_BDD',"Erreur d'accès à la base de données");
define('SUBMIT', "Valider");
define('NOM', "Login");

// Contrôle - Neutralisation du paramètre reçu
if (isset($_POST['nom']))
{
  $nom =  htmlspecialchars($_POST['nom']);
}

// accès base de données
// connection à la base de données
try
{
	$bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8', BD_USER, BD_PWD);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	die(ERREUR_CONNECT_BDD.' : '.$e->getMessage());
}

// s'il n'y a pas d'erreurs : recherche dans la base de l'utilisateur
if(isset($nom))
{
	$requete = "SELECT * FROM Utilisateur where login = ?";
	$donnees = array(
					$nom
					);
	try
	{
		$query = $bdd->prepare($requete);
		$query->execute($donnees);
		if(!$resultats = $query->fetch(PDO::FETCH_ASSOC))
		{
			$erreur = ERREUR_INSCRIPTION;
		}
	}
	catch(PDOException $e)
	{
		die(ERREUR_QUERY_BDD.' : '.$e->getMessage());
	}
}
