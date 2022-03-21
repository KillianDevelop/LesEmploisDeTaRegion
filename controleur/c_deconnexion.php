<?php

/* 
 * Description de c_deconnexion.php
 * Permet de gérer la déconnexion de l'utilisateur
 * Auteur Killian Nadal
 * Création 21/03/2022
 * Derniere MAJ 21/03/2022
 */

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/authentification.inc.php";

// Appelle de la fonction de déconnexion
logout();

// Rédirige vers le menu d'authentification une fois l'utilisateur déconnecté 
include "$racine/controleur/c_authentification.php";
