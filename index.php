<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Page d'accueil</title>
	<style>
		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
			color: #333;
			margin: 0;
			padding: 0;
			align-items: center;
			height: 100vh;
		}
		.Header{
			display: flex;
			width: 600px;
			margin: auto;
		}
		.form{
			display: flex;
			width: 500px;
			margin: auto;
		}
		.link{
			display: flex;
			width: 400px;
			margin: auto;
		}
		h1 {
			color: #4CAF50;
			margin-bottom: 20px;
		}
		form {
			background: #fff;
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			max-width: 400px;
			width: 100%;
		}
		p {
			margin: 20px 0;
		}
		label {
			display: block;
			margin-bottom: 8px;
			font-weight: bold;
			color: #555;
		}
		input[type="text"] {
			width: 100%;
			padding: 12px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 14px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 12px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			transition: background-color 0.3s;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		.error {
			color: red;
			margin-bottom: 20px;
		}
		hr {
			margin: 30px 0;
			border: 1px solid #ddd;
		}
		h2 a {
			color: #4CAF50;
			text-decoration: none;
			transition: color 0.3s;
		}
		h2 a:hover {
			color: #388E3C;
		}
	</style>
</head>
<body>
   <div class="Header">
	<h1>Bienvenue sur la page d'accueil</h1>
   </div>
	<?php
		if(isset($_SESSION['erreur'])) {
			if($_SESSION['erreur'] == 'oui') {
				echo "<p class='error'>Erreur d'identification.</p>";
			}
		}
	?>

   <div class="form">
	<form action="connexion.php" method="POST">
		<p>
			<label for="identifiant">Votre identifiant :</label>
			<input type="text" name="identifiant" id="identifiant">
		</p>
		<p>
			<label for="mot_de_passe">Votre mot de passe :</label>
			<input type="text" name="mot_de_passe" id="mot_de_passe">
		</p>
		<p>
			<input type="submit" name="valider" value="Valider">
		</p>
	</form>
	</div>

	<hr />
   <div class="link">
	<h2><a href="inscription.php">Aller en page d'inscription</a></h2>
   </div>
</body>
</html>
