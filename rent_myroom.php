<?php include 'connect.php';
session_start();
error_reporting(0);
if(!$_SESSION['u_id']){
    echo "<script type='text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
    echo "window.location='login.php';";
    echo "</script>;";
  }
  





$user = "SELECT * From tb_user where u_id = '".$_SESSION['u_id']."'";
$user_query = mysqli_query($connect,$user) or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($user_query);

$room_show = "SELECT tb_reser.*,tb_detail.* From tb_reser INNER JOIN 
    tb_detail on tb_reser.de_id = tb_detail.de_id where r_id = '".$_GET['r_id']."'";
$room_show_query = mysqli_query($connect,$room_show);
$row_show = mysqli_fetch_assoc($room_show_query);


if($row_show['de_show']=='pending'){
    echo "<script type='text/javascript'>";
    echo "alert('อย่านะผมรู้คุณคิดอะไรอยู่');";
    echo "window.location='rent_catg.php';";
    echo "</script>;";
  }
  


$other_room = "SELECT * From tb_detail order by rand() limit 4";
$other_query = mysqli_query($connect,$other_room);

$page = 'rent';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?php echo $row_w['h_name'];?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ed752c8035.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/ed752c8035.css" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"></script>
  
</head>
<body style = "font-family: 'Kanit', sans-serif;">
  
 <?php include 'navbar.php';?>
        <section class="bg-dark nav-fake"></section>

        <section class="catg_rent bg-white p-5">
            <div class="catg-title">
                <h2><i class="fa-sharp fa-solid fa-star me-2 text-warning"></i>ระบบการจอง</h2>
        
                <small>รูปแบบต่าง ๆ สามารถเปลี่ยนแปลงได้ตลอดเวลา</small>
            </div>
            
      
        </section>

        <section class="rent-menu bg-light p-3">
            <div class="container menu-rent">
                <a href="rent_menu.php?catg_id=<?php echo $row_show['catg_id'];?>"class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-hand-pointer menu-icon"></i>เลือกบริการ</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="bg-warning  shadow-sm text-white pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-list menu-icon"></i> รายละเอียด</span></a>
                <a href="rent_confirm.php?de_id=<?php echo $row_show['de_id'];?>" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-square-check" menu-icon></i> ยืนยันการจอง</span></a>
                <a href="my_payment.php" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-clock-rotate-left menu-icon"></i> การชำระเงิน</span></a>
                <a href="my_room.php" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-person-shelter menu-icon"></i> ห้องของฉัน</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3 menu-icon"><i class="fa-solid fa-star"></i>  รีวิวห้องพัก</span></a>
              
            </div>
            
        </section>
        <section class="rent_detail bg-light">
            <div class="container bg-white p-4 rounded-3 shadow-sm">
                    <div class="row p-4">
                        <div class="col-md-6 p-3 rounded-3"><img src="img/<?php echo $row_show['de_img'];?>" width="100%" alt=""></div>
                        <div class="col-md-6">
                            <div class="detail-title mb-2">
                                <span class="h1">ห้องพักเตียงเดี่ยว</span>
                            </div>
                            <div class="detail">
                                
                                <h5 class="text-secondary">
                                <p>สถานะ : <?php echo $row_show['r_status'];?></p>    
                                <p>จองเมื่อวันที่ : <?php echo $row_show['r_date'];?></p>    
                                <p>เช็คอินวันที่ : <?php echo $row_show['r_checkin'];?></p>    
                                <p>เช็คเอาท์วันที่ : <?php echo $row_show['r_checkout'];?></p>    
                                </h5>
                                <hr>
                                <ul>
                                    <h3>คุณสมบัติ</h3>
                                    <li>WIFI ฟรี</li>
                                    <li>มีเครื่องปรับอากาศ</li>
                                    <li>อาหารเช้า</li>
                                    <li>เครื่องทำน้ำอุ่น</li>
                                </ul>
                                <a href="my_room.php" class="btn btn-warning p-2 col-md-12 shadow"><h3>กลับ</h3></a>
                            </div>
                            
                        </div>
                       
                    </div>
            </div>
        </section>

       
   




    <?php include 'footer.php';?>
   
</body>
<?php include 'script.php';?>
<?php include 'check_reser.php';?>
</html>