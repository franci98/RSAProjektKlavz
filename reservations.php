<?php
include_once 'header.php';
$user_id=$_SESSION['ID'];
$query = "SELECT a.*, r.start_date, r.end_date
          FROM appartments a INNER JOIN rentals r ON r.appartment_id=a.id
          WHERE r.user_id=$user_id";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
            ?>
    
        <div class="col-xs-6 col-md-3 thumbnail">
            
                <?php
                $query = "SELECT *
            FROM images WHERE appartment_id=".$row['ID']." LIMIT 1;";
            $result2 = mysqli_query($link, $query);
            while ($row2 = mysqli_fetch_array($result2)) {
            
            echo '<img src="images/'.$row2['url'].'" alt="'.$row2['title'].'">';
            }
                ?>
            <h3><a href="appartment.php?id=<?php echo $row['ID']; ?>"><?php echo $row['title']; ?></a></h3>
            <p class="list-group-item">Datum prihoda: <?php echo date('d. M Y',strtotime($row['start_date'])); ?></p>
            <p class="list-group-item">Datum odhoda: <?php echo date('d. M Y',strtotime($row['end_date'])); ?></p>
        </div>
    <?php
        }    
?>
        
<?php
include_once 'footer.php';
?>
