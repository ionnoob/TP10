<?php
	include('ouverture_bdd.php');
	$reponse = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire) 
    VALUES (:id_billet, :auteur, :commentaire)');
  $reponse->execute(array(
    'id_billet' => $_POST['id_billet'],
    'auteur' => $_POST['auteur'],
    'commentaire' => $_POST['commentaire']
  ));
  header('Location: commentaires.php?billet='.$_POST['id_billet']);
?>