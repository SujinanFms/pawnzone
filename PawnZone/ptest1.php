<?php
    $in = @$_POST['in'];
    $rate = @$_POST['rate'];
    if (isset($_POST['click'])) {
        echo $in;
        echo $rate;
    }
    
?>