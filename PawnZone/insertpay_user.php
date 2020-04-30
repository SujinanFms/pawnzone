<?php
    session_start();
    include_once('config.php');



    $Md_CusID = @$_POST['Md_CusID'];
    $Md_GoldID = @$_POST['Md_GoldID'];
    $Md_Typegold = @$_POST['Md_Typegold'];
    $payday =  @$_POST['payday'];
    $md_payrate =  @$_POST['md_payrate'];
    $Nperiod =  @$_POST['Nperiod'];
    $txtNumberC =  @$_POST['txtNumberC'];

    $query2 = "select * FROM payments " or die ("Error in query: $query2 " . mysqli_error($query2));
    $result2 = mysqli_query($conn, $query2);


    if (isset($_POST['btnpay'])) {
        $sql = "INSERT INTO payments (CusID , GoldID , PayDay , Payrate , TypeGold , NumPeriod , Total ) 
        VALUES ('$Md_CusID' , '$Md_GoldID' , '$payday' , '$md_payrate' , '$Md_Typegold' , '$Nperiod' , '$txtNumberC' )";

        $sql2 = " UPDATE golds  SET  
        Goldpayday ='$payday'
        WHERE GoldID ='$Md_GoldID' ";

        

        $resultt = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
        $result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error($sql2));

        echo "<script type='text/javascript'>";
        echo "alert('ทำรายการสำเร็จ');";
        echo"window.location = 'payment_user.php'; ";
        echo"</script>";
    }else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error!');";
        echo"window.location = 'pay_user.php'; ";
        echo"</script>";
    }


                        
                        ?>