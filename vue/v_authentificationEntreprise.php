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
    </head>
    <body>
        <form>
            <h1> Connexion à votre compte entreprise </h1>
            <hr width="100%" size="5" align="center" NOSHADE>    
            <p class="txtAuth"> Vous êtes déjà client ? </p>
            <div class="inputs">
                <input type="email" placeholder="Email *" required="required">
                <input type="password" placeholder="Mot de passe *" required="required">
            </div>
            <p class='txtAuth'><i> * Champ requis </i></p>
            <p class="txtAuth"><a href="./?action=creationEntre"> Créer un compte ? </a></p>
            <div align="center">
                <button type="submit">Se connecter</button>
            </div>
            <hr width="100%" size="5" align="center" NOSHADE>
            <p class="txtRedigEntr"> <a href="./?action=defaut"> Vous êtes un utilisateur ? Connectez vous en cliquant ici </a></p>
        </form>
    </body>
</html>