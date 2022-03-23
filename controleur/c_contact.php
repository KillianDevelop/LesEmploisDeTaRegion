<?php

/* 
 * Description de c_contact.php
 * Permet de gérer les données du formulaire de contact
 * Auteur Killian Nadal
 * Création 21/03/2022
 * Derniere MAJ 21/03/2022
 */

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/bd.utilisateur.inc.php";

$msgErreur = "";
$msg = "";

if (isset($_POST["titre"]) && isset($_POST["message"])){
    if (!empty($_POST["titre"]) && !empty($_POST["message"])){

        newFormulaireContact($_POST["titre"], $_POST["message"], $_SESSION["idUtil"]);
        $msg = "Votre formulaire de contact vient d'être créé avec succès.";

    }else{
        $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
    }
}else{
    $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
}

include "$racine/vue/header.php";
include_once "$racine/vue/v_contact.php";
