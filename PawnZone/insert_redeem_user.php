<?php
    session_start();
    include_once('config.php');



    $Rd_CusID = @$_POST['Rd_CusID'];
    $Rd_GoldID = @$_POST['Rd_GoldID'];
    $Rd_Typegold = @$_POST['Rd_Typegold'];
    $paydayredeem =  @$_POST['payday_redeem'];
    $md_price =  @$_POST['md_price'];
    $md_payrate =  @$_POST['md_payrate'];
    $sumredeem =  @$_POST['sumredeem'];
    $gstatus = 'ไถ่ถอน';

    $query = "select * FROM redeem " or die ("Error in query: $query " . mysqli_error($query));
    $result = mysqli_query($conn, $query);

    if (isset($_POST['btnpayredeem'])) {
        $sql = "INSERT INTO redeem (CusID , GoldID , 	PaydayRD , Price , Payrate , TypeGold , SumRD ) 
        VALUES ('$Rd_CusID' , '$Rd_GoldID' , '$paydayredeem' , '$md_price' , '$md_payrate' , '$Rd_Typegold' , '$sumredeem' )";

        $sql2 = " UPDATE golds  SET  
            GoldStatus='$gstatus',
            Goldpayday ='$paydayredeem'
            WHERE GoldID ='$Rd_GoldID' ";

        $resultt = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($sql));
        $result2 = mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error($sql2));
        echo "<script type='text/javascript'>";
        echo "alert('ทำรายการสำเร็จ');";
        echo"window.location = 'payment_user.php'; ";
        echo"</script>";
    }else {
        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
        echo "<script type='text/javascript'>";
        echo "alert('error! naaa');";
        echo"window.location = 'redeem_user.php'; ";
        echo"</script>";
    }

    

                        
                        ?>