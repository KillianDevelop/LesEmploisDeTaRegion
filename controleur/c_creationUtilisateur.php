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
$valideConnexion = false;

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
        // Vérifie si une variable d'un type spécifique existe
        if (
            filter_has_var(INPUT_POST, 'nom') && filter_has_var(INPUT_POST, 'prenom') &&
            filter_has_var(INPUT_POST, 'email') && filter_has_var(INPUT_POST, 'mdp') &&
            filter_has_var(INPUT_POST, 'mdp2')
        ) {

            // Génération d'une UUID v4
            $UUID4 = genererUUIDV4();

            // Filtre les données du mail rentré dans le formulaire 
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            // Affectation des valeurs des POST à des variables local + traitement faille XSS
            $nom = htmlspecialchars($_POST['nom'], ENT_NOQUOTES);
            $prenom = htmlspecialchars($_POST['prenom'], ENT_NOQUOTES);
            $mdp = htmlspecialchars($_POST['mdp'], ENT_NOQUOTES);
            $mdp2 = htmlspecialchars($_POST['mdp2'], ENT_NOQUOTES);

            // Vérifie que le nom/prénom rentré par l'utilisateur respecte le format standard.
            if (preg_match("/^[A-Za-z][A6Za-z\é\è\ê\-]+$/", $nom) && preg_match("/^[A-Za-z][A6Za-z\é\è\ê\-]+$/", $prenom)) {
                // Vérifie que le mail rentré par l'utilisateur respecte le format standard.
                if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ", $email)) {

                    if (!verif_existe($email)) {
                        // Vérifie que les deux mots de passe possèdent au moins 8 caractères, des majuscules, minuscules et des chiffres.
                        if (
                            preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $mdp) &&
                            preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $mdp2)
                        ) {
                            // Met le nom/prenom en minuscule permettra d'ensuite uniformiser les nom/prenom dans la bdd
                            $verif_nom = strtolower($nom);
                            $verif_prenom = strtolower($prenom);
                            // Met la première lettre du string en majuscule 
                            $nom = ucwords($verif_nom);
                            $prenom = ucwords($verif_prenom);

                            // Hashage du mot de passe de l'utilisateur 
                            $mdp_hache = password_hash($mdp, PASSWORD_BCRYPT, ['cost' => 10]);
                            
                            // Création du nouvel utilisateur.
                            newUtilisateur($UUID4, $nom, $prenom, $email, $mdp_hache);

                            $utilisateur = getUtilisateurByMail($email);


                            $_SESSION["idUtil"] = $utilisateur["uuidUtilisateur"];
                            $_SESSION["dateCreationUtil"] = $utilisateur["dateCreationCompteUtilisateur"];
                            $_SESSION["nomUtil"] = $nom;
                            $_SESSION["prenomUtil"] = $prenom;
                            $_SESSION["mailU"] = $email;
                            // ! Ajoutez une methode pour bien sortir la date

                            $msg = "Votre compte utilisateur vient d'être créé avec succès.";
                            $valideConnexion = true;
                        } else {
                            $msgErreur = "Erreur, votre mot de passe doit contenir au moins 8 caractères, des minuscules, majscules et des chiffres";
                        }
                    } else {
                        $msgErreur = "Erreur, le mail est déjà associé à un compte.";
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
} else {
    $msgErreur = "Erreur, tous les champs du formulaire doivent être complétés.";
}

if ($valideConnexion === true) {
    include "$racine/controleur/c_accueil.php";
} else {
    // Appel du script de vue qui permet de gérer l'affichage des données
    $titre = "Création Utilisateur";
    include "$racine/vue/v_creationUtilisateur.php";
}
