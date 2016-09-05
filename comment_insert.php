<?php
include_once 'header.php';

$appartment_id = $_POST['appartment_id'];
$description = $_POST['comment'];
$title = $_POST['title'];
$user_id = $_SESSION['ID'];

$query = sprintf("INSERT INTO comments(user_id, appartment_id, title, description)
                    VALUES ($user_id, $appartment_id, '%s','%s');",
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $description)
        );

$result = mysqli_query($link, $query);

header('Location: appartment.php?id='.$appartment_id);