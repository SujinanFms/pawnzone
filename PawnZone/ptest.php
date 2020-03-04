<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="js/testcal.js">
    <title>Document</title>
</head>
<body>
    <center>    
        
        <p id="demo"></p>
        <script>
            var x = "We are the so-called \"Vikings\" from the north.";
            document.getElementById("demo").innerHTML = x; 
        </script>   
        
        <form method="post" action="ptest.php">
            <input type="text" name="in" placeholder="in">
            <input type="text" name="rate" placeholder="rate">

            <button type="submit" name="cal">*</button>
            
            <button type="submit" name="add">+</button>

            <button type="submit" name="send">ส่ง</button>
        </form>


        <?php

            $in = @$_POST['in'];
            $rate = @$_POST['rate'];

            if (isset($_POST['cal'])) {
                $result = $in*$rate;
                echo $result;
            }
            if (isset($_POST['add'])) {
                //echo "<meta http-equiv=\"refresh\" content=\"1;URL=ptest1.php\" />";
                $result = $in+$rate;
                echo "<a href=ptest1.php target=_blank>$result</a>";
            }
            if (isset($_POST['send'])) {
                echo "<a href=ptest1.php target=_blank>$in $rate</a>";
            }
        ?>
    <center>
</body>
</html>