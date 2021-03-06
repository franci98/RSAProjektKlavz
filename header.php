<!DOCTYPE html>
<?php
include_once 'connection.php';
include_once 'session.php';

?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Apartmaji - Domov</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="css/header_style.css" />
        <link type="text/css" rel="stylesheet" href="css/background_style.css" />
        <link href='css/index_style.css' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/head.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="nav-menu">
              <ul>
                <li class="current_page_item"><a href="index.php" title="Home">DOMOV</a></li>
                <li class="page_item"><a href="products.php">APARTMAJI</a></li>
                    <?php
                      if(isset($_SESSION['ID'])){
                          echo '<li class="page_item page-item-9"><a href="apartment_add.php">DODAJ APARTMA</a></li>';
                          echo '<li class="page_item page-item-9"><a href="reservations.php">REZERVACIJE</a></li>';
                          if(isset($_SESSION['admin'])){
                              echo '<li class="page_item page-item-9"><a href="administration.php">ADMINISTRACIJA</a></li>';
                          }
                          echo '<li class="page_item page-item-9"><a href="logout.php">Odjava ('.$_SESSION['username'].')</a></li>';
                      }
                      else{
                          echo '<li class="page_item page-item-9"><a href="login.php">PRIJAVA</a></li>';
                          echo '<li class="page_item page-item-9"><a href="register.php">REGISTRACIJA</a></li>';
                      }
                              ?>
              </ul>
            </div><!-- .nav-menu -->
        </nav><!-- #site-navigation -->
        <div class="bg-img">
            <div id="left-nav-menu">
    <div id="categories-nav-menu">
        <h2>Kategorije:</h2>
        <hr>
        <ul>
            <?php
            $query = "SELECT *
                          FROM categories;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<li class="sidebar_cat" data-toggle="tooltip" data-id="'.$row['ID'].'" title="'.$row['description'].'" ><a href=products.php?category_id="'.$row['ID'].'">'.$row['title'].'</a></li>';
                }
            ?>
        </ul> 
    </div>
    <div id="categories-nav-menu">
        <hr>
        <h2>Lokacije:</h2>
        <hr>
        <ul>
            <?php
            $query = "SELECT *
                          FROM locations;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<li class="sidebar_cat" data-toggle="tooltip" data-id="'.$row['ID'].'" title="'.$row['description'].'" ><a href=products.php?category_id="'.$row['ID'].'">'.$row['title'].'</a></li>';
                }
            ?>
        </ul> 
    </div>
</div>