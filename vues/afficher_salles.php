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
<head>
    <title>ClassyAds &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/rangeslider.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
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
                            foreach ($_SESSION['recherche'] as $trouve) {
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
                <div class="col-12 mt-5 text-center">
                    <div class="custom-pagination">
                        <span>1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <span class="more-page">...</span>
                        <a href="#">10</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 ml-auto">

                <div class="mb-5">
                    <h3 class="h5 text-black mb-3">Filters</h3>
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" placeholder="What are you looking for?" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="select-wrap">
                                <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                <select class="form-control" name="" id="">
                                    <option value="">All Categories</option>
                                    <option value="" selected="">Real Estate</option>
                                    <option value="">Books &amp; Magazines</option>
                                    <option value="">Furniture</option>
                                    <option value="">Electronics</option>
                                    <option value="">Cars &amp; Vehicles</option>
                                    <option value="">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- select-wrap, .wrap-icon -->
                            <div class="wrap-icon">
                                <span class="icon icon-room"></span>
                                <input type="text" placeholder="Location" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mb-5">
                    <form action="#" method="post">
                        <div class="form-group">
                            <p>Radius around selected destination</p>
                        </div>
                        <div class="form-group">
                            <input type="range" min="0" max="100" value="20" data-rangeslider>
                        </div>
                    </form>
                </div>

                <div class="mb-5">
                    <form action="#" method="post">
                        <div class="form-group">
                            <p>Category 'Real Estate' is selected</p>
                            <p>More filters</p>
                        </div>
                        <div class="form-group">
                            <ul class="list-unstyled">
                                <li>
                                    <label for="option1">
                                        <input type="checkbox" id="option1">
                                        Residential
                                    </label>
                                </li>
                                <li>
                                    <label for="option2">
                                        <input type="checkbox" id="option2">
                                        Commercial
                                    </label>
                                </li>
                                <li>
                                    <label for="option3">
                                        <input type="checkbox" id="option3">
                                        Industrial
                                    </label>
                                </li>
                                <li>
                                    <label for="option4">
                                        <input type="checkbox" id="option4">
                                        Land
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>

                <div class="mb-5">
                    <h3 class="h6 mb-3">More Info</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptatem placeat
                        facilis, reprehenderit eius officiis.</p>
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
                        <img src="../images/person_3.jpg" alt="Image" class="img-fluid mb-3">
                        <p>John Smith</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                            reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                            illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="../images/person_2.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Christine Aguilar</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                            reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                            illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="../images/person_4.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Robert Spears</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                            reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                            illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="../images/person_5.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Bruce Rogers</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur unde
                            reprehenderit aperiam quaerat fugiat repudiandae explicabo animi minima fuga beatae
                            illum eligendi incidunt consequatur. Amet dolores excepturi earum unde iusto.&rdquo;</p>
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

                <form class="d-flex">
                    <input type="text" class="form-control" placeholder="Email">
                    <input type="submit" value="Subscribe" class="btn btn-white">
                </form>
            </div>
        </div>
    </div>
</div>


<footer class="site-footer">
    <?php
    include('vues/footer.php');
    ?>
</footer>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-migrate-3.0.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.stellar.min.js"></script>
<script src="../js/jquery.countdown.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/bootstrap-datepicker.min.js"></script>
<script src="../js/aos.js"></script>
<script src="../js/rangeslider.min.js"></script>

<script src="../js/main.js"></script>

</body>
</html>