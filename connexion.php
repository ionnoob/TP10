<?php
	session_start();
	include('ouverture_bdd.php');
	$reponse = $bdd->prepare('SELECT * FROM membres WHERE identifiant = :identifiant AND mot_de_passe = :mot_de_passe');
  	$reponse->execute(array(
  		'identifiant' => $_POST['identifiant'],
  		'mot_de_passe' => $_POST['mot_de_passe']
  	));
  	$correspondance = $reponse->fetch();
  	if(!$correspondance) {
  		$_SESSION['erreur'] = 'oui';
  		header('location: index.php');
  		Exit();
  	} else {
  		$_SESSION['id'] = $correspondance['id'];
  		$_SESSION['nom'] = $correspondance['nom'];
  		$_SESSION['prenom'] = $correspondance['prenom'];
  		$_SESSION['identifiant'] = $correspondance['identifiant'];
  		$_SESSION['derniere_heure_de_connexion'] = time();
  		header('location: menu.php');
  	}
?>