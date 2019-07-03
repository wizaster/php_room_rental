<!DOCTYPE html>
<html lang="en">
<head>
    <title>Abbys'List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="/css/aos.css">
    <link rel="stylesheet" href="/css/rangeslider.css">

    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
<?php
include('header.php');
?>
<div class="site-blocks-cover overlay hero" data-aos="fade"
     data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-12">


                <div class="row justify-content-center mb-4">
                    <div class="col-md-8 text-center">
                        <h1 class="" data-aos="fade-up">Trouver le lieu parfait pour vos évènements</h1>
                    </div>
                </div>

                <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">
                    <form method="post">
                        <div class="row align-items-center">
                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-4">
                                <input type="text" name="main_recherche" class="form-control rounded"
                                       placeholder="Que cherchez-vous?">
                            </div>
                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                                <div class="wrap-icon">
                                    <span class="icon icon-room"></span>
                                    <input type="text" name="main_recherche_lieu" class="form-control rounded"
                                           placeholder="Lieu">
                                </div>

                            </div>
                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                                <div class="select-wrap">
                                    <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                                    <select class="form-control rounded" name="" id="">
                                        <option value="">Types d'évènements</option>
                                        <option value="">Real Estate</option>
                                        <option value="">Books &amp; Magazines</option>
                                        <option value="">Furniture</option>
                                        <option value="">Electronics</option>
                                        <option value="">Cars &amp; Vehicles</option>
                                        <option value="">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xl-2 ml-auto text-right">
                                <input type="submit" class="btn btn-primary btn-block rounded" value="Trouver">
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">

        <div class="overlap-category mb-5">
            <div class="row align-items-stretch no-gutters">
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon"><span class="flaticon-house"></span></span>
                        <span class="number">3,921</span>
                        <span class="caption mb-2 d-block">Villes désservies</span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon"><span class="flaticon-books"></span></span>
                        <span class="number">398</span>
                        <span class="caption mb-2 d-block">Salle disponibles</span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon"><span class="flaticon-bunk-bed"></span></span>
                        <span class="number">1,229</span>
                        <span class="caption mb-2 d-block">Clients satifaits</span>

                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon"><span class="flaticon-innovation"></span></span>
                        <span class="number">32,891</span>
                        <span class="caption mb-2 d-block">Heures d'évènement</span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon"><span class="flaticon-car"></span></span>
                        <span class="number">29,221</span>
                        <span class="caption mb-2 d-block">Cars &amp; Vehicles</span>


                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="#" class="popular-category h-100">
                        <span class="icon"><span class="flaticon-pizza"></span></span>
                        <span class="number">219</span>
                        <span class="caption mb-2 d-block">Other</span>

                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h2 class="h5 mb-4 text-black">Salles en Vedette</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12  block-13">
                <div class="owl-carousel nonloop-block-13">

                    <div id="featured1" class="d-block d-md-flex listing vertical">
                        <a href="afficher_salle.php" class="img d-block"
                           style="background-image: url('./images/img_1.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Cars &amp; Vehicles</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="afficher_salle.php">Red Luxury Car</a></h3>
                            <address>Don St, Brooklyn, New York</address>
                            <p class="mb-0">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-secondary"></span>
                                <span class="review">(3 Reviews)</span>
                            </p>
                        </div>
                    </div>

                    <div id="featured2" class="d-block d-md-flex listing vertical">
                        <a href="afficher_salle.php" class="img d-block"
                           style="background-image: url('./images/img_2.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Real Estate</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="afficher_salle.php">House with Swimming Pool</a></h3>
                            <address>Don St, Brooklyn, New York</address>
                            <p class="mb-0">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-secondary"></span>
                                <span class="review">(3 Reviews)</span>
                            </p>
                        </div>
                    </div>

                    <div id="featured3" class="d-block d-md-flex listing vertical">
                        <a href="afficher_salle.php" class="img d-block"
                           style="background-image: url('./images/img_3.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Furniture</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="afficher_salle.php">Wooden Chair &amp; Table</a></h3>
                            <address>Don St, Brooklyn, New York</address>
                            <p class="mb-0">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-secondary"></span>
                                <span class="review">(3 Reviews)</span>
                            </p>
                        </div>
                    </div>

                    <div id="featured4" class="d-block d-md-flex listing vertical">
                        <a href="afficher_salle.php" class="img d-block"
                           style="background-image: url('./images/img_4.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Electronics</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="afficher_salle.php">iPhone X gray</a></h3>
                            <address>Don St, Brooklyn, New York</address>
                            <p class="mb-0">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-secondary"></span>
                                <span class="review">(3 Reviews)</span>
                            </p>
                        </div>
                    </div>

                    <div id="featured5" class="d-block d-md-flex listing vertical">
                        <a href="afficher_salle.php" class="img d-block"
                           style="background-image: url('./images/img_1.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Cars &amp; Vehicles</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="afficher_salle.php">Red Luxury Car</a></h3>
                            <address>Don St, Brooklyn, New York</address>
                            <p class="mb-0">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-secondary"></span>
                                <span class="review">(3 Reviews)</span>
                            </p>
                        </div>
                    </div>

                    <div id="featured6" class="d-block d-md-flex listing vertical">
                        <a href="afficher_salle.php" class="img d-block"
                           style="background-image: url('./images/img_2.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Real Estate</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="afficher_salle.php">House with Swimming Pool</a></h3>
                            <address>Don St, Brooklyn, New York</address>
                            <p class="mb-0">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-secondary"></span>
                                <span class="review">(3 Reviews)</span>
                            </p>
                        </div>
                    </div>

                    <div id="featured7" class="d-block d-md-flex listing vertical">
                        <a href="afficher_salle.php" class="img d-block"
                           style="background-image: url('./images/img_3.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Furniture</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="afficher_salle.php">Wooden Chair &amp; Table</a></h3>
                            <address>Don St, Brooklyn, New York</address>
                            <p class="mb-0">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-secondary"></span>
                                <span class="review">(3 Reviews)</span>
                            </p>
                        </div>
                    </div>

                    <div id="featured8" class="d-block d-md-flex listing vertical">
                        <a href="afficher_salle.php" class="img d-block"
                           style="background-image: url('/images/img_4.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Electronics</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="afficher_salle.php">iPhone X gray</a></h3>
                            <address>Don St, Brooklyn, New York</address>
                            <p class="mb-0">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-secondary"></span>
                                <span class="review">(3 Reviews)</span>
                            </p>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>

<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Parfait pour tout type d'évènements</h2>
                <p class="color-black-opacity-5">Que ce soit pour des retrouvailles entre amis, des fiancailles ou
                    une soirée corporative, il y a ici la salle pour vous.</p>
            </div>
        </div>

        <div class="row">
            <div id="type-evenement1" class="col-md-6 mb-4 mb-lg-4 col-lg-4">
                <div class="listing-item">
                    <div class="listing-image">
                        <img src="./images/img_1.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark" data-toggle="tooltip" data-placement="left"
                           title="Bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Car &amp; Vehicles</a>
                        <h2 class="mb-1"><a href="#">Red Luxury Car</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>
            <div id="type-evenement2" class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="./images/img_2.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Real Estate</a>
                        <h2 class="mb-1"><a href="#">House with Swimming Pool</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>

            </div>
            <div id="type-evenement3" class="col-md-6 mb-4 mb-lg-4 col-lg-4">

                <div class="listing-item">
                    <div class="listing-image">
                        <img src="./images/img_3.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-item-content">
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <a class="px-3 mb-3 category" href="#">Furniture</a>
                        <h2 class="mb-1"><a href="#">Wooden Chair &amp; Table</a></h2>
                        <span class="address">West Orange, New York</span>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-4">
                <a href="#" class="btn btn-primary rounded py-2 px-4 text-white">En savoir plus</a>
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
                        <img src="./images/person_3.jpg" alt="Image" class="img-fluid mb-3">
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
                        <img src="./images/person_2.jpg" alt="Image" class="img-fluid mb-3">
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
                        <img src="./images/person_4.jpg" alt="Image" class="img-fluid mb-3">
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
                        <img src="./images/person_5.jpg" alt="Image" class="img-fluid mb-3">
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


<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Our Blog</h2>
                <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p>
            </div>
        </div>
        <div class="row mb-3 align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="./images/hero_1.jpg" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span
                                class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                        sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="./images/hero_1.jpg" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span
                                class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                        sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="./images/hero_1.jpg" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span
                                class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                        sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                </div>
            </div>

            <div class="col-12 text-center mt-4">
                <a href="#" class="btn btn-primary rounded py-2 px-4 text-white">View All Posts</a>
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

<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/jquery.countdown.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/rangeslider.min.js"></script>
<script src="/js/script.js"></script>
<script src="/js/main.js"></script>

</body>
</html>