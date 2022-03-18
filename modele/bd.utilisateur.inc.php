<?php

/*
 * Description de bd.utilisateur.inc.php
 * Auteur Killian Nadal
 * Création 17/03/2022
 * Derniere MAJ 17/03/2022
 */

include_once "pdo.inc.php";

function getUtilisateurByMail(string $melU)
{

    // Déclaration d'une variable tableau vide de résultat
    $resultat = array();

    try {

        // Déclaration d'un variable contenant les informations de connexion
        // à la base de données via PDO
        $connexion = connexionPDO();

        /* 
        * Déclaration de la requête SQL à exécuter
        * La requête retournera l'id , le nom, le prénom, mail,
        * et la date de création du compte de l'utilisateur authentifié
        */

        $sql = "select u.idUtilisateur, u.nomUtilisateur, u.prenomUtilisateur,"
            . " u.emailUtilisateur, u.motDePasseUtilisateur, u.dateCreationCompteUtilisateur"
            . " from utilisateur u"
            . " where u.emailUtilisateur = :melU";

        // Préparation de la requête SQL
        $requete = $connexion->prepare($sql);
        $requete->bindValue(':melU', $melU, PDO::PARAM_STR);
        $requete->execute();
        // Affectation d'un tableau associatif contenant les informations de l'utilisateur
        // ("nom_du_champ" => "valeur_du_champ")
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        // Affichage d'un message contextuel d'erreur
        print "Erreur !: " . $e->getMessage();

        // Arrêt du code
        die();
    }

    return $resultat;
}

function getIdEtMdpParNomEtPrenom(string $nomU, string $prenomU)
{

    // Déclaration d'une variable tableau vide de résultat
    $resultat = array();

    try {

        // Déclaration d'un variable contenant les informations de connexion
        // à la base de données via PDO
        $connexion = connexionPDO();

        /* 
        * Déclaration de la requête SQL à exécuter
        * La requête retournera l'id , le nom, le prénom, mail,
        * et la date de création du compte de l'utilisateur authentifié
        */

        $sql = "select u.idUtilisateur, u.emailUtilisateur"
            . " from utilisateur u"
            . " where u.nomUtilisateur = :nomU and u.prenomUtilisateur = :prenomU";

        // Préparation de la requête SQL
        // Préparation de la requête SQL
        $requete = $connexion->prepare($sql);
        $requete->bindValue(':nomU', $nomU, PDO::PARAM_STR);
        $requete->bindValue(':prenomU', $prenomU, PDO::PARAM_STR);
        $requete->execute();
        // Affectation d'un tableau associatif contenant les informations de l'utilisateur
        // ("nom_du_champ" => "valeur_du_champ")
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        // Affichage d'un message contextuel d'erreur
        print "Erreur !: " . $e->getMessage();

        // Arrêt du code
        die();
    }

    return $resultat;
}


/*
function getIdEtMdpParNomEtPrenom(string $nomU, string $prenomU)
{

    // Déclaration d'une variable tableau vide de résultat
    $resultat = array();

    try {

        // Déclaration d'un variable contenant les informations de connexion
        // à la base de données via PDO
        $connexion = connexionPDO();

        /* 
        * Déclaration de la requête SQL à exécuter
        * La requête retournera l'id , le nom, le prénom, mail,
        * et la date de création du compte de l'utilisateur authentifié
        

        $sql = "select u.idUtilisateur, u.emailUtilisateur"
            . " from utilisateur u"
            . " where u.nomUtilisateur = :nomU and u.prenomUtilisateur = :prenomU";

        // Préparation de la requête SQL
        $requete = $connexion->prepare($sql);

        // Exécution de la requête SQL en remplaçant les valeurs des variables
        // SQL par celles des paramètres
        $requete->bindValue(':nomU', $nomU, PDO::PARAM_STR);
        $requete->bindValue(':prenomU', $prenomU, PDO::PARAM_STR);
        $requete->execute();
        // Affectation d'un tableau associatif contenant les informations de l'utilisateur
        // ("nom_du_champ" => "valeur_du_champ")
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        // Affichage d'un message contextuel d'erreur
        print "Erreur !: " . $e->getMessage();

        // Arrêt du code
        die();
    }

    return $resultat;
}
*/