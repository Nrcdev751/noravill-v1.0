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

$pay_show = "SELECT  * From tb_reser 
            where  u_id = '".$_SESSION['u_id']."' order by r_date desc";
$pay_show_query = mysqli_query($connect,$pay_show);
$pay_count = mysqli_num_rows($pay_show_query);

$count_unpay = "SELECT r_status From tb_reser where u_id = '".$_SESSION['u_id']."' AND r_status = 'รอการชำระเงิน'";
$count_query = mysqli_query($connect,$count_unpay);
$count = mysqli_num_rows($count_query); 

$user = "SELECT * From tb_user where u_id = '".$_SESSION['u_id']."'";
$user_query = mysqli_query($connect,$user) or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($user_query);

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
                <h2><i class="fa-sharp fa-solid fa-star me-2 text-warning"></i>ห้องของท่าน</h2>
        
                <small>ห้องที่ท่านได้จอง</small>
            </div>
            
      
        </section>

        <section class="rent-menu bg-light p-3">
            <div class="container menu-rent">
                <a href="rent_catg.php" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-hand-pointer menu-icon"></i> เลือกบริการ</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-list menu-icon"></i> รายละเอียด</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-square-check menu-icon"></i> ยืนยันการจอง</span></a>
                <a href="my_payment.php" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-clock-rotate-left menu-icon"></i> การชำระเงิน</span></a>
                <a href="my_room.php" class="text-decoration-none menu-item count b-badege"><span class="bg-warning  shadow-sm text-white pe-4 ps-4 h4 rounded-3">
                <?php if($count > 0){ ?>
                    <span class="badge bg-danger rounded-circle shadow-sm"><?php echo $count;?></span>
              <?php  } ?>    
                <i class="fa-sharp fa-solid fa-person-shelter menu-icon"></i> ห้องของฉัน 
             
                
               </span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-star menu-icon"></i>  รีวิวห้องพัก</span></a>
               
            </div>
                <div class="search container mt-3">
                  <i class="ms-2 fa fa-search"></i>
                 <form method="POST">
                    <input type="text" class="form-control" name="search" placeholder="ค้นหารายการที่ท่านชำระเงิน">
                    <button class="btn btn-warning">ค้นหา</button>
                 </form>
                 </div>
        </section>
        <section class="rent_show">
          <div class="container">
            <table class="table table-hover bg-white text-center">
                <tr><h3>รายการที่ห้องพักท่านได้จองแล้ว</h3></tr><hr>
                <tr>
                    <td>ลำดับที่</td>
                    <td>ห้องที่</td>
                    <td>จองเมื่อ</td>
                    <td>เช็คอินวันที่</td>
                    <td>เช็คเอาท์วันที่</td>
                    <td>สถานะการจอง</td>
                    <td>ชำระค่าจอง</td>
                    <td>ดูรายละเอียด</td>
                </tr>
                <?php while ($row_re = mysqli_fetch_assoc($pay_show_query)) { ?>
                <tr>
                  
                     <td><?php echo $number;?></td>
                     <td><?php echo $row_re['r_room'];?></td>
                     <td><?php echo $row_re['r_date'];?></td>
                     <td><?php echo $row_re['r_checkin'];?></td>
                     <td><?php echo $row_re['r_checkout'];?></td>
                     <td><?php echo $row_re['r_status'];?></td>
              
                     <?php if($row_re['r_status']=='ชำระเงินแล้ว'){ ?>
                        <td><a class="btn btn-success text-white"><i class="fa-sharp fa-solid fa-square-check"></i></a></td>
                    <?php }else{ ?>
                        <td><a href="rent_confirm.php?r_id=<?php echo $row_re['r_id'];?>" class="btn btn-dark text-white"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a></td>
                <?php    } ?>
                     <td><a href="rent_myroom.php?r_id=<?php echo $row_re['r_id'];?>" class="btn btn-warning text-white">ชมรายละเอียด</a></td>
               
                </tr>
                <?php $number++;} ?>
            </table>
                <?php if($pay_count == null){ ?>
                                    <div class="container text-secondary text-center p-4 mb-1">
                                    <h1>ไม่พบรายการที่ท่านจอง</h1>
                                    <br><br><br><br><br>
                                    </div>
                <?php } ?>   
            </div>            
        </section>
   




    <?php include 'footer.php';?>
  
</body>
<?php include 'script.php';?>
</html>