<?php
include_once 'header.php';

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$appartment_id = $_POST['appartment_id'];
$user_id = $_SESSION['ID'];
$res_date = date('Y-m-d');

$query = "INSERT INTO rentals(start_date, end_date, user_id, appartment_id, res_date)
        VALUES ('$start_date','$end_date', $user_id, $appartment_id, '$res_date')";
$result = mysqli_query($link, $query);

header('Location: appartment.php?id='.$appartment_id);


