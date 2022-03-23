<?php

include "$racine/vue/v_accueil.php";
include "$racine/modele/bd.utilisateur.inc.php";

$uuid = genererUUIDV4();

echo $uuid;

?>