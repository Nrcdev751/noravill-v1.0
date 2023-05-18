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
                <h2><i class="fa-sharp fa-solid fa-star me-2 text-warning"></i>รีวิวห้องพัก</h2>
                
        
                <small></small>
            </div>
            
      
        </section>

        <section class="rent-menu bg-light p-3">
            <div class="container menu-rent">
                <a href="rent_catg.php" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-hand-pointer menu-icon"></i> เลือกบริการ</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-list menu-icon"></i> รายละเอียด</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-square-check menu-icon"></i> ยืนยันการจอง</span></a>
                <a href="my_payment.php" class="text-decoration-none menu-item "><span class="rent-btn shadow-sm  pe-4 ps-4 h4 rounded-3 "><i class="fa-sharp fa-solid fa-clock-rotate-left menu-icon"></i> การชำระเงิน</span></a>
                <a href="my_room.php" class="text-decoration-none menu-item b-badege"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-person-shelter menu-icon"></i> ห้องของฉัน
                <?php if($count > 0){ ?>
                    <span class="badge bg-danger rounded-circle shadow-sm"><?php echo $count;?></span>
              <?php  } ?></span></a>
                <a href="" class="text-decoration-none menu-item"><span class="bg-warning  shadow-sm text-white pe-4 ps-4 h4 rounded-3 "><i class="fa-solid fa-star"></i>  รีวิวห้องพัก</span></a>
             
            </div>
        </section>
        <section class="rent_show">
          <div class="container">
         
                <div class="row">
               <div class="col-md-6 mt-3">
                    <h3 class="text-warning">แต้มรีวิว <?php echo $row_u['u_review'];?> แต้ม</h3>
               </div>
               <div class="col-md-6"></div>
               </div>
               <hr>
               
               <form >
                <textarea name="" required id="" cols="30" placeholder="กรุณากรอกข้อความการรีวิวของท่าน" rows="5" class="form-control mb-3"></textarea>
                <p>คะแนนรีวิว</p>
                <div class="form-check form-check-inline ">
                    <input class="form-check-input" required type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">1 คะแนน</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">2 คะแนน</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">3 คะแนน</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">4 คะแนน</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label" for="inlineRadio2">5 คะแนน</label>
                    </div>
                    <br>
                    <button class="btn btn-warning p-2 mt-2">ส่งคะแนนรีวิว</button>
               </form>
                <br><br>
            </div>    

        </section>
   




    <?php include 'footer.php';?>
  
</body>
<?php include 'script.php';?>
</html>