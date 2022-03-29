<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

$infosUtilisateur = getInfosUtilisateurByUuid($_SESSION["idUtil"]);

if (
    isset($infosUtilisateur["sommaireUtilisateur"]) && isset($infosUtilisateur["entrepriseUtilisateur"])
    && isset($infosUtilisateur["posteUtilisateur"])
) {
    $sommaireUtilisateur = $infosUtilisateur["sommaireUtilisateur"];
    $entrepriseUtilisateur = $infosUtilisateur["entrepriseUtilisateur"];
    $posteUtilisateur = $infosUtilisateur["posteUtilisateur"];
}


if (estConnecte()) {
    include_once "$racine/vue/header.php";
    include_once "$racine/vue/v_profilUtilisateur.php";
    include_once "$racine/vue/footer.php";
}else{
    include_once "$racine/controleur/c_authentification.php";
}
