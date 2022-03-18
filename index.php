
<?php
/* 
 * Description de index.php
 * Index
 * Auteur Killian Nadal
 * Création 12/03/2022
 * Derniere MAJ 12/03/2022
 */

include "getRacine.php";
include "$racine/controleur/c_principal.php";

// Activation du tableau super-global $_SESSION
if (!isset($_SESSION)) {
    session_start();
}

// Vérifie si l'action n'est pas null
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "$racine/controleur/$fichier";

?>
     