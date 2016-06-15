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
        <?php
        if(isset($_SESSION['ID'])){
        ?>
        <div id="reserve">
            <form method="post" action="reservation_add.php" style="width: 40%;">
                <h1>Rezerviraj bivanje v apartmaju</h1>
                <input type="date" class="form-control" name="start_date" placeholder="Začetni datum">
                <input type="date" class="form-control" name="end_date" placeholder="Končni datum"><br />
                <input type="hidden" name="appartment_id" value="<?php echo $appartment_id ?>">
                <button type="submit" name="subm" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span> REZERVIRAJ
                </button>
            </form>
        </div>
           <?php
        }
        ?>
        <div class="comments">
            <h2>Komentarji</h2>
            <?php
        if(isset($_SESSION['ID'])){
        ?>
            <form action="comment_insert.php" method="post">
                <input type="hidden" name="appartment_id" value="<?php echo $appartment_id; ?>" />
                <input type="text" class="form-control" name="title" placeholder="Naslov komentarja">
                <textarea name="comment" class="form-control"cols="5" rows="5" required="required"></textarea>
                <button type="submit" name="subm" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> KOMENTIRAJ
                </button>
            </form>
            <?php
        }
            $query = "SELECT *, c.id AS cid 
              FROM comments c INNER JOIN
                   users u ON c.user_id=u.id
              WHERE c.appartment_id=$appartment_id";
            $result = mysqli_query($link, $query);
            $st = 1;
            while ($row = mysqli_fetch_array($result)) {
                //preverimo ali gre za sodo ali liho
                //vrstico komentarja
                if ($st%2==0) {
                    echo '<div class="comment soda">';
                }
                else {
                    echo '<div class="comment liha">';
                }
                echo '<span class="username"><b>'.
                    $row['first_name'].' '.
                    $row['last_name'].
                    '</b></span> ';
                echo '<hr/>';
                echo $row['description'];
                echo '</div>';
                $st++;
            }
            ?>
        </div>
    </div>
<?php
    }
    
}
    
?>
    
<?php
include_once 'footer.php';

