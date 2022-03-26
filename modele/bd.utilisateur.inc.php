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

        $sql = "select u.uuidUtilisateur, u.nomUtilisateur, u.prenomUtilisateur,"
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

        $sql = "select u.uuidUtilisateur, u.emailUtilisateur"
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

function newUtilisateur(string $uuidUtilisateur, string $nomUtilisateur, string $prenomUtilisateur, string $emailUtilisateur, 
                        string $motDePasseUtilisateur)
{
    $resultat = array();
    try {
        $connexion = connexionPDO();

        $sql = "insert into utilisateur (uuidUtilisateur, nomUtilisateur, prenomUtilisateur, emailUtilisateur, motDePasseUtilisateur)
                VALUES (:uuidUtilisateur, :nomUtilisateur, :prenomUtilisateur, :emailUtilisateur, :motDePasseUtilisateur)";
        $requete = $connexion->prepare($sql);
        $requete->execute(array(
            ':uuidUtilisateur' => $uuidUtilisateur,
            ':nomUtilisateur' => $nomUtilisateur,
            ':prenomUtilisateur' => $prenomUtilisateur,
            ':emailUtilisateur' => $emailUtilisateur,
            ':motDePasseUtilisateur' => $motDePasseUtilisateur
        ));
    } catch (PDOException $e) {
        print 'Erreur' . $e->getMessage();
        die();
    }
    return $resultat;
}

function verif_existe(string $emailUtilisateur){
    $valide = false;
    try{
        $connexion = connexionPDO();
        $sql = "SELECT count(U.uuidUtilisateur) as 'existe'"
                . " FROM utilisateur U"
                . " WHERE U.emailUtilisateur = :emailUtilisateur";
        $requete = $connexion->prepare($sql);
        $requete->execute(array(':emailUtilisateur' => $emailUtilisateur));

        $resultat = $requete->fetch(PDO::FETCH_ASSOC);

        if ($resultat["existe"] !==0){
            $valide = true;
        }

    }catch(PDOException $e){
        print 'Erreur, ' . $e->getMessage();
        die();
    }
    return $valide;
}


function newFormulaireContact(string $sujetContact, string $messageContact, string $uuidUtilisateur)
{
    $resultat = array();
    try {
        $connexion = connexionPDO();

        $sql = "insert into contact (sujetContact, messageContact, uuidUtilisateur)
                VALUES (:sujetContact, :messageContact, :uuidUtilisateur)";
        $requete = $connexion->prepare($sql);
        $requete->execute(array(
            ':sujetContact' => $sujetContact,
            ':messageContact' => $messageContact,
            ':uuidUtilisateur' => $uuidUtilisateur
        ));
    } catch (PDOException $e) {
        print 'Erreur' . $e->getMessage();
        die();
    }
    return $resultat;
}

function genererUUIDV4($data = null){
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function newInfosUtilisateur(string $uuidUtilisateur, string $sommaireUtilisateur, string $entrepriseUtilisateur, string $posteUtilisateur)
{
    $resultat = array();
    try {
        $connexion = connexionPDO();

        $sql = "UPDATE utilisateur u SET sommaireUtilisateur = :sommaireUtilisateur, entrepriseUtilisateur = :entrepriseUtilisateur,
                posteUtilisateur = :posteUtilisateur WHERE uuidUtilisateur = :uuidUtilisateur";
        $requete = $connexion->prepare($sql);
        $requete->execute(array(
            ':uuidUtilisateur' => $uuidUtilisateur,
            ':sommaireUtilisateur' => $sommaireUtilisateur,
            ':entrepriseUtilisateur' => $entrepriseUtilisateur,
            ':posteUtilisateur' => $posteUtilisateur
        ));
    } catch (PDOException $e) {
        print 'Erreur' . $e->getMessage();
        die();
    }
    return $resultat;
}

function getInfosUtilisateurByUuid(string $uuidUtilisateur)
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

        $sql = "select u.sommaireUtilisateur, u.entrepriseUtilisateur, u.posteUtilisateur"
            . " from utilisateur u"
            . " where u.uuidUtilisateur = :uuidUtilisateur";

        // Préparation de la requête SQL
        // Préparation de la requête SQL
        $requete = $connexion->prepare($sql);
        $requete->bindValue(':uuidUtilisateur', $uuidUtilisateur, PDO::PARAM_STR);
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