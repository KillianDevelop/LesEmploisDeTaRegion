<?php

/* 
 * Description de c_ajoutInfosProfil.php
 * Permet de gérer l'ajout de données de l'utilisateur
 * Auteur Killian Nadal
 * Création 25/03/2022
 * Derniere MAJ 25/03/2022
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.utilisateur.inc.php";

$message = "";
$msgErreur = "";

if (isset($_POST["sommaireUtilisateur"]) && isset($_POST["entrepriseUtilisateur"]) && isset($_POST["posteUtilisateur"])) {
    if (!empty($_POST["sommaireUtilisateur"]) && !empty($_POST["entrepriseUtilisateur"]) && !empty($_POST["posteUtilisateur"])) {
        if (
            filter_has_var(INPUT_POST, "sommaireUtilisateur") && filter_has_var(INPUT_POST, "entrepriseUtilisateur")
            && filter_has_var(INPUT_POST, "posteUtilisateur")
        ) {

            $sommaireUtilisateur = htmlspecialchars($_POST["sommaireUtilisateur"], ENT_NOQUOTES);
            $entrepriseUtilisateur = htmlspecialchars($_POST["entrepriseUtilisateur"], ENT_NOQUOTES);
            $posteUtilisateur = htmlspecialchars($_POST["posteUtilisateur"], ENT_NOQUOTES);

            newInfosUtilisateur($_SESSION["idUtil"], $sommaireUtilisateur, $entrepriseUtilisateur, $posteUtilisateur);
            $message = "Informations utilisateur ajouté avec succès.";

        }else{
            $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
        }
    }else{
        $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
    }
}else{
    $msgErreur = "Erreur, tous les champs du formulaire doivent êtres complétés.";
}

include_once "$racine/vue/header.php";
include_once "$racine/vue/v_ajoutInfosProfil.php";
