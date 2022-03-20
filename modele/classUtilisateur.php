<?php

/* 
 * Description de classUtilisateur.php
 * Class utilisateur
 * Auteur Killian Nadal
 * Création 14/03/2022
 * Derniere MAJ 14/03/2022
 */

class Utilisateur{
    
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $emailUtilisateur;
    private $mdpUtilisateur;

    function __construct(string $pnom, string $pprenom, $pemail, $pmdp)
    {
        $this->nomUtilisateur=$pnom;
        $this->prenomUtilisateur=$pprenom;
        $this->emailUtilisateur=$pemail;
        $this->mdpUtilisateur=$pmdp;
    }

    public function getNomUtilisateur(){
        return $this->nomUtilisateur;
    }

    public function getPrenomUtilisateur(){
        return $this->prenomUtilisateur;
    }

    public function getEmailUtilisateur(){
        return $this->emailUtilisateur;
    }

    public function getMdpUtilisateur(){
        return $this->mdpUtilisateur;
    }

    public function setNomUtilisateur(string $pnom){
        $this->nomUtilisateur=$pnom;
    }

    public function setPrenomUtilisateur(string $pprenom){
        $this->prenomUtilisateur=$pprenom;
    }

    public function setEmailUtilisateur(string $pemail){
        $this->emailUtilisateur=$pemail;
    }

    public function setMdpUtilisateur(string $pmdp){
        $this->mdpUtilisateur=$pmdp;
    }

    public function afficherUtilisateur(){
        return " Nom: ".$this->nomUtilisateur."<br> Prénom : ".$this->prenomUtilisateur.
        "<br> Email : ".$this->emailUtilisateur;
    }
}