<?php
include_once 'header.php';

if(isset($_POST['location_submit'])){
    $title = $_POST['location'];
    $description = $_POST['description'];
    $query = sprintf("INSERT INTO locations (title, description) VALUES ('%s','%s')",
            mysqli_real_escape_string($link ,$title),
            mysqli_real_escape_string($link ,$description)
            );
}
else if(isset($_POST['category_submit'])){
    $title = $_POST['category'];
    $description = $_POST['description'];
    $query = sprintf("INSERT INTO categories (title, description) VALUES ('%s','%s')",
            mysqli_real_escape_string($link ,$title),
            mysqli_real_escape_string($link ,$description)
            );
}

$result = mysqli_query($link, $query);

header('Location: administration.php');
