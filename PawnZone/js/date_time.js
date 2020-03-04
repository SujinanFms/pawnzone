function date_time(id)
{
        date = new Date; //object Date โดยจะมีค่าวันที่และเวลาปัจจุบัน
        year = date.getFullYear(); // getFullYear ใช้แสดงปีแบบ 4 หลัก ( ค.ศ. )
        month = date.getMonth(); // getMonth ใช้แสดงเดือนในรูปแบบตัวเลข ( เริ่มจาก 0 คือมกราคม )
        months = new Array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        d = date.getDate(); //getDate ใช้แสดงวันที่
        day = date.getDay(); // getDay ใช้แสดงตัวเลข วันของสัปดาห์ ( เริ่มจาก 0 คือวันอาทิตย์ )
        days = new Array('อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์');
        h = date.getHours(); //getHours ใช้แสดงชั่วโมง
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+d+' '+months[month]+' '+year+' '+'<br><br>'+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000'); //ตั้งเวลาการทำงานของฟังก์ชั่น ทำงานเพียงครั้งเดียวเมื่อครบระยะเวลาที่กำหนด 
                                                // มี Parameter 2 ตัวที่สำคัญคือ ชื่อฟังก์ชั่นที่ต้องการให้ทำงาน (Function) และระยะเวลา (Duration Time)
        return true;
}
 