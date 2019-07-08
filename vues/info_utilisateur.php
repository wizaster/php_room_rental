<?php

include_once('./Classes/User.class.php');
include_once('./Classes/UserDAO.class.php');

$uDao = new UserDAO();
$db = Database::getInstance();
?>

<!DOCTYPE html>
<html lang="en">
<body>
<?php
include('header.php');
?>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(../images/banquet_login.jpg);"
     data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Votre Profil</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-12" data-aos="fade">
                <form action="?action=afficher_profil&updated=true" method="post" class="p-5 bg-white">
                    <div class=" form-group">
                        <div class=" row col-md-12">
                            <p>Vos Infos</p>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-5">
                                <label class="text-black" for="field_password">Mot de passe</label>
                                <input type="password" id="field_password" name="field_password"
                                       class="form-control" value="<?php echo $_SESSION['user']['psw'] ?>">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-5">
                                <label class="text-black" for="field_prenom">Prénom</label>
                                <input type="text" id="field_prenom" name="field_prenom" class="form-control"
                                       value="<?php echo $_SESSION['user']['prenom'] ?>">
                            </div>
                            <div class="col-5">
                                <label class="text-black" for="field_nom">Nom</label>
                                <input type="text" id="field_nom" name="field_nom" class="form-control"
                                       value="<?php echo $_SESSION['user']['nom'] ?>">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-10">
                                <label class="text-black" for="field_email">Adresse courriel</label>
                                <input type="email" id="field_email" name="field_email" class="form-control"
                                       value="<?php echo $_SESSION['user']['email'] ?>">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-7 form-room">
                                <label class="text-black" for="adresse_user">Adresse Courante</label>
                                <input type="text" id="adresse_user" name="adresse_user" class="form-control"
                                       readonly value="<?php echo $_SESSION['user']['adresse'] ?>">
                            </div>
                        </div>
                        <div class="row col-12">
                            <div class="col-3 form-room">
                                <label class="text-black" for="noCivique_user">No civique</label>
                                <input type="number" id="noCivique_user" name="noCivique_user" class="form-control">
                            </div>
                            <div class="col-2 form-room">
                                <label class="text-black" for="app_user">Appartement</label>
                                <input type="text" id="app_user" name="app_user" class="form-control">
                            </div>
                            <div class="col-7 form-room">
                                <label class="text-black" for="rue_user">Rue</label>
                                <input type="text" id="rue_user" name="rue_user" class="form-control">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-3 form-room">
                                <label class="text-black" for="codePostal_user">Code postal</label>
                                <input type="text" id="codePostal_user" name="codePostal_user" class="form-control">
                            </div>
                            <div class="col-3 form-room">
                                <label class="text-black" for="ville_user">Ville</label>
                                <input type="text" id="ville_user" name="ville_user" class="form-control">
                            </div>
                            <div class="col-3 form-room">
                                <label class="text-black" for="province_user">Province</label>
                                <input type="text" id="province_user" name="province_user" class="form-control">
                            </div>
                            <div class="col-3 form-room">
                                <label class="text-black" for="pays_user">Pays</label>
                                <input type="text" id="pays_user" name="pays_user" class="form-control">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-12 form-room">
                                <label class="text-black" for="description_user">Description</label>
                                <div>Dites quelque chose à propos de vous</div>
                                <textarea rows="5" id="description_user" name="description_user"
                                          class="form-control"><?php echo $_SESSION['user']['desc'] ?></textarea>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="row col-md-12">
                            <div class="col-12 form-room">

                            </div>
                        </div>
                    </div>


                    <div class="row col-12">
                        <div class="col-12">
                            <input type="submit" name="btnModifierUtilisateur" value="Enregistrer"
                                   class="btn btn-primary py-2 px-4 text-white btn-suivant">
                            <input type="hidden" name="action" value="modifier_utilisateur"/>
                        </div>
                    </div>
                </form>
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
        </div>
    </div>
</div>
<footer class="site-footer">
    <?php
    include('vues/footer.php');
    ?>
</footer>
</body>

