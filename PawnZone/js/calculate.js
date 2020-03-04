
function nStr(){
    var inputprice = document.getElementById('input_price').value;
    var inputrate = document.getElementById('input_rate').value;
    var price = parseFloat(inputprice); //แปลงข้อความจาก input_price เป็นตัวเลขแบบ float
    var rate = parseFloat(inputrate);
    var show = document.getElementById('show');
    var payrate;
   if(isNaN(price)||isNaN(rate)){
    //  document.getElementById("show").setAttribute("color","red");
     show.value="ERROR"
   }
   else{
     if(inputprice.length>0){
       if(isNaN(rate)){
         //document.getElementById("show").setAttribute("color","red");
         show.value="ERROR"
       }
       else if(inputrate.length>0){
         //document.getElementById("show").setAttribute("color","Blue");
         payrate = (price*rate)/100
         show.value = payrate;
       }
     }
   }

 }
