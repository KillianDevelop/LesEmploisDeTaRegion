<?php

/* 
 * Description de c_authentification.php
 * Permet de gérer les données du formulaire d'authentification utilisateur
 * Auteur Killian Nadal
 * Création 12/03/2022
 * Derniere MAJ 18/03/2022
 */

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/authentification.inc.php";

// Initialisation de variables
$msgErreur = "";
$login = "";
$password = "";

// Vérifie que les valeurs du formulaire ne sont pas null
if (isset($_POST["login"]) && isset($_POST["password"])){
    // Vérifie que les valeurs du formulaire ne sont pas vide
    if($_POST["login"] !== "" && $_POST["password"] !== ""){
        
        if (filter_var($_POST["login"], FILTER_VALIDATE_EMAIL)){

            // Filtrage des données du formulaire
            $login = filter_input(INPUT_POST, 'login', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        }else{
            $msgErreur = "Erreur, l'adresse mail n'est pas conforme";
        }
    }else{
        $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés";
    }
}else{
    $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés";
}


// Traitement des données du formulaire
login($login, $password);

if (estConnecte()){
    include_once "$racine/controleur/c_accueil.php";
}else{
    include "$racine/vue/v_authentificationUtilisateur.php";
}

// Appel du script de vue qui permet de gérer l'affichage des données
$titre = "Authentification Utilisateur";
include "$racine/vue/v_authentificationUtilisateur.php";
?>