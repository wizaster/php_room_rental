<?php
?>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar container py-0 bg-white" role="banner">

        <!-- <div class="container"> -->
        <div class="row align-items-center">

            <div class="col-6 col-xl-2">
                <h1 class="mb-0 site-logo"><a href="index.php" class="text-black mb-0">Abbys'<span class="text-primary">List</span>
                    </a></h1>
            </div>
            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="index.php">Accueil</a></li>
                        <li><a href="listings.php">salles</a></li>
                        <li class="has-children">
                            <a href="about.php">Comment ca marche</a>
                            <ul class="dropdown">
                                <li><a href="#">Comment louer</a></li>
                                <li><a href="#">Comment afficher</a></li>
                                <li><a href="#">prix</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>

                        <li class="ml-xl-3 login"><a href="login.php"><span class="border-left pl-xl-4"></span>Se
                                Connecter</a></li>
                        <li><a href="new_user.php">Devenir Membre</a></li>
                    </ul>
                    <div class="searchbar site-menu js-clone-nav">
                        <input type="text" name="searchbar" value="trouvez le bonheur"/>
                        <a href="#" class="cta"><span
                                    class="bg-primary text-white rounded">Recherche</span></a>
                    </div>
                </nav>
            </div>


            <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
                <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
            </div>

        </div>
        <!-- </div> -->

    </header>