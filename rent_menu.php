<?php include 'connect.php';
session_start();
error_reporting(0);
if(!$_SESSION['u_id']){
    echo "<script type='text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
    echo "window.location='login.php';";
    echo "</script>;";
  }
  

$search = isset($_POST['search']) ?  $_POST['search']:'';

$room_show = "SELECT tb_detail.*,category.* From tb_detail INNER JOIN 
    category on tb_detail.catg_id = category.catg_id 
    where tb_detail.de_room like '%$search%' AND tb_detail.catg_id = '".$_GET['catg_id']."' AND tb_detail.de_show = 'enable' order by de_room";
$room_show_query = mysqli_query($connect,$room_show);
$room_count = mysqli_num_rows($room_show_query);

$user = "SELECT * From tb_user where u_id = '".$_SESSION['u_id']."'";
$user_query = mysqli_query($connect,$user) or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($user_query);

$count_unpay = "SELECT r_status From tb_reser where u_id = '".$_SESSION['u_id']."' AND r_status = 'รอการชำระเงิน'";
$count_query = mysqli_query($connect,$count_unpay);
$count = mysqli_num_rows($count_query); 
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
                <a href="" class="text-decoration-none menu-item"><span class="bg-warning  shadow-sm text-white pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-hand-pointer menu-icon"></i> เลือกบริการ</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-list menu-icon"></i> รายละเอียด</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-square-check menu-icon"></i> ยืนยันการจอง</span></a>
                <a href="my_payment.php" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-clock-rotate-left menu-icon"></i> การชำระเงิน</span></a>
                <a href="my_room.php" class="text-decoration-none menu-item b-badege"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-person-shelter menu-icon"></i> ห้องของฉัน
                <?php if($count > 0){ ?>
                    <span class="badge bg-danger rounded-circle shadow-sm"><?php echo $count;?></span>
              <?php  } ?>
            </span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-star menu-icon"></i>  รีวิวห้องพัก</span></a>
               
            </div>
            <div class="search container mt-3">
                  <i class="ms-2 fa fa-search"></i>
                 <form method="POST">
                    <input type="text" class="form-control" name="search" placeholder="ค้นหาห้องพัก">
                    <button class="btn btn-warning">ค้นหา</button>
                 </form>
                 </div>
        </section>
        <section class="rent_show">
            <div class="container">
                    <div class="wrapper-card">
                   
                                <?php while ($row_show = mysqli_fetch_assoc($room_show_query)) { ?>
                                    <div class="card shadow-sm border-0 float-center" >
                                    <img src="img/<?php echo $row_show['de_img'];?>" width="100%" class="card-img-top" alt="...">
                                    <div class="card-body shadow-sm" style="height:195px">
                                    <div class="card-fly shadow  p-3">
                                        
                                        <span class="card-title h5"><?php echo $row_show['catg_name'];?></span><span class="bg-warning float-end fw-bold text-dark p-2 rounded-3 col-md-5 price-fly"><?php echo $row_show['de_price'];?>.-/ คืน</span>
                                                <br><small class=" text-secondary"><?php echo $row_show['de_short_des'];?></small>
                                            <div class="row mt-2">
                                                <div class="col-md-6"><i class="fa-sharp fa-solid fa-door-closed"></i><span class="fw-bold ms-2">ห้อง <?php echo $row_show['de_room'];?></span></div>
                                                <div class="col-md-6 mb-2">
                                                <i class="fa-sharp fa-solid fa-stairs"></i><span class="fw-bold ms-2">ชั้น <?php echo $row_show['de_floor'];?></span>
                                                </div>
                                                <div class="col-md-6"><i class="fa-sharp fa-solid fa-bed"></i><span class="ms-2 fw-bold">เตียงเดี่ยว</span></div>
                                                <div class="col-md-6">
                                                <i class="fa-solid fa-ban-smoking"></i><span class="fw-bold ms-2">งดสูบบุหรี่</span>
                                                </div>
                                            </div>
                                            <a class="text-decoration-none" href="rent_detail.php?de_id=<?php echo $row_show['de_id'];?>">
                                            <hr class="text-dark">
                                                <div class="row mt-2 rent-link  ">
                                            
                                                    <div class="col-md-8"><span>ดูรายละเอียดเพิ่มเติม</span></div>
                                                    <div class="col-md-4"><i class="fa-sharp fa-solid fa-arrow-right"></i></div>
                                                </div>
                                            </a>
                                        
                                    </div>
                                    </div>
                                </div>
                              <?php  } ?>
                  
                        
          
                        </div>
                    </div>
                        <?php if($room_count == null){ ?>
                            <div class="container text-secondary text-center p-4 mb-1">
                            <h1>ไม่พบรายการห้องพักที่ท่านต้องการ</h1>
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                            </div>
                       <?php } ?>               
        </section>
   




    <?php include 'footer.php';?>
  
</body>
<?php include 'script.php';?>
</html>