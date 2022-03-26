<script src="https://kit.fontawesome.com/60856e5448.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/profil.css">
<div class="parent">

    <div class="aside">
        <br>
        <div class="iconepen">
            <acronym title="Completez votre profil utilisateur"><a href="./?action=ajoutInfosProfil"><i class="fa-solid fa-pen"></i>
                </a></acronym>

            <br>
        </div>
        <div class="iconeprofil">
            <i class="fa-solid fa-circle-user"></i>
        </div>
        <h3><?php echo $_SESSION["prenomUtil"] . " " . $_SESSION["nomUtil"] ?></h3>
        <br>
        <hr width="80%" size="5" align="center" NOSHADE>
        <br>
        <h2>Email : </h2>
        <h4><?php echo $_SESSION["mailU"] ?></h4>
        <br>
        <h2>Compte créé : </h2>
        <h4>Le <?php echo $_SESSION["dateCreationUtil"] ?></h4>
    </div>

    <div class="boxtop">
        <h2>Informations : </h2>
        <h4><?php if (isset($sommaireUtilisateur)) {
                echo $sommaireUtilisateur;
            } else {
                echo "Complétez votre profil en cliquant sur le stylo au-dessus de votre icône utilisateur.";
            } ?></h4>

    </div>

    <div class="boxbot">
        <h2> Membre de : </h2>
        <h4><?php if (isset($entrepriseUtilisateur)) {
                echo $entrepriseUtilisateur;
            } ?></h4>
        <br>
        <h2> Poste occupé : </h2>
        <h4><?php if(isset($posteUtilisateur)){
            echo $posteUtilisateur;
        } ?></h4>
    </div>

    <div class="footer"> </div>

</div>