<script src="https://kit.fontawesome.com/60856e5448.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/infosProfil.css">
<div class="parent">

    <div class="aside">
        <br><br>
        <div class="iconeprofil">
            <i class="fa-solid fa-circle-user"></i>
        </div>
        <h3><?php echo $_SESSION["prenomUtil"] . " " . $_SESSION["nomUtil"] ?></h3>
        <br>
        <hr width="80%" size="5" align="center" NOSHADE><br>
        <h2>Email : </h2>
        <h4><?php echo $_SESSION["mailU"] ?></h4>
        <br>
        <h2>Compte créé : </h2>
        <h4>Le <?php echo $_SESSION["dateCreationUtil"] ?></h4>
    </div>

    <div class="boxtop">
        <form method="POST">
            <h1> Ajoutez des informations à votre compte utilisateur </h1>
            <hr width="100%" size="5" align="center" NOSHADE>
            <p class="txtErreur">
                <?php
                // Permet de gérer l'apparition des messages d'erreurs
                if (
                    isset($_POST["nom"]) && isset($_POST["prenom"]) &&
                    isset($_POST["email"]) && isset($_POST["mdp"])
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
                    isset($_POST["nom"]) && isset($_POST["prenom"]) &&
                    isset($_POST["email"]) && isset($_POST["mdp"])
                ) {
                    if ($msg !== "") {
                        echo $msg;
                    }
                }
                ?></p>
            <p class="txt">Vous pouvez évoquer votre experience, votre domaine d'activité
                ou vos compétences. Certains choisissent aussi de parler de leurs accomplissements
                oud de leurs postes précédents.
            </p>

            <div class="inputs">
                </p>
                <textarea name="sommaireUtilisateur" cols="40" rows="15" placeholder="Ecrire un commentaire" ></textarea>
            </div>
            <div class="div-principal">
                <div class="div-sec">
                    <input class="input" name="entrepriseUtilisateur" type="text" placeholder="Votre Entreprise"></input>
                </div>
                <div class="div-sec">
                    <input class="input" name="posteUtilisateur" type="text" placeholder="Votre Poste"></input>
                </div>
            </div>
            <button type="submit">Envoyer</button>
    </div>

    </form>

</div>

<div class="footer"> </div>

</div>