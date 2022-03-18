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
        <title>Création de votre compte entreprise</title>
        <link rel="stylesheet" href="css/style_creation.css">
    </head>
    <body>
        <form method="POST">
            <h1> Création de votre compte entreprise </h1>
            <hr width="100%" size="5" align="center" NOSHADE>    
            <p class="txtAuth"> Créez votre compte entreprise </p>
            <div class="div-principal">
                <div class="div-sec">
                    <input class="input" type="text" placeholder="Nom de votre entreprise *" required="required"></input>
                </div>
                <div class="div-sec">
                    <input class="input" type="text" placeholder="Siret *" required="required"></input>
                </div>
            </div>
            </div>
            <div class="input-email">
                    <input type="email" placeholder="Email *" required="required">
            </div>
            <div class="div-principal">
                <div class="div-sec">
                    <input class="input" type="password" placeholder="Mot de passe *" required="required"></input>
                </div>
                <div class="div-sec">
                    <input class="input" type="password" placeholder="Confirmez votre mot de passe *" required="required"></input>
                </div>
            </div>
            <p class='txtAuth'><i> * Champ requis </i></p>
            <p class="txtAuth"><a href="./?action=authentificationEntre"> Vous avez déjà un compte ? </a></p>
            <div align="center">
                <button type="submit">Créer un compte</button>
            </div>
            <hr width="100%" size="5" align="center" NOSHADE>
            <p class="txtRedigEntr"><a href="./?action=defaut">Vous êtes un utilisateur ? Connectez vous en cliquant ici </a></p>
            
        </form>
    </body>
</html>
