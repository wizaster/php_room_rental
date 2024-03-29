<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
    if (!isset($_SESSION['user'])) {
        $username = $_SESSION['connecte'];
        $user = UserDAO::findByUsername($username);
        $user->setSessionUser();
    }
} else {
    return "connexion";
}

?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php
include('header.php');
?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(./images/banquet_login.jpg);"
     data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Profil</h1>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="site-section bg-light ">
    <div class="container row col-8 profil">
        <div class="col-5">
            <fieldset>
                <legend>Informations personnelles</legend>
                <div>Nom Utilisateur :</div>
                <div><?php echo $_SESSION['connecte'] ?></div>
                <br/>
                <div>Prenom :</div>
                <div><?php echo $_SESSION['user']['prenom'] ?></div>
                <br/>
                <div>Nom :</div>
                <div><?php echo $_SESSION['user']['nom'] ?></div>
                <br/>
                <div>Adresse :</div>
                <div><?php echo $_SESSION['user']['adresse'] ?></div>
                <br/>
                <div>Email :</div>
                <div><?php echo $_SESSION['user']['email'] ?></div>
                <br/>
                <div>Membre depuis :</div>
                <div><?php echo $_SESSION['user']['membreDepuis'] ?></div>
                <br/>
                <div>Bio :</div>
                <div><?php echo $_SESSION['user']['bio'] ?></div>
                <br/>
            </fieldset>
        </div>
        <div class="col-1"></div>
        <div class="col-2">
            <div class="row">
                <form action="?action=consulter_historique" method="post" id="Options" class="p-2">
                    <input type="submit" value="Consulter Historique"/>
                </form>
            </div>
            <div class="row">
                <form action="?action=info_utilisateur" method="post" id="Options" class="p-2">
                    <input type="submit" value="Editer Profil"/>
                </form>
            </div>
                <?php
                switch ($_SESSION['role']) {
                    case 1:
                        ?>
                        <div class="row">
                            <form action="?action=devenir_proprietaire" method="post" id="Options" class="p-2">
                                <input type="submit" value="Devenir Proprietaire"/>
                            </form>
                        </div>
                        <?php
                        break;
                    case 2:
                        ?>
                        <div class="row">
                            <form action="?action=ajouter_salle" method="post" id="Options" class="p-2">
                                <input type="submit" value="Ajouter salle"/>
                            </form>
                        </div>
                        <div class="row">
                            <form action="?action=recherche&vos_salles=true" method="post" id="Options" class="p-2">
                                <input type="submit" value="Vos Salles"/>

                                <?php

                                if (isset($_SESSION['msg']['err_vosSalle'])) {
                                    ?>
                                    <div class="msg-conn">
                                        <p><?= $_SESSION['msg']['err_vosSalle'] ?></p>
                                    </div>
                                    <?php
                                    unset($_SESSION['msg']['err_vosSalle']);
                                }
                                ?>
                            </form>
                        </div>
                        <?php
                        break;
                    case 3:
                        ?>
                        <div class="row">
                            <form action="?action=afficher_utilisateurs" method="post" id="Options" class="p-2">
                                <input type="submit" value="Afficher les Utilisateurs"/>
                            </form>
                        </div>
                        <?php
                        break;
                }
                ?>
        </div>
    </div>
</div>

<footer class="site-footer">
    <?php
    include('vues/footer.php');
    ?>
</footer>
</body>
</html>
