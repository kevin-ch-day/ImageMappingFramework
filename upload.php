<?php
require_once('includes\header.inc');
header('Refresh: 3; URL = imageFramework_single.php');
?>

<div id="content">
  <div id="main-menu">

<?php

$_SESSION['image'] = $_FILES["fileToUpload"]["name"];

$target_dir = $_SERVER['DOCUMENT_ROOT']."/web/ImageFramework/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br/>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br/>";
        $uploadOk = 0;
    }
	
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, it already exists.<br/>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, the image is too large.<br/>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" &&
		$imageFileType != "png" &&
		$imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF images are allowed.<br/>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "The image was not uploaded.<br/>";
	
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The image ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br/>";
    } else {
        echo "Sorry, there was an error uploading the image.<br/>";
    }
}
?>

</form>
  </div>
</div>

<?php
require_once('includes\footer.inc');
?>