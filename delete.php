<?php
include_once 'header.php';

if(isset($_GET['location_id'])){
    $query = "DELETE FROM locations WHERE id=".$_GET['location_id'];
}
if(isset($_GET['category_id'])){
    $query = "DELETE FROM categories WHERE id=".$_GET['category_id'];
}
if(isset($_GET['user_id'])){
    $query = "DELETE FROM users WHERE id=".$_GET['user_id'];
}
$result = mysqli_query($link, $query);

header('Location: administration.php');
