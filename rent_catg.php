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

$user = "SELECT * From tb_user where u_id = '".$_SESSION['u_id']."'";
$user_query = mysqli_query($connect,$user) or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($user_query);

$rent_cate = "SELECT category.*,tb_detail.* From category INNER JOIN tb_detail on category.catg_id = tb_detail.catg_id WHERE catg_show = 'enable' AND catg_name like '%$search%'";
$rent_category = mysqli_query($connect,$rent_cate);

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
                <h2><i class="fa-sharp fa-solid fa-star me-2 text-warning"></i>บริการของเรา</h2>
        
                <small>รูปแบบต่าง ๆ สามารถเปลี่ยนแปลงได้ตลอดเวลา</small>
            </div>
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
            <div class="container mt-5 align-items-center d-flex justify-content-center">
                <div class="rent-wrapper">
                    <?php while ($row_catg = mysqli_fetch_assoc($rent_category)) { ?>
                        <div class="rentcatg-main ">
                        <a href="rent_detail.php?catg_id=<?php echo $row_catg['catg_id'];?>">
                        <div class="rent-item">
                            <div class="overlay"> 
                                <div class="over-dark"></div>
                                <img src="img/<?php echo $row_catg['catg_img'];?>" width="100%" class="shadow" alt="" />
                            </div>
                            <div class="catg-item">
                                <p class="title"><?php echo $row_catg['catg_name'];?><br> <span class="h3">ว่าง <?php echo $row_catg['de_count'];?> ห้อง</span></p>
                            </div>
                        </div>
                        </a>
                    </div>
                  <?php  } ?>
                </div>
            </div>
            <br><br><br><br><br>
      
        </section>
   




    <?php include 'footer.php';?>
  
</body>
<?php include 'script.php';?>
</html>