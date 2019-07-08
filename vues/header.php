<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
?>



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
                <h1 class="mb-0 site-logo"><a href="?action=default" class="text-black mb-0">Loue<span
                                class="text-primary">ta salle</span>
                    </a></h1>
            </div>
            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="?action=default">Accueil</a></li>
                        <li><a href="?action=afficher_salles">salles</a></li>
                        <li class="has-children">
                            <a href="?action=a_propos">Comment ca marche</a>
                            <ul class="dropdown">
                                <li><a href="?action=afficher_salle">Comment louer</a></li>
                                <li><a href="?action=ajouter_salle">Comment afficher</a></li>
                                <li><a href="?action=reserver_salle">prix</a></li>
                                <li><a href="?action=afficher_profil">FAQ</a></li>
                            </ul>
                        </li>
                        <li><a href="?action=contact">Contact</a></li>


                        <?php
                        if (!$loggedIn) {
                            ?>
                            <li class="ml-xl-3 login"><a href="?action=connexion"><span
                                            class="border-left pl-xl-4"></span>Se
                                    Connecter</a></li>
                            <?php
                        } else { ?>
                            <li><a href="?action=deconnexion">Deconnexion</a></li>
                            <?php
                        }
                        ?>
                        <?php
                        if (!$loggedIn) {
                            ?>
                            <li><a href="?action=nouvel_utilisateur">Devenir Membre</a></li>
                            <?php
                        } else { ?>
                            <li><a href="?action=afficher_profil">Profil</a></li>
                            <?php
                        }
                        ?>

                    </ul>
                    <div class="searchbar site-menu js-clone-nav">
                        <label for="main_recherche"></label>
                        <input type="text" name="main_recherche" id="main_recherche" placeholder="Trouver le bonheur"/>
                        <a href="?action=recherche" class="cta"><span
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


