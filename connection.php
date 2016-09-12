<?php
$host="localhost";
$user="franci";
$password="kadaj";
$link = mysqli_connect($host, $user, $password)or 
        die("Povezava neuspešna: ".  mysqli_connect_error());;
$db_name = "franci";
mysqli_select_db($link, $db_name) or 
        die("Povezava neuspešna: ".  mysqli_connect_error());
mysqli_query($link, "SET NAMES 'utf8'");

?>

