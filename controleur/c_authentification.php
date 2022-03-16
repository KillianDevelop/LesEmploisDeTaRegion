<?php

/* 
 * Description de c_authentification.php
 * Permet de gérer les données du formulaire d'authentification utilisateur
 * Auteur Killian Nadal
 * Création 12/03/2022
 * Derniere MAJ 14/03/2022
 */

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

// Initialisation de variables
$msgErreur = "";

// Vérifie que les valeurs du formulaire ne sont pas null
if (isset($_POST["login"]) && isset($_POST["password"])){
    // Vérifie que les valeurs du formulaire ne sont pas vide
    if($_POST["login"] !== "" && $_POST["password"] !== ""){
        
        // Filtrage des données du formulaire
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        echo "Ceci est un test pour savoir si le push de git marche";

    }else{
        $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés";
    }
}else{
    $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés";
}

// Appel du script de vue qui permet de gérer l'affichage des données
$titre = "Authentification Utilisateur";
//include "$racine/vue/entete.html.php";
include "$racine/vue/v_authentificationUtilisateur.php";
//include "$racine/vue/pied.html.php";
?>