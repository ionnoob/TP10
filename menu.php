<?php
	session_start();
	if(isset($_SESSION['prenom'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Page de menu</title>
	<style>
		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
			color: #333;
			margin: 0;
			padding: 0;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}
		h1 {
			color: #4CAF50;
			margin-bottom: 20px;
			text-align: center;
		}
		.user-info {
			background: #fff;
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			max-width: 400px;
			width: 100%;
			text-align: left;
			margin-bottom: 20px;
		}
		.user-info p {
			margin: 10px 0;
			font-size: 16px;
		}
		a {
			color: #4CAF50;
			text-decoration: none;
			font-size: 16px;
			transition: color 0.3s;
			margin-top: 20px;
		}
		a:hover {
			color: #388E3C;
		}
	</style>
</head>
<body>
	<h1>Bienvenue sur la page de menu</h1>
	<div class="user-info">
		<p><?php echo 'Votre id : ' . $_SESSION['id']; ?></p>
		<p><?php echo 'Votre nom : ' . $_SESSION['nom']; ?></p>
		<p><?php echo 'Votre prénom : ' . $_SESSION['prenom']; ?></p>
		<p><?php echo 'Votre identifiant : ' . $_SESSION['identifiant']; ?></p>
		<p><?php echo 'Votre dernière heure de connexion : ' . $_SESSION['derniere_heure_de_connexion']; ?></p>
	</div>
	<a href="index.php">Se déconnecter</a>
	<a href="commentaires.php">Voir les commentaires</a> <!-- Added link to commentaires.php -->
</body>
</html>
<?php
	} else {
		header('Location: index.php');
	}
?>
