<?php

/* 
 * Description de c_authentificationEntreprise.php
 * Permet de gérer les données du formulaire d'authentification d'entreprise
 * Auteur Killian Nadal
 * Création 12/03/2022
 * Derniere MAJ 12/03/2022
 */

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}



// Appel du script de vue qui permet de gérer l'affichage des données
$titre = "Authentification Entreprise";
//include "$racine/vue/entete.html.php";
include "$racine/vue/v_authentificationEntreprise.php";
//include "$racine/vue/pied.html.php";
?>