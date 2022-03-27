<?php

/* 
 * Description de c_a-propos.php
 * Permet de gérer les données de la page à propos
 * Auteur Killian Nadal
 * Création 27/03/2022
 * Derniere MAJ 27/03/2022
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/vue/header.php";
include_once "$racine/vue/v_a-propos.php";
include_once "$racine/vue/footer.php";