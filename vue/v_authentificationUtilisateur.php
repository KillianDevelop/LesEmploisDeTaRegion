<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <form method="POST">
        <h1> Connexion à votre compte utilisateur </h1>
        <hr width="100%" size="5" align="center" NOSHADE>
        <p class="txtAuth"> Vous êtes déjà utilisateur ? </p>
        <p class="txtErreur">
            <?php
            // Permet de gérer l'apparition des messages d'erreurs
            if (isset($_POST["login"]) && isset($_POST["password"]))
                if ($msgErreur !== "") {
                    echo $msgErreur;
                }
            ?></p>
        <div class="inputs">
            <input type="email" placeholder="Email *" name="login" icons="" required="required">
            <input type="password" placeholder="Mot de passe *" name="password" required="required">
        </div>
        <p class='txtAuth'><i> * Champ requis </i></p>
        <p class="txtAuth"><a href="./?action=creationUtil"> Créer un compte ? </a></p>
        <div align="center">
            <button type="submit">Se connecter</button>
        </div>
        <hr width="100%" size="5" align="center" NOSHADE>
        <p class="txtRedigEntr"><a href="./?action=authentificationEntre"> Vous êtes une entreprise ? Connectez vous en cliquant ici </a></p>
    </form>
</body>

</html>