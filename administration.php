<?php
include_once 'header.php';
?>
<link href='css/administration_style.css' rel='stylesheet' type='text/css'><div id="admin_div">
    <h1>Kategorije</h1>
<table><tr><th>Kategorija</th><th>Opis</th><th>Izbriši</th></tr>
            <?php
            $query = "SELECT *
                          FROM categories;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr><td>'.$row['title'].'</td><td>'.$row['description'].'</td><td><a class="btn btn-default" href="delete.php?category_id='.$row['ID'].'" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td></tr>';
                }
            ?>
</table> 
<form action="add_cat_loc.php" method="post" >
    <input type="text" class="form-control" name="category" placeholder="Ime nove kategorije">
    <textarea name="description" class="form-control"cols="5" rows="5" placeholder="Opis kategorije" required="required"></textarea>
    <button type="submit" name="category_submit" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> DODAJ
    </button>
</form>
<br />
<?php
        
?>
<h1>Lokacije</h1>
<table><tr><th>Lokacije</th><th>Opis</th><th>Izbriši</th></tr>
            <?php
            $query = "SELECT *
                          FROM locations;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr><td>'.$row['title'].'</td><td>'.$row['description'].'</td><td><a class="btn btn-default" href="delete.php?location_id='.$row['ID'].'" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td></tr>';
                }
            ?>
</table>
<form action="add_cat_loc.php" method="post" >
    <input type="text" class="form-control" name="location" placeholder="Ime nove lokacije">
    <textarea name="description" class="form-control"cols="5" rows="5" placeholder="Opis lokacije" required="required"></textarea>
    <button type="submit" name="location_submit" class="btn btn-default btn-lg">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> DODAJ
    </button>
</form>
<br />
<h1>Uporabniki</h1>
<table><tr><th>Ime</th><th>Priimek</th><th>E-mail</th><th>Izbriši uporabnika</th></tr>
            <?php
            $query = "SELECT *
                          FROM users;";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td><td>'.$row['email'].'</td><td><a class="btn btn-danger" href="delete.php?user_id='.$row['ID'].'" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td></tr>';
                }
            ?>
</table> 
</div>
<?php
include_once 'footer.php';
?>

