<?php
    include_once('config.php');


    $query  = "DELETE FROM golds WHERE GolDID = '".$_GET['gold2_id']."' " or die("Error:" .mysqli_error($query));
    $result = mysqli_query($conn, $query);

    
    if($result){
        echo "<script type='text/javascript'> ";
        echo "alert('delete Successfully'); ";
        echo "window.location='gold.php'; ";
        echo "</script>";
    } else {
    echo "<script type='text/javascript'> ";
        echo "alert('delete ERROR!!! '); ";
        echo "window.location='gold.php'; ";
        echo "</script>";
    }

?>