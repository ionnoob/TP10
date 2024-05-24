<?php
    $serveur = "localhost";
    $user = "root";
    $pass = "";
    try
    {
        $bdd = new PDO("mysql:host=$serveur",$user,$pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = "CREATE DATABASE IF NOT EXISTS bdd_Nicolas_1nsics_23_24";
        $bdd->exec($requete);        
    }
    catch(PDOException $e)
    {
        echo 'Erreur : '.$e->getMessage();
    }

    $dbname = "bdd_Nicolas_1nsics_23_24";
    try
    {
        $bdd = new PDO("mysql:host=$serveur;dbname=$dbname;charset=utf8",$user,$pass);
        
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $table_test = "CREATE TABLE IF NOT EXISTS billets(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            titre TEXT,
            contenu TEXT,
            date_creation TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        $bdd->exec($table_test);
        $table_test2 = "CREATE TABLE IF NOT EXISTS commentaires(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_billet INT,
            auteur TEXT,
            commentaire TEXT,
            date_creation TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        $bdd->exec($table_test2);
        $table_test3 = "CREATE TABLE IF NOT EXISTS membres(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            prenom TEXT,
            nom TEXT,
            identifiant TEXT,
            mot_de_passe TEXT,
            mot_de_passe_confirm TEXT,
            departement TEXT,
            date_creation TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        $bdd->exec($table_test3);
    }
    catch(PDOException $e)
    {
        echo 'Erreur : '.$e->getMessage();
    }
    header('location: index.php');
?>
