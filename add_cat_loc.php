<?php
include_once 'header.php';

if(isset($_POST['location_submit'])){
    $title = $_POST['location'];
    $description = $_POST['description'];
    $query = "INSERT INTO locations (title, description)"
            . "VALUES ('$title','$description')";
}
else if(isset($_POST['category_submit'])){
    $title = $_POST['category'];
    $description = $_POST['description'];
    $query = "INSERT INTO categories (title, description)"
            . "VALUES ('$title','$description')";
}

$result = mysqli_query($link, $query);

header('Location: administration.php');
