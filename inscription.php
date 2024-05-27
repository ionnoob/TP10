<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page inscription</title>
	<style>
		body {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
			color: #333;
			margin: 0;
			padding: 0;
			
			align-items: center;
			justify-content: center;
			height: 100vh;
		}
		h1 {
			color: #4CAF50;
			margin-bottom: 20px;
			text-align: center;
		}
		form {
			background: #fff;
			padding: 30px;
			border-radius: 15px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			max-width: 400px;
			width: 100%;
			margin: auto;
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
		input[type="text"], input[type="password"] {
			width: 100%;
			padding: 12px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-sizing: border-box;
			font-size: 14px;
		}
		select {
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
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Inscription</h1>

	<?php
		if(isset($_SESSION['erreur'])) {
			if($_SESSION['erreur'] == 'mots_de_passe_differents') {
				echo "<p class='error'>Les deux mots de passe sont différents</p>";
			}
			if($_SESSION['erreur'] == 'identifiant_deja_existant') {
				echo "<p class='error'>L'identifiant est déjà existant</p>";
			}
		}
	?>

	<form method="post" action="ajout_membre.php">
		<p>
			<label for="prenom">Votre prénom :</label>
			<input type="text" name="prenom" id="prenom">
		</p>
		<p>
			<label for="nom">Votre nom :</label>
			<input type="text" name="nom" id="nom">
		</p>
		<p>
			<label for="identifiant">Votre identifiant :</label>
			<input type="text" name="identifiant" id="identifiant">
		</p>
		<p>
			<label for="mot_de_passe">Saisir mot de passe :</label>
			<input type="password" name="mot_de_passe" id="mot_de_passe">
		</p>
		<p>
			<label for="mot_de_passe_confirm">Confirmer le mot de passe :</label>
			<input type="password" name="mot_de_passe_confirm" id="mot_de_passe_confirm">
		</p>
		<p>
			<label for="departement">Dans quel département habitez-vous ?</label> 
			<select name="departement" id="departement">
			  <option value="essone">Essone</option>
			  <option value="haut_de_seine">Haut de Seine</option>
			  <option value="paris">Paris</option>
			  <option value="saint_denis">Saint Denis</option>
			  <option value="seine_et_marne">Seine et Marne</option>
			  <option value="val_de_marne" selected>Val de Marne</option>
			  <option value="val_d_oise">Val d'oise</option>
			  <option value="yvelines">Yvelines</option>          
			</select>
		</p>
		<p>
			<input type="submit" value="Valider" name="valider">
		</p>
	</form>
	<?php
		unset($_SESSION['erreur']);
	?>
</body>
</html>
