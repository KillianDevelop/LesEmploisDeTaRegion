<?php

/*
 * Description de pdo.inc.php
 * Permet de se connecter à la base de données phpmyadmin
 * Auteur Killian Nadal
 * Création 14/03/2022
 * Derniere MAJ 15/03/2022
 */

function connexionPDO() {
// Initialisation de variables utile à la connexion
    $user = "root";
    $password = "";
    $serveur = "localhost";
    $dbnom = "les_emplois_de_ta_region";
    
// Essaye de se connecter à la base de données
    try {
        // Instanciation d'un nouvel objet PDO
        $connexion = new PDO("mysql:host=$serveur;dbname=$dbnom", $user, $password);
        
        return $connexion;
        
        // Si il n'arrive pas à se connecter renvoie l'erreur
    } catch (Exception $ex) {
        print "Erreur" . $ex->getMessage();
        // Met fin à tout le programme
        die();
    }
}
?>

