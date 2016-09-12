<?php
include_once 'connection.php';
include_once 'session.php';

$target_dir = "images/";
$date = date("Ymdhis");
$target_file = $target_dir . $date . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"]) && isset($_FILES['fileToUpload'])) { 
    $check = true;
    if($check !== false) {
        echo "File is an image ";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed not $imageFileType.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    //ADDING NEW FILE
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $name = $_POST['name'];
        $description = $_POST['short_desc'];
        $appartment_id = $_POST['appartment_id'];
        $url = $date . $_FILES["fileToUpload"]["name"];
        
        $query = sprintf("INSERT INTO images (appartment_ID, title, short_description, url) VALUES ($appartment_id,'%s','%s','%s')",
                mysqli_real_escape_string($link, $name),
                mysqli_real_escape_string($link, $description),
                mysqli_real_escape_string($link, $url)
                );
    $result = mysqli_query($link, $query);
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>
