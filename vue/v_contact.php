<script src="https://kit.fontawesome.com/60856e5448.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/contact.css">

<div class="parent">
    <div class="box">
        <form method="POST">
            <h1> Formulaire de Contact </h1>
            <hr width="100%" size="5" align="center" NOSHADE>
            </p>
            <p class="txt">Une remarque ? une suggestion ? N'hésitez-pas à écrire un formulaire
            </p>

            <p class="txtErreur">
                <?php
                // Permet de gérer l'apparition des messages d'erreurs
                if (
                    isset($_POST["titre"]) && isset($_POST["message"])
                ) {
                    if ($msgErreur !== "") {
                        echo $msgErreur;
                    }
                }
                ?></p>

            <p class="txtValid">
                <?php
                // Permet de gérer l'apparition des messages d'erreurs
                if (
                    isset($_POST["titre"]) && isset($_POST["message"])
                ) {
                    if ($msg !== "") {
                        echo $msg;
                    }
                }
                ?>
            <div class="inputs">
                <p class="txt">Sujet de votre message <span class="red">*</span></p>
                <input class="input" name="titre" type="text" required="required"></input>
                <p class="txt">Votre message <span class="red">*</span></p>
                <textarea name="message" cols="40" rows="15" placeholder="Ecrire un commentaire" required="required"></textarea>
            </div>
            <p class='txtAuth'><i><span class="red">*</span> Champ requis </i></p>
            <div class="div-principal">
                <div class="div-sec">
                    <button type="submit">Envoyer</button>
                </div>

        </form>
    </div>