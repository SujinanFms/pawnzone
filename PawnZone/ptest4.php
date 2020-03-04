<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </head>
<body>
    <?php
        $homepage = file_get_contents('https://xn--42cah7d0cxcvbbb9x.com/tag/%E0%B8%A3%E0%B8%B2%E0%B8%84%E0%B8%B2%E0%B8%97%E0%B8%AD%E0%B8%87%E0%B8%A5%E0%B9%88%E0%B8%B2%E0%B8%AA%E0%B8%B8%E0%B8%94%E0%B8%A7%E0%B8%B1%E0%B8%99%E0%B8%99%E0%B8%B5%E0%B9%89/');

        $findme1 = ">ข่าวแนวโน้มราคาทองคำ";
        $findme2 = "<div"; //mainCol
        $findme3 = "ข่าวเกี่ยวกับราคาทองล่าสุดวันนี้";

        $cutstr1 = strstr($homepage,$findme1);
        $cutstr2 = strstr($cutstr1,$findme2); //leftCol
        $cutstr3 = strstr($cutstr2,$findme3);

        $len1 = strlen($cutstr2);
        $len2 = strlen($cutstr3);

        $rightlen = $len1-$len2;

        $curstr1 = substr($cutstr2,0,$rightlen);
        
        $curstr4 = str_replace("display:inline-block;width:336px;height:280px","display:inline-block;width:336px;height:0px","$curstr1"); 
        

        if($cutstr1!==FALSE){

            echo $curstr4;

        }else{

            echo "ไม่พบ $efindme ใน $cutstr";

        }

    ?>
</body>
</html>

