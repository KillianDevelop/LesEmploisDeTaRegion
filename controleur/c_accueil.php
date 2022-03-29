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

include_once "$racine/modele/authentification.inc.php";

if (estConnecte()) {
    include_once "$racine/vue/v_accueil.php";
    include_once "$racine/vue/footer.php";
}else{
    include_once "$racine/controleur/c_authentification.php";
}

?>