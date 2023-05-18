<?php include 'connect.php';
session_start();

if(!$_SESSION['u_id']){
    echo "<script type='text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
    echo "window.location='login.php';";
    echo "</script>;";
  }
  

$search = isset($_POST['search']) ?  $_POST['search']:'';

$pay_show = "SELECT tb_bill.*,tb_reser.* From tb_bill
        INNER JOIN tb_reser on tb_reser.r_id = tb_bill.r_id
        where tb_bill.u_id = '".$_SESSION['u_id']."' order by bill_date desc";
$pay_show_query = mysqli_query($connect,$pay_show) or die(mysqli_error($connect));
$pay_count = mysqli_num_rows($pay_show_query);

$user = "SELECT * From tb_user where u_id = '".$_SESSION['u_id']."'";
$user_query = mysqli_query($connect,$user) or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($user_query);


$count_unpay = "SELECT r_status From tb_reser where u_id = '".$_SESSION['u_id']."' AND r_status = 'รอการชำระเงิน'";
$count_query = mysqli_query($connect,$count_unpay);
$count = mysqli_num_rows($count_query); 

$number = 1;

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
                <h2><i class="fa-sharp fa-solid fa-star me-2 text-warning"></i>สินค้าของเรา</h2>
            </div>
            
      
        </section>


        <section class="rent_show">
          <div class="container">
            <div class="row">
             
                <div class="col-md-3">
                   <div class="pro-item shadow m-3  pt-3 pb-3">
                    <center><img src="img/product_1.png" class="justify-content-center "  alt=""></center>
                    <small class="text-secondary ps-4">รายละเอียด</small>
                   <div class="d-flex justify-content-between ps-4 pe-4">
                        <div class="pro-name">
                            <span>ชานมสตรอเบอร์รี่</span>
                        </div>
                        <div class="pro-price ">
                        <span class="text-warning fw-bold">12 บาท</span>
                        </div>
                   </div>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="pro-item shadow m-3  pt-3 pb-3">
                    <center><img src="img/product_1.png" class="justify-content-center "  alt=""></center>
                    <small class="text-secondary ps-4">รายละเอียด</small>
                   <div class="d-flex justify-content-between ps-4 pe-4">
                        <div class="pro-name">
                            <span>ชานมสตรอเบอร์รี่</span>
                        </div>
                        <div class="pro-price ">
                        <span class="text-warning fw-bold">12 บาท</span>
                        </div>
                   </div>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="pro-item shadow m-3  pt-3 pb-3">
                    <center><img src="img/product_1.png" class="justify-content-center "  alt=""></center>
                    <small class="text-secondary ps-4">รายละเอียด</small>
                   <div class="d-flex justify-content-between ps-4 pe-4">
                        <div class="pro-name">
                            <span>ชานมสตรอเบอร์รี่</span>
                        </div>
                        <div class="pro-price ">
                        <span class="text-warning fw-bold">12 บาท</span>
                        </div>
                   </div>
                   </div>
                </div>
                <div class="col-md-3">
                   <div class="pro-item shadow m-3  pt-3 pb-3">
                    <center><img src="img/product_1.png" class="justify-content-center "  alt=""></center>
                    <small class="text-secondary ps-4">รายละเอียด</small>
                   <div class="d-flex justify-content-between ps-4 pe-4">
                        <div class="pro-name">
                            <span>ชานมสตรอเบอร์รี่</span>
                        </div>
                        <div class="pro-price ">
                        <span class="text-warning fw-bold">12 บาท</span>
                        </div>
                   </div>
                   </div>
                </div>
            </div>
          </div>    

        </section>
   




    <?php include 'footer.php';?>
  
</body>
<?php include 'script.php';?>
</html>