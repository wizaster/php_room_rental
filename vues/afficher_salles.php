<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
if (isset($_SESSION['recherche'])) {
    $resultat = true;
} else {
    $resultat = false;
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
                        <h1>Votre reception de reve</h1>
                        <p class="mb-0">a portee de main</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="">
                    <div class="col-lg-12 row">
                        <?php
                        if ($resultat) {
                            foreach ($_SESSION['recherche'] as $trouveS) {
                                $trouve = SalleDAO::findById($trouveS);
                                $sId = $trouve->getId();
                                $image = ImageDAO::findBySalle($sId);
                                ?>
                                <div class="d-block d-md-flex listing vertical col-5">
                                    <form method="post">
                                        <a href="?action=afficher_salle&listing=<?php echo $trouve->getId() ?>" class="img d-block"<?php if (!empty($image)) {
                                            ?>
                                            style="background-image: url('<?php echo $image[0][0] ?>')"
                                            <?php
                                        }
                                        ?>
                                        >
                                            <input type="submit" name="listing" value="<?php echo $trouve->getId() ?>"
                                                   style="background-color: rgba(255, 255, 255, 0); width:100%; height:100%; color: rgba(255, 255, 255, 0);"/>
                                            <input type="hidden" name="action" value="afficher_salle"/>
                                        </a>
                                        <div class="lh-content">
                                            <span class="category">Salle Deluxe</span>
                                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                                            <h3>
                                                <a href="?action=afficher_salle&listing=<?php echo $trouve->getId() ?>"> <?php echo $trouve->getNom() ?>
                                                </a></h3>
                                            <address><?php echo $trouve->getVille() . ", " . $trouve->getProvince() . ", " . $trouve->getPays() ?></address>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                            unset($_SESSION['recherche']);
                        } else {
                            $loadAllSalle = SalleDAO::findAll();
                            foreach ($loadAllSalle as $salle) {
                                $sId = $salle->getId();
                                $image = ImageDAO::findBySalle($sId);
                                ?>
                                <div class="d-block d-md-flex listing vertical col-5">
                                    <form method="post">
                                        <a href="#" class="img d-block"<?php if (!empty($image)) {
                                            ?>
                                            style="background-image: url('<?php echo $image[0][0] ?>')"
                                            <?php
                                        }
                                        ?>
                                        >
                                            <input type="submit" name="listing" value="<?php echo $salle->getId() ?>"
                                                   style="background-color: rgba(255, 255, 255, 0); width:100%; height:100%; color: rgba(255, 255, 255, 0);"/>
                                            <input type="hidden" name="action" value="afficher_salle"/>
                                        </a>
                                        <div class="lh-content">
                                            <span class="category">Salle Deluxe</span>
                                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                                            <h3>
                                                <a href="?action=afficher_salle&listing=<?php echo $salle->getId() ?>"> <?php echo $salle->getNom() ?></a>
                                            </h3>
                                            <address><?php echo $salle->getVille() . ", " . $salle->getProvince() . ", " . $salle->getPays() ?></address>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ml-auto">
                <div class="mb-5">
                    <h3 class="h5 text-black mb-3">Filtres</h3>
                    <form action="#" method="post">
                        <div class="form-group">
                            <div class="select-wrap">
                                <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                <select class="form-control rounded" name="filtre_accessibilite">
                                    <option value="" disabled selected>--Accessibilite--</option>
                                    <?php
                                    $accessS = AccessibiliteDAO::findAll();

                                    foreach ($accessS as $access) {
                                        ?>
                                        <option value="<?php echo $access->getId(); ?>"><?php echo $access->getNom() ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select-wrap">
                                <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                <select class="form-control rounded" name="filtre_equipement">
                                    <option value="" disabled selected>--equipement--</option>
                                    <?php
                                    $equips = EquipementDAO::findAll();

                                    foreach ($equips as $equip) {
                                        ?>
                                        <option value="<?php echo $equip->getId(); ?>"><?php echo $equip->getNom() ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="wrap-icon">
                                <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                <select class="form-control rounded" name="filtre_lieu">
                                    <option disabled selected>--ville--</option>
                                    <?php
                                    $villes = SalleDAO::findAllCities();
                                    $nb = count($villes);
                                    for ($i = 0; $i < $nb; $i++) {
                                        ?>
                                        <option value="<?php echo $villes[$i]; ?>"><?php echo $villes[$i] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="filtrer"/>
                        <input type="submit" value="Filtrer"/>
                    </form>
                </div>
                <div class="mb-5">
                </div>
                <div class="mb-5">
                    <h3 class="h6 mb-3">En details</h3>
                    <p>Nos salles sont les meilleurs ne soyez pas genee</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section bg-white">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Testimonials</h2>
            </div>
        </div>
        <div class="slide-one-item home-slider owl-carousel">
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <p>John Smith</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Mon dieu mais quel bon service serieux ils ont meme ciree ma voiture.&rdquo;</p>
                    </blockquote>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <p>Christine Aguilar</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Qui aurait cru que je trouverais l'amour dans une allee de bowling a deux heures du
                            matin</p>
                    </blockquote>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <p>Robert Spears</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Je suis aux anges avec ma salles de McDonald pleine de guirlande de noel.&rdquo;</p>
                    </blockquote>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <p>Bruce Rogers</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Bonne fete Kevin&rdquo;</p>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="newsletter bg-primary py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Newsletter</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="col-md-6">
            </div>
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