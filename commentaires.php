<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page de commentaires</title>
</head>
<body>
	<h1>Voici le numéro du billet</h1>
	 <?php  
  include('ouverture_bdd.php');

  $reponse = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation_fr FROM billets WHERE id = ?');
  $reponse->execute(array($_GET['billet']));
  while ($donnees = $reponse->fetch())
  {
  ?>

  <div class="contient_billet">
    <div class="contient_titre">
      <strong><?php  echo htmlspecialchars($donnees['titre']); ?></strong> :
      <?php echo $donnees['date_creation_fr']; ?> 
    </div>
    <div class="contient_contenu">
       <?php  echo htmlspecialchars($donnees['contenu']); ?>
    </div>
  </div>
  <br />

  <?php  
  }
  $reponse->closeCursor(); 
  ?>

  
  <hr />
  <h1>Commentaires</h1>
  
  <?php  
  include('ouverture_bdd.php');

  $reponse = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") AS date_creation_fr FROM commentaires WHERE id_billet = ?');
  $reponse->execute(array($_GET['billet']));
  while ($donnees = $reponse->fetch())
  {
  ?>

  <div class="contient_billet">
    <div class="contient_titre">
      <strong><?php  echo htmlspecialchars($donnees['auteur']); ?></strong> :
      <?php echo $donnees['date_creation_fr']; ?> 
    </div>
    <div class="contient_contenu">
       <?php  echo htmlspecialchars($donnees['commentaire']); ?>
    </div>
  </div>
  <br />

  <?php  
  }
  $reponse->closeCursor(); 
  ?>

  

  <hr />
  <h2>Ajouter un commentaire</h2>
	<h2>Formulaire</h2>
  <form name="form1" action="ajout_commentaire.php" method="POST">
  	<input type="number" name="id_billet" value="<?php echo $_GET['billet']; ?>" hidden>
    <p><label for="auteur">Auteur : </label>
      <input type="text" name="auteur" id="auteur"></p>
    <p><label for="commentaire">Laisser un commentaire : </label> <br/>
      <textarea type="text" name="commentaire" id="commentaire"/
      rows="10" cols="50"></textarea></p>
    <p>
      <input type="submit" value="Envoyer">
    </p>
  </form>
</body>
</html>