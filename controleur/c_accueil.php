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
include_once "$racine/modele/bd.utilisateur.inc.php";
if (estConnecte()) {

    $infosUtilisateur = getInfosUtilisateurByUuid($_SESSION["idUtil"]);

    if (
        isset($infosUtilisateur["sommaireUtilisateur"]) && isset($infosUtilisateur["entrepriseUtilisateur"])
        && isset($infosUtilisateur["posteUtilisateur"])
    ) {
        $sommaireUtilisateur = $infosUtilisateur["sommaireUtilisateur"];
        $entrepriseUtilisateur = $infosUtilisateur["entrepriseUtilisateur"];
        $posteUtilisateur = $infosUtilisateur["posteUtilisateur"];

        $message = getPublication();

        if (isset($_POST["publication"]) && !empty($_POST["publication"])) {

            if (strlen($_POST["publication"]) <= 200) {

                filter_has_var(INPUT_POST, 'publication');
                $publication = htmlspecialchars($_POST['publication'], ENT_NOQUOTES);

                newPublication($publication, $_SESSION["idUtil"]);
            } else {
                $msgErreur = "Erreur, votre publication dépasse 200 caractères";
            }
        }
    }


    include_once "$racine/vue/header.php";
    include_once "$racine/vue/v_accueil.php";
    include_once "$racine/vue/footerScroll.php";
    
} else {
    include_once "$racine/controleur/c_authentification.php";
}
