<?php
	session_start();
	$mdp = $_POST['mot_de_passe'];
	$mdp_confirm = $_POST['mot_de_passe_confirm'];
	if($mdp != $mdp_confirm) {
		$_SESSION['erreur'] = 'mots_de_passe_differents';
		header('location: inscription.php');
		Exit();
	} else {
		include('ouverture_bdd.php');
		$identifiant = $_POST['identifiant'];
		$verification = "SELECT * FROM membres WHERE identifiant = '$identifiant'";
		$reponse = $bdd->prepare($verification);
		$reponse->execute();
		if($reponse->rowCount() > 0) {
			$_SESSION['erreur'] = 'identifiant_deja_existant';
			header('location: inscription.php');
			Exit();
		}


		include('ouverture_bdd.php');
		$reponse = $bdd->prepare('INSERT INTO membres(nom, prenom, identifiant, mot_de_passe, mot_de_passe_confirm, departement) 
	    VALUES (:nom, :prenom, :identifiant, :mot_de_passe, :mot_de_passe_confirm, :departement)');
	  $reponse->execute(array(
	    'nom' => $_POST['nom'],
	    'prenom' => $_POST['prenom'],
	    'identifiant' => $_POST['identifiant'],
	    'mot_de_passe' => $_POST['mot_de_passe'],
	    'mot_de_passe_confirm' => $_POST['mot_de_passe_confirm'],
	    'departement' => $_POST['departement']
	  ));
	  header('Location: index.php');
	}
?>