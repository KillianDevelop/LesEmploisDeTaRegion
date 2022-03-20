<?php

/* 
 * Description de c_creationUtilisateur.php
 * Permet de gérer la création d'un nouveau compte utilisateur
 * Auteur Killian Nadal
 * Création 12/03/2022
 * Derniere MAJ 12/03/2022
 */

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.utilisateur.inc.php";

// Initialisation de variables utile pour la gestion des erreurs/validation
$msgErreur = "";
$msg = "";

// Vérifie que tous les champs du formulaire ne sont pas null
if (
    isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["email"])
    && isset($_POST["mdp"]) && isset($_POST["mdp2"])
) {
    // Vérifie que tous les champs du formulaire ne sont pas vide
    if (
        $_POST["nom"] !== "" && $_POST["prenom"] !== "" && $_POST["email"] !== ""
        && $_POST["mdp"] !== "" && $_POST["mdp2"] !== ""
    ) {

        // Affectation des valeurs des POST à des variables local
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        $mdp2 = $_POST["mdp2"];

        // Vérifie que le nom/prénom rentré par l'utilisateur respecte le format standard.
        if (preg_match("/^[A-Z][A6Za-z\é\è\ê\-]+$/", $nom) && preg_match("/^[A-Z][A6Za-z\é\è\ê\-]+$/", $prenom)) {
            // Vérifie que le mail rentré par l'utilisateur respecte le format standard.
            if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $email)) {
                // Vérifie que les deux mots de passe possèdent au moins 8 caractères, des majuscules, minuscules et des chiffres.
                if (
                    preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $mdp) &&
                    preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $mdp2)
                ) {
                    // Vérifie que les deux mots de passe rentrés par l'utilisateur sont bien identiques.
                        // Mets les noms/prenoms en minuscules.
                        $verifNom = strtolower($nom);
                        $verifPrenom = strtolower($prenom);

                        // Met en majuscule la première lettre du nom/prénom.
                        $nom = ucwords($verifNom);
                        $prenom = ucwords($verifPrenom);
                        $mdp_hache = password_hash($mdp, PASSWORD_BCRYPT, ['cost' => 10]);
                        // ! Verifier si l'email est déjà utilisé
                        // ! Faire le salage + hashage du mdp 
                        // Création du nouvel utilisateur.
                        newUtilisateur($nom, $prenom, $email, $mdp_hache);

                        $msg = "Votre compte utilisateur vient d'être créé avec succès.";
                    
                } else {
                    $msgErreur = "Erreur, votre mot de passe doit contenir au moins 8 caractères, des minuscules, majscules et des chiffres";
                }
            } else {
                $msgErreur = "Erreur, le mail ne respecte pas le format d'un mail standard.";
            }
        } else {
            $msgErreur = "Erreur, le nom et/ou le prénom ne respecte pas le format d'un nom/prénom standard.";
        }
    } else {
        $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
    }
} else {
    $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
}


// Appel du script de vue qui permet de gérer l'affichage des données
$titre = "Création Utilisateur";
include "$racine/vue/v_creationUtilisateur.php";
