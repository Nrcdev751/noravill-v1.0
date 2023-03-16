<?php
//1. เชื่อมต่อ database: 
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_detail: 
$query = "SELECT * FROM tb_detail ORDER BY de_id ASC";
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($connect, $query)  or die("Error:" . mysqli_error($connect)); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<table border='1' align='center' width='300'>";
//หัวข้อตาราง
 foreach($result as $row){
 //form 
  echo "<form action='update_count.php' method='post'>";
  //ส่งแบบ array value & key  , key คือไอดี (pk), value คือคะแนนใหม่ที่ต้องการอัพเดท *สังเกตตรง name & value
  echo "<label class='h4 bg-white mt-3 col-md-12 shadow fw-bold p-3'>$row[de_name]
  <input type='number' class= 'form-input col-md-2 text-warning fw-bold border-0 text-center'name='update_count[$row[de_id]]' value='$row[de_count]' min='0' max='100'></input>ห้อง</label>";
  echo "</br>"; 
}
  echo "<button class='btn btn-warning mt-3 col-md-12 shadow fw-bold  p-3' type='submit'><h4><i class='fa-sharp fa-solid fa-wrench'></i> ปรับจำนวนห้อง</h4></button>";
  echo '</form>';
//5. close connection
mysqli_close($connect);
?>