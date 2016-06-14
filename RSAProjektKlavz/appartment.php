<?php
include_once 'header.php';
?>
<link href='css/index_style.css' rel='stylesheet' type='text/css'>
<link href='css/product_style.css' rel='stylesheet' type='text/css'>
<?php
if(isset($_GET['id'])){
    $appartment_id=$_GET['id'];
    $query = "SELECT a.*
            FROM appartments a INNER JOIN categories c ON a.category_id=c.id
                                INNER JOIN locations l ON l.id=a.location_id
                                
            WHERE a.id=$appartment_id;";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        ?>
    <div id="product_div">
        <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="#desc">Opis</a></li>
          <li role="presentation" class="active"><a href="#data">Podatki</a></li>
          <li role="presentation" class="active"><a href="#reserve">Rezerviraj</a></li>
        </ul>
        <div class="img-div">
            <?php
            $query = "SELECT *
            FROM images WHERE appartment_id=$appartment_id LIMIT 1;";
            $result2 = mysqli_query($link, $query);
            while ($row2 = mysqli_fetch_array($result2)) {
            
            echo '<img src="images/'.$row2['url'].'" alt="'.$row2['title'].'"';
            }
            if (isset($_SESSION['ID'])){
            if($_SESSION['ID']==$row['user_ID']){
              ?> 
                <form action="upload_image.php" method="post" enctype="multipart/form-data">
                    Izberite sliko apartmaja:
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                    <input class="form-control" type="text" name="name" >
                    <input class="form-control" type="text" name="short_desc" placeholder="Kratek opis">
                    <input type="hidden" name="appartment_id" value="<?php echo $appartment_id ?>" >
                    <input type="submit" value="Naloži" name="submit">
                </form>
              <?php 
            }}
            ?>
        </div>
        <hr>
        <div id="desc">
            <?php
            echo $row['description'];
            ?>
        </div>
        <hr>
        <div id="data">
            <h1>Splošni podatki:</h1>
            <ul class="list-group" style="width: 30%;">
            <?php
            echo '<li class="list-group-item" > Leto: <span class="badge">'.$row['year_made'].'</span></li>';
            echo '<li class="list-group-item" > Spalnice: <span class="badge">'.$row['bedrooms'].'</span></li>';
            echo '<li class="list-group-item" > Kopalnic: <span class="badge">'.$row['bathrooms'].'</span></li>';
            echo '<li class="list-group-item" > Osebe: <span class="badge">'.$row['persons'].'</span></li>';
            echo '<li class="list-group-item" > Cena: <span class="badge">'.$row['ppd'].'€</span></li>';
            ?>
            </ul>
        </div>
    </div>
<?php
    }
    
}
    
?>
    
<?php
include_once 'footer.php';

