<?php

/* 
 * Description de c_contact.php
 * Permet de gérer les données du formulaire de contact
 * Auteur Killian Nadal
 * Création 21/03/2022
 * Derniere MAJ 21/03/2022
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include "$racine/modele/bd.utilisateur.inc.php";

$msgErreur = "";
$msg = "";

if (isset($_POST["titre"]) && isset($_POST["message"])) {

    if (!empty($_POST["titre"]) && !empty($_POST["message"])) {

        if (filter_has_var(INPUT_POST, 'titre') && filter_has_var(INPUT_POST, 'message')) {

            if (strlen($_POST["titre"]) <= 100) {

                if (strlen($_POST["message"]) <= 500) {

                    $titre = htmlspecialchars($_POST['titre'], ENT_NOQUOTES);
                    $message = htmlspecialchars($_POST['message'], ENT_NOQUOTES);
                    newFormulaireContact($titre, $message, $_SESSION["idUtil"]);
                    $msg = "Votre formulaire de contact vient d'être créé avec succès.";

                } else {
                    $msgErreur = "Vous avez dépassé le nombre maximal de caractères (500) dans votre message.";
                }
            } else {
                $msgErreur = "Vous avez dépassé le nombre maximal de caractères (100) dans votre titre.";
            }
        } else {
            $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
        }
    } else {
        $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
    }
} else {
    $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
}

include "$racine/vue/header.php";
include_once "$racine/vue/v_contact.php";
include_once "$racine/vue/footer.php";