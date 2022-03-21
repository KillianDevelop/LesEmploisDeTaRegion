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
    <title>Formulaire de Contact</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <form method="POST">
        <h1> Formulaire de Contact </h1>
        <hr width="100%" size="5" align="center" NOSHADE>
        <p class="txtErreur">
            <?php
            // Permet de gérer l'apparition des messages d'erreurs
            if (isset($_POST["login"]) && isset($_POST["password"])) {
                if ($msgErreur !== "") {
                    echo $msgErreur;
                }
            }
            ?></p>
        <p class="txt"> Sujet de votre message *</p>

        <div class="inputs">
            <input type="text" name="titre" required="required"><br>
            <p>
            <p class="txt">
                Message *
            </p>
            </p>
            <textarea name="message" cols="40" rows="15" placeholder="Ecrire un commentaire"></textarea>
        </div>
        <p class='txtAuth'><i> * Champ requis </i></p>
        <div align="center">
            <button type="submit">Envoyer</button>
        </div>
        <hr width="100%" size="5" align="center" NOSHADE>
    </form>
</body>
</html>