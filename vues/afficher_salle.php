<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
if (isset($_REQUEST['listing'])) {
    $salleId = $_REQUEST['listing'];
} elseif(isset($_REQUEST['salleId'])) {
    $salleId = $_REQUEST['salleId'];
} else {
    $action = "afficher_salles";
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php
include('header.php');
$image = ImageDAO::findBySalle($salleId);
$salle = SalleDAO::findById($salleId);
?>
<div class="site-blocks-cover inner-page-cover overlay" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="site-blocks-cover inner-page-cover overlay salleBanniere m-auto col-8"
        <?php
        if (!empty($image)) {
            ?>
            style="background-image: url(<?php echo $image[0][0] ?>);"
            <?php
        }
        ?>
    >
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1><?php echo $salle->getNom() ?></h1>
                        <p class="mb-0"></p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="">
            <div class="mb-5">
                <div class="col-12 m-auto">

                    <div class="mb-4 col-lg-6 col-sm-12">
                        <?php
                        if (!empty($image)) {
                            ?>
                            <div class="slide-one-item home-slider owl-carousel ">
                                <?php
                                foreach ($image as $img) {
                                    ?>
                                    <div class="imgSlide"><img src="<?php echo $img[0] ?>" alt="Image"
                                                               class="img-fluid"></div>
                                    <?php
                                }
                                ?>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div <?php
                    if (empty($image)){
                        ?> class=" col-4" <?php
                    } else {
                    ?> class="testrow col-4"> <?php
                        }
                        ?>
                        <h4 class="h5 mb-4 text-black">Description</h4>
                        <p><?php echo $salle->getDesc() ?></p>
                    </div>
                    <div class="row col-6 m-auto">
                        <form>
                            <?php
                            if ($loggedIn) {
                                $user = UserDAO::findByUsername($_SESSION['connecte']);
                                switch ($user->getTypeutilisateurId()) {
                                    case 1:
                                        ?>
                                        <input type="hidden" name="salleId" value="<?= $salleId ?>"/>
                                        <input type="hidden" name="action" value="reserver_salle"/>
                                        <input type="submit" class="btn btn-primary btn-block rounded"
                                               value="Reserver cette salle"/>
                                        <?php
                                        break;
                                    case 2:
                                        if ($user->getId() == $salle->getIdProp()) {
                                            ?>
                                            <input type="hidden" name="salleId" value="<?= $salleId ?>"/>
                                            <input type="hidden" name="action" value="modifier_salle"/>
                                            <input type="submit" class="btn btn-primary btn-block rounded"
                                                   value="Modifier ma salle"/>
                                            <?php
                                        } else {
                                            ?>
                                            <input type="hidden" name="salleId" value="<?= $salleId ?>"/>
                                            <input type="hidden" name="action" value="reserver_salle"/>
                                            <input type="submit" class="btn btn-primary btn-block rounded"
                                                   value="Reserver cette salle"/>
                                            <?php
                                        }

                                        break;
                                    case 3:
                                        ?>
                                        <input type="hidden" name="salleId" value="<?= $salleId ?>"/>
                                        <input type="hidden" name="action" value="modifier_salle"/>
                                        <input type="submit" class="btn btn-primary btn-block rounded"
                                                   value="Modifier cette salle"/>
                                        <?php
                                        break;
                                }
                            } else {
                                ?>
                                <input type="hidden" name="salleId" value="<?= $salleId ?>"/>
                                <input type="hidden" name="action" value="connexion"/>
                                <input type="submit" class="btn btn-primary btn-block rounded"
                                        value="Reserver cette salle"/>
                                <?php
                            }
                            ?>
                        </form>
                        <form action="?action=recherche&vos_salles=true" method="post">
                        <?php
                        if ((isset($_SESSION['id']) && $_SESSION['id'] == $salle->getIdProp()) || (isset($_SESSION['role']) && $_SESSION['role'] == 3)) {
                                ?>
                                <input type="hidden" name="action" value="supprimer_salle"/>
                                <input type="hidden" name="salleId" value="<?= $salleId ?>"/>
                                <input type="submit" name="supprimer" class="btn btn-primary btn-block rounded"
                                       value="Supprimer Cette Salle"/>
                                <?php
                            }
                        ?> 
                        </form>
                        
                    </div>
                </div>
            </div>
            <footer class="site-footer">
                <?php
                include('vues/footer.php');
                ?>
            </footer>
        </div>
    </div>
</div>
</body>
</html>