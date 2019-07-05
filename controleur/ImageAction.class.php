<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}
include_once('./Classes/Image.class.php');
include_once('./Classes/ImageDAO.class.php');

class ImageAction
{
    public static function addImage($nomImage, $salleId)
    {
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

        $fileName = "./images/" . $salleId . "_" . $_FILES[$nomImage]['name'];
        $fileExtension = explode('.', $_FILES[$nomImage]['name']);
        $fileExtension = end($fileExtension);
        if (!in_array($fileExtension, $extensions)) {
            $ext_error = true;
        }
        if ($_FILES[$nomImage]['error']) {
            echo $php_file_upload_error[$_FILES[$nomImage]['error']];
        } elseif ($ext_error) {
            echo "invalid file extension";
        }
        if (!$ext_error) {
            move_uploaded_file($_FILES[$nomImage]['tmp_name'], $fileName);
        }
        $iDao = new ImageDAO();
        $image = new Image($fileName, $salleId);
        $iDao->create($image);
    }
}
