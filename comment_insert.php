<?php
include_once 'header.php';

$appartment_id = $_POST['appartment_id'];
$description = $_POST['comment'];
$title = $_POST['title'];
$user_id = $_SESSION['ID'];

$query = "INSERT INTO comments(user_id, appartment_id, title, description)
        VALUES ($user_id, $appartment_id, '$title','$description');";

$result = mysqli_query($link, $query);

header('Location: appartment.php?id='.$appartment_id);