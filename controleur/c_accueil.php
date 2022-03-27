<?php

/* 
 * Description de c_accueil.php
 * Permet de gérer les données de la page d'accueil
 * Auteur Killian Nadal
 * Création 15/03/2022
 * Derniere MAJ 27/03/2022
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include "$racine/vue/v_accueil.php";
include_once "$racine/vue/footer.php";

?>