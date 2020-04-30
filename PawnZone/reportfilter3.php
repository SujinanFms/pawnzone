<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
    include_once('config.php');  
       $output = '';  
                //T1 ทองคำรูปพรรณ
                //T2 ทองคำแท่ง
                
                //จำนวนทองคำ
                $countAllT1 = 0 ;
                $countAllT2 = 0 ;
                $countAll = 0 ;

                //จำนวนทองคำที่ไถ่ถอน
                $countRT1 = 0 ;
                $countRT2 = 0 ;
                $countR = 0 ;
                $weightRT1 = 0;
                $weightRT2 = 0;
                $weightR = 0;

                //จำนวนทองคำที่นำไปหลอม
                $countFT1 = 0 ;
                $countFT2 = 0 ;
                $countF = 0 ;
                $weightFT1 = 0;
                $weightFT2 = 0;
                $weightF = 0;

                //weightGold
                $weightT1 = 0;
                $weightT2 = 0;
                $weight = 0;

                //จำนวนคน
                $countPT1 = 0;
                $countPT2 = 0;
                $countP = 0;

                //ยอดปัจจุบัน
                $countCT1 = 0 ;
                $countCT2 = 0 ;
                $countC = 0 ;
                $weightCT1 = 0;
                $weightCT2 = 0;
                $weightC = 0;
                $countPCT1 = 0;
                $countPCT2 = 0;
                $countPC = 0;

                //redeem
                $income1T1 = 0 ;
                $income1T2 = 0 ;
                $curID1T1 = 1;
                $curID1T2 = 1;
                //payments
                $income2T1 = 0;
                $income2T2 = 0;
                $curID2T1 = 1;
                $curID2T2 = 1;
                //golds
                $expenseT1 = 0 ;
                $expenseT2 = 0 ;
                $curID3T1 = 1;
                $curID3T2 = 1;

                //income ทองคำรูปพรรณ
                $incomeT1 = 0;
                //income ทองคำแท่ง
                $incomeT2 = 0;

                //ยอดสุทธิ
                $totalT1 = 0;
                $totalT2 = 0;

                $sql = "select * from redeem WHERE PaydayRD BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
                $query = mysqli_query($conn,$sql);

                $sql2 = "select * from payments WHERE PayDay BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ";
                $query2 = mysqli_query($conn,$sql2);

                $sql3 = "select * from golds WHERE Goldpawnday BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ";
                $query3 = mysqli_query($conn,$sql3);
                
                while ($result = mysqli_fetch_assoc($query)) { //Redeem
                        if($result['TypeGold'] ==  "ทองคำรูปพรรณ"){
                            if($curID1T1 > $result['RedeemID'] ){
                                break;
                            }
                            $income1T1 = $income1T1 + $result['SumRD'];
                            $curID1T1 = $result['RedeemID'];
                        }
                        else if($result['TypeGold'] ==  "ทองคำแท่ง"){
                            if($curID1T2 > $result['RedeemID'] ){
                                break;
                            }
                            $income1T2 = $income1T2 + $result['SumRD'];
                            $curID1T2 = $result['RedeemID'];
                        }
                }

                while ($result2 = mysqli_fetch_assoc($query2)) { //payments
                        if($result2['TypeGold'] ==  "ทองคำรูปพรรณ"){
                            if($curID2T1 > $result2['PaymentID'] ){
                                break;
                            }
                            $income2T1 = $income2T1 + $result2['Total'];
                            $curID2T1 = $result2['PaymentID'];
                        }
                        else if($result2['TypeGold'] ==  "ทองคำแท่ง"){
                            if($curID2T2 > $result2['PaymentID'] ){
                                break;
                            }
                            $income2T2 = $income2T2 + $result2['Total'];
                            $curID2T2 = $result2['PaymentID'];
                        }
                }

                while ($result3 = mysqli_fetch_assoc($query3)) { //golds
                        if($result3['TypeGold'] ==  "ทองคำรูปพรรณ"){
                            if($curID3T1 > $result3['GoldID'] ){
                                break;
                            }
                            else if($result3['GoldStatus'] == "ไถ่ถอน"){
                                $countRT1 = $countRT1 +1;
                                $weightRT1 = $weightRT1 + $result3['WeightGold'];
                            }
                            else if($result3['GoldStatus'] == "นำไปหลอม"){
                                $countFT1 = $countFT1 +1;
                                $weightFT1 = $weightFT1 + $result3['WeightGold'];
                            }
                            else if($result3['GoldStatus'] == "อยู่ในระบบ"){
                                $countCT1 = $countCT1 +1;
                                $weightCT1 = $weightCT1 + $result3['WeightGold'];
                                $countPCT1 = $countPCT1 +1;
                            }
                            $countAllT1 = $countAllT1 + 1;
                            $weightT1 = $weightT1 + $result3['WeightGold'];
                            $countPT1 = $countPT1 + 1;
                            $expenseT1 = $expenseT1 + $result3['Price'];
                            $curID3T1 = $result3['GoldID'];
                        }
                        else if($result3['TypeGold'] ==  "ทองคำแท่ง"){
                            if($curID3T2 > $result3['GoldID'] ){
                                break;
                            }
                            else if($result3['GoldStatus'] == "ไถ่ถอน"){
                                $countRT2 = $countRT2 +1;
                                $weightRT2 = $weightRT2 + $result3['WeightGold'];
                            }
                            else if($result3['GoldStatus'] == "นำไปหลอม"){
                                $countFT2 = $countFT2 +1;
                                $weightFT2 = $weightFT2 + $result3['WeightGold'];
                            }
                            else if($result3['GoldStatus'] == "อยู่ในระบบ"){
                                $countCT2 = $countCT2 +1;
                                $weightCT2 = $weightCT2 + $result3['WeightGold'];
                                $countPCT2 = $countPCT2 +1;
                            }
                            $countAllT2 = $countAllT2 + 1;
                            $weightT2 = $weightT2 + $result3['WeightGold'];
                            $countPT2 = $countPT2 + 1;
                            $expenseT2 = $expenseT2 + $result3['Price'];
                            $curID3T2 = $result3['GoldID'];
                        }
                }

                //รายรับ
                $incomeT1 = $income1T1 + $income2T1;
                $incomeT2 = $income1T2 + $income2T2;
                //ยอดสุทธิ
                $totalT1 = $incomeT1 - $expenseT1;
                $totalT2 = $incomeT2 - $expenseT2;
                //จำนวนทองคำทั้งหมด
                $countAll = $countAllT1 + $countAllT2;
                //น้ำหนักทอง
                $weight = $weightT1 + $weightT2;
                //จำนวนคน
                $countP = $countPT1 + $countPT2;
                //จำนวนทองคำที่ไถ่ถอน
                $countR = $countRT1 + $countRT2;
                //จำนวนทองคำที่นำไปหลอม
                $countF = $countFT1 + $countFT2;
                //น้ำหนักทองที่ไถ่ถอน
                $weightR = $weightRT1 + $weightRT2;
                //น้ำหนักทองที่นำไปหลอม
                $weightF = $weightFT1 + $weightFT2;
                //จำนวนทองคำที่อยู่ในระบบ
                $countC = $countCT1 + $countCT2;
                //จำนวนคนที่อยู่ในระบบ
                $countPC = $countPCT1 + $countPCT2;
                //น้ำหนักทองที่อยู่ในระบบ
                $weightC = $weightCT1 + $weightCT2;
                $output .= '
                        

                    <div class="tbreport4">
                        <div class="table-responsive-sm">          
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4"> ยอดปัจจุบัน</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>ประเภท</th>
                                    <th>ชิ้น</th>
                                    <th>น้ำหนัก (กรัม)</th>
                                    <th>คน</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>ทองรูปพรรณ</td>
                                    <td>'. number_format($countCT1) .'</td>
                                    <td>'. number_format($weightCT1) .'</td>
                                    <td>'. number_format($countPCT1) .'</td>
                                </tr>
                                <tr>
                                    <td>ทองคำแท่ง</td>
                                    <td>'. number_format($countCT2) .'</td>
                                    <td>'. number_format($weightCT2) .'</td>
                                    <td>'. number_format($countPCT2) .'</td>
                                </tr>
                                <tr>
                                    <td>รวม</td>
                                    <td>'. number_format($countC) .'</td>
                                    <td>'. number_format($weightC) .'</td>
                                    <td>'. number_format($countPC) .'</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- tbreport4 -->
                 ';
                 $output .= '</table>';  
                 echo $output;
                
 }  
 ?>
