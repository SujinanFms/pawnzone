<?php
    session_start();
    include_once('config.php');



    $Bl_CusID = @$_POST['Bl_CusID'];
    $Bl_GoldID = @$_POST['Bl_GoldID'];
    $balance =  @$_POST['txtNumberC'];
    $datebalance =  @$_POST['datebalance'];
    $inputbalance =  @$_POST['inputbalance'];
    $Blrate = @$_POST['txtNumberD'];
   

    $query = "select * FROM paybalance " or die ("Error in query: $query " . mysqli_error($query));
    $result = mysqli_query($conn, $query);


    if (isset($_POST['btnbalance'])) {
        $sql = "INSERT INTO paybalance ( CusID , GoldID ,  Balancedate , Paybalance  ) 
        VALUES ('$Bl_CusID' , '$Bl_GoldID' , '$datebalance' , '$inputbalance' )";


        
        $sql1 = " UPDATE golds  SET  
            Goldbalance ='$balance',
            Pay = '$Blrate',
            Goldpayday = '$datebalance'
            WHERE GoldID ='$Bl_GoldID' ";

        $resultt = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
        $result1 = mysqli_query($conn, $sql1) or die ("Error in query: $sql1 " . mysqli_error($sql1));
        echo "<script type='text/javascript'>";
        echo "alert('ทำรายการสำเร็จ');";
        echo"window.location = 'payment_user.php'; ";
        echo"</script>";
    }else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! ');";
        echo"window.location = 'balance_user.php'; ";
        echo"</script>";
    }

    

                        
?>