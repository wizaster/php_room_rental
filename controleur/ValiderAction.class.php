<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
require_once('./Classes/SalleDAO.class.php');
require_once('./controleur/Action.interface.php');
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleDAO.class.php');
include_once('./Classes/Equipement.class.php');
include_once('./Classes/EquipementDAO.class.php');
include_once('./Classes/Accessibilite.class.php');
include_once('./Classes/AccessibiliteDAO.class.php');
include_once('./Classes/Image.class.php');
include_once('./Classes/ImageDAO.class.php');
include_once('./Classes/SalleHasAccessibilite.class.php');
include_once('./Classes/SalleHasAccessibiliteDAO.class.php');
include_once('./Classes/SalleHasEquipement.class.php');
include_once('./Classes/SalleHasEquipementDAO.class.php');

class validerAction implements Action
{
    public function execute()
    {
        $seDao = new SalleHasEquipementDAO();
        $saDao = new SalleHasAccessibiliteDAO();
        $equipArr = $_REQUEST['equipSalle'];
        $accessArr = $_REQUEST['accessSalle'];
        $salleId = $_SESSION['salleId'];
        foreach ($equipArr as $equip) {
            $sEquip = new SalleHasEquipement($salleId, $equip);
            $seDao->create($sEquip);
        }
        foreach ($accessArr as $access) {
            $sAccess = new SalleHasAccessibilite($salleId, $access);
            $saDao->create($sAccess);
        }
        if (isset($_FILES['uploadImage'])) {
            $fileName = $_SESSION['salleId'] . "_" . $_FILES['uploadImage']['name'];

            $php_file_upload_error = array(
                0 => "The file uploaded with success.",
                1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini. ",
                2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ",
                3 => "The uploaded file was only partially uploaded. ",
                4 => "No file was uploaded.",
                6 => "Missing a temporary folder.",
                7 => " Failed to write file to disk.",
                8 => "A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help."
            );

            $ext_error = false;
            $extensions = array('jpg', 'jpeg', 'gif', 'png');
            $fileExtension = explode('.', $_FILES['uploadImage']['name']);
            $fileExtension = end($fileExtension);
            if (!in_array($fileExtension, $extensions)) {
                $ext_error = true;
            }
            if ($_FILES['uploadImage']['error']) {
                echo $php_file_upload_error[$_FILES['uploadImage']['error']];
            } elseif ($ext_error) {
                echo "invalid file extension";
            }
            if (!$ext_error) {
                move_uploaded_file($_FILES['uploadImage']['tmp_name'], "./images/" . $fileName);
            }


        }
        return "default";

    }
}
