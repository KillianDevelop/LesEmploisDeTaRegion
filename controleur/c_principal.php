<?php

/* 
 * Description de c_principal.php
 * Permet de gérer les redirections de pages
 * Auteur Killian Nadal
 * Création 12/03/2022
 * Derniere MAJ 13/03/2022
 */

// Fonction qui crée un tableau d'actions permettant de rélier un controleur à une action
function controleurPrincipal(string $action){
    // Initialisation de variables
    $lesActions = array();
    // Ajout de valeurs dans le tableau lesActions
    $lesActions["defaut"] = "c_authentification.php";
    $lesActions["authentificationEntre"] = "c_authentificationEntreprise.php";
    $lesActions["creationEntre"] = "c_creationEntreprise.php";  
    $lesActions["creationUtil"] = "c_creationUtilisateur.php";  
    $lesActions["deconnexion"] = "c_deconnexion.php";
    $lesActions["contact"] = "c_contact.php";
    $lesActions["accueil"] = "c_accueil.php";
    $lesActions["a-propos"] = "c_a-propos.php";
    $lesActions["profil"] = "c_profil.php";
    $lesActions["ajoutInfosProfil"] = "c_ajoutInfosProfil.php";

    if (array_key_exists( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}
?>