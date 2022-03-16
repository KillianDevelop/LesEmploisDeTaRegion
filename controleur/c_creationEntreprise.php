<?php

/* 
 * Description de c_creationEntreprise.php
 * Permet de gérer la création d'un nouveau compte entreprise
 * Auteur Killian Nadal
 * Création 12/03/2022
 * Derniere MAJ 12/03/2022
 */

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}



// Appel du script de vue qui permet de gérer l'affichage des données
$titre = "Création Entreprise";
//include "$racine/vue/entete.html.php";
include "$racine/vue/v_creationEntreprise.php";
//include "$racine/vue/pied.html.php";
?>