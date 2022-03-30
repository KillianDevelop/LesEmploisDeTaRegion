<script src="https://kit.fontawesome.com/60856e5448.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/accueil.css">

<div class="parent">
    <div class="profil">
        <div class="iconeprofil">
            <i class="fa-solid fa-circle-user"></i>
        </div>
        <p class="nom"><?php echo $_SESSION["prenomUtil"] . " " . $_SESSION["nomUtil"]; ?></p>
        <hr class="hrprofil">
        <p class="corpsMessage"><?php if (isset($sommaireUtilisateur)) {
                                    echo $sommaireUtilisateur;
                                } else {
                                    echo "Complétez votre profil en cliquant sur le stylo au-dessus de votre 
                                    icône utilisateur dans l'onglet <b>Mon Profil</b>.";
                                } ?></p>
    </div>
    <div class="block">
        <div class="post">
            <form action="./?action=accueil" method="POST">
                <div class="englobePost">

                    <div class="iconePost">
                        <i class="fa-solid fa-circle-user"></i>
                    </div>
                    <textarea name="publication" cols="40" rows="3" placeholder="Commencer un post" required="required"></textarea>
                </div>

                <button type="submit">Envoyer</button>

            </form>
        </div>
        <?php
        $publication = array();
        $utilisateur = array();
        $i = 0;

        $publication = getPublication();
        //var_dump($publication);

        while ($i < count($publication)) {

            //$utilisateur = getUtilisateur();

            $utilisateur = getInfosUtilisateurByUuid($publication[$i]["uuidUtilisateur"]);
            //var_dump($utilisateur);
        ?>
            <div class="corps">
                <div class="englobeInfos">
                    <div class="iconePost">
                        <i class="fa-solid fa-circle-user"></i>
                    </div>
                    <div class="infos">
                        <p class="nomCorps"><?php echo $utilisateur["prenomUtilisateur"] . " " . $utilisateur["nomUtilisateur"]; ?></p>
                        <p class="emploi"><?php if (isset($utilisateur["posteUtilisateur"])) {
                                                echo $utilisateur["posteUtilisateur"];
                                            } else {
                                                echo "Aucune informations.";
                                            } ?></p>
                        <p class="datePublication"><?php echo $publication[$i]["dateCreationPublication"]; ?></p>
                    </div>
                </div>
                <hr class="hrpublication">

                <p class="corpsMessage"> <?php echo $publication[$i]["messagePublication"]; ?></p>

            </div>
        <?php
            $i++;
        } ?>
    </div>
</div>