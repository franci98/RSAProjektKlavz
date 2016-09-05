<?php
include_once 'connection.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$passwrd = sha1($_POST['passwrd']);
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$reg_date= date('Y-m-d');

$query = sprintf("INSERT INTO users (username, first_name, last_name, passwrd, reg_date, telephone, email)
        VALUES ('%s','%s','%s','$passwrd','$reg_date','%s','%s');",
        mysqli_real_escape_string($link, $username),
        mysqli_real_escape_string($link, $first_name),
        mysqli_real_escape_string($link, $last_name),
        mysqli_real_escape_string($link, $telephone),
        mysqli_real_escape_string($link, $email)
        );
$result = mysqli_query($link, $query);

session_start();
$query = "SELECT * FROM users WHERE username='$username';";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);

header('Location: login.php');
 
