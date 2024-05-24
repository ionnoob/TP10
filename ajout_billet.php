<?php
	include('ouverture_bdd.php');
	$reponse = $bdd->prepare('INSERT INTO billets(titre, contenu) 
    VALUES (:titre, :contenu)');
  $reponse->execute(array(
    'titre' => $_POST['titre'],
    'contenu' => $_POST['contenu']
  ));
  header('Location: index.php');
?>