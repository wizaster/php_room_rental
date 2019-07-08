<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleDAO.class.php');
include_once('./Classes/Equipement.class.php');
include_once('./Classes/EquipementDAO.class.php');
include_once('./Classes/Accessibilite.class.php');
include_once('./Classes/AccessibiliteDAO.class.php');

?>
<!DOCTYPE html>
<html lang="en">

<body>
<?php
include('vues/header.php');
?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(./images/banquet_login.jpg);"
     data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Historique</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-12 row" data-aos="fade">
                <div>
                    <h4>Vos locations</h4>
                    <table class="table-bordered">
                        <tr>
                            <th>Salle</th>
                            <th>Debut de la location</th>
                            <th>Fin de la location</th>
                        </tr>
                        <?php
                        $locations = unserialize($_SESSION['locations']);
                        if ($locations != null){
                        foreach ($locations as $location) {
                            ?>
                            <tr>
                                <td>
                                    <a href="?action=afficher_salle&salleId=<?php echo $location->getSalleId() ?>"><?php echo SalleDAO::findById($location->getSalleId())->getNom() ?></a>
                                </td>
                                <td><?php echo $location->getDateDebut() ?></td>
                                <td><?php echo $location->getDateFin() ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                    }
                    else {
                        ?>
                        </table>
                        <h4>Votre historique ne contient aucune locations</h4>
                        <?php
                    }
                    ?>
                </div>
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
</body>


