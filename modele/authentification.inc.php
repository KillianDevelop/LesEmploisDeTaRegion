<?php

/*
 * Description de pdo.inc.php
 * Permet de se connecter à la base de données phpmyadmin
 * Auteur Killian Nadal
 * Création 14/03/2022
 * Derniere MAJ 19/03/2022
 */

include_once "pdo.inc.php";
include_once "bd.utilisateur.inc.php";

// Vérifie la validité du mot de passe vis à vis de l'adresse mail et
//  les memorise dans la session

function login(string $melU, string $mdpU)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    // Déclaration d'un booléen faisant état de la nécessité
    // d'un message d'erreur ou non
    $valide = TRUE;

    // Déclaration d'un variable stockant les données du visiteur
    // ayant saisie ses informations pour s'authentifier
    $utilisateur = getUtilisateurByMail($melU);

    // Vérification de l'existance d'un visiteur correspondant
    // aux informations données
    if ((isset($utilisateur["idUtilisateur"])) && !empty($utilisateur["idUtilisateur"])) {

        // Affectation à la variable de la valeur du mot de passe de l'utilisateur
        $mdp = $utilisateur["motDePasseUtilisateur"];

        // Vérification de l'existance d'un mot de passe dans la base de données
        if (trim($mdpU) === trim($mdp)) {

            // Déclaration d'une variable contenant l'id de l'utilisateur
            $_SESSION["idUtil"] =  $utilisateur["idUtilisateur"];

            // Déclaration d'élément dans le tableau $_SESSION contenant les données
            // de l'utilisateur s'étant connecté
            $_SESSION["nomUtil"] = $utilisateur["nomUtilisateur"];
            $_SESSION["prenomUtil"] = $utilisateur["prenomUtilisateur"];
            $_SESSION["mdpUtil"] = $mdp;
            $_SESSION["mailU"] = $utilisateur["emailUtilisateur"];


            if (password_verify($mdpU, $mdp)) {
                // Évolution du besoin d'un message erreur
                $valide = FALSE;
            }
        }
    } else {
        $_SESSION["idUtil"] =  "";
        $_SESSION["nomUtil"] = "";
        $_SESSION["prenomUtil"] = "";
        $_SESSION["mdpUtil"] = "";
        $_SESSION["mailU"] = "";
    }

    // Affectation si besoin d'un message d'erreur
    if ($valide) {
        // Déclaration d'un message d'erreur pour avertir l'utilisateur
        $_SESSION["messageErreur"] = "L'email et/ou le mot de passe sont"
            . " incorrects.";
    }
}

// Permet d'authentifier un utilisateur voulant se connecter
function estConnecte()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $valide = false;
    // Vérifie que $_SESSION["mailU"] n'est pas null
    if (isset($_POST["login"]) && isset($_POST["password"])) {
        // Permet de générer l'authentification dès que l'utilisateur aura remplis le formulaire
        if (isset($_SESSION["mailU"])) {
            // Récupère les informations de l'utilisateur à partir du mail rentré en paramètre
            $utilisateur = getUtilisateurByMail($_SESSION["mailU"]);
            // Vérifie si le mail et le mdp corresponde aux informations sur la bdd
            if (
                $utilisateur["emailUtilisateur"] === $_SESSION["mailU"]
                && $utilisateur["motDePasseUtilisateur"] === $_SESSION["mdpUtil"]
            ) {
                $valide = true;
            }
        }
    }
    return $valide;
}

// Fonction de déconnexion
function logout()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    // Unset des variables nécessaire à l'authentification et à la connexion
    unset($_SESSION["mailU"]);
    unset($_SESSION["mdpUtil"]);

    // Unset des variables d'information
    unset($_SESSION["prenomUtil"]);
    unset($_SESSION["nomUtil"]);
    unset($_SESSION["idUtil"]);
}
