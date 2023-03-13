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


$count_unpay = "SELECT r_status From tb_reser where u_id = '".$_SESSION['u_id']."' AND r_status = 'รอการชำระเงิน'";
$count_query = mysqli_query($connect,$count_unpay);
$count = mysqli_num_rows($count_query); 

$rent_show = "SELECT tb_reser.*,tb_detail.* From tb_reser INNER JOIN tb_detail on tb_reser.de_id = tb_detail.de_id where tb_reser.r_id = '".$_GET['r_id']."'";
$rent_show_query = mysqli_query($connect,$rent_show) or die(mysqli_error($connect));
$row_rent = mysqli_fetch_assoc($rent_show_query);



$other_room = "SELECT * From tb_detail order by rand() limit 4";
$other_query = mysqli_query($connect,$other_room);

$page = 'rent';


$price = $row_rent['de_price']*$row_rent['r_day'];

if($row_rent['r_status']=='ชำระเงินแล้ว'){
    echo "<script type='text/javascript'>";
    echo "alert('บัญชีนี้ได้ทำการชำระเงินเรียบร้อยแล้ว');";
    echo "window.history.back();";
    echo "</script>;";
  }
  


?>
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
<body  style = "font-family: 'Kanit', sans-serif;">
  
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
                <a href="rent_catg.php"class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3 menu-icon"><i class="fa-solid fa-hand-pointer"></i>เลือกบริการ</span></a>
                <a href="rent_detail.php?de_id=<?php echo $row_rent['de_id'];?>" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3 menu-icon"><i class="fa-sharp fa-solid fa-list"></i> รายละเอียด</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="bg-warning  shadow-sm text-white pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-square-check menu-icon"></i> ยืนยันการจอง</span></a>
                <a href="my_payment.php" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-clock-rotate-left menu-icon"></i> การชำระเงิน</span></a>
                <a href="my_room.php" class="text-decoration-none menu-item b-badege"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-person-shelter menu-icon"></i> ห้องของฉัน
                <?php if($count > 0){ ?>
                    <span class="badge bg-danger rounded-circle shadow-sm menu-icon"><?php echo $count;?></span>
              <?php  } ?></span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-star menu-icon"></i>  รีวิวห้องพัก</span></a>  
            </div>
            
        </section>

        <section class="buying p-4">
           <div class="container shadow rounded-3 p-4">
               <div class="row">
               <div class="col-md-4">
                    <div class="container">
                        <img src="img/<?php echo $row_rent['de_img'];?>" class="rounded-3 shadow float-center d-flex" width="80%" height="180" alt="">
                        <div class="container shadow-sm p-3 rounded-3">
                       
                                <h4 class="mb-3 ms-3 fw-bold">ข้อมูลประกอบการชำระค่าจอง</h4>
                                <div class="pay-item m-2">
                                    <span class=" h5">ประเภทของห้อง : </span><span class="float-end text-secondary"><?php echo $row_rent['de_name'];?></span>
                                </div>
                                <div class="pay-item m-2">
                                    <span class=" h5">หมายเลขห้อง : </span><span class="float-end text-secondary"><?php echo $row_rent['r_room'];?></span>
                                </div>
                                <div class="pay-item m-2">
                                    <span class=" h5">เช็คอินวันที่ : </span><span class="float-end text-secondary"><?php echo $row_rent['r_checkin'];?></span>
                                </div>
                                <div class="pay-item m-2">
                                    <span class=" h5">เช็คเอาท์วันที่ : </span><span class="float-end text-secondary"><?php echo $row_rent['r_checkout'];?></span>
                                </div>
                                <div class="pay-item m-2">
                                    <span class=" h5">จำนวนวันที่พัก : </span><span class="float-end text-secondary"><?php echo $row_rent['r_day'];?> วัน</span>
                                </div>
                                <hr>
                      
                            <div class="pay-item m-2">
                                <span class=" h5">ชำระเงินในชื่อ : </span><span class="float-end text-secondary"><?php echo $row_u['title'];?><?php echo $row_u['name'];?> <?php echo $row_u['l_name'];?></span>
                            </div>
                            <div class="pay-item m-2">
                                <span class=" h5">เบอร์โทรศัพท์ : </span><span class="float-end text-secondary"><?php echo $row_u['tel'];?></span>
                            </div>
                            <div class="pay-item m-2">
                                <span class=" h5">ไลน์ไอดี : </span><span class="float-end text-secondary"><?php echo $row_u['line_id'];?></span>
                            </div>
                            <hr>
                            <div class="pay-item m-2">
                                <span class=" h5">ส่วนลด : </span><span class="float-end text-secondary">ไม่มีส่วนลด</span>
                            </div>
                            <hr>
                            <div class="pay-item m-2 row">
                                <div class="col-md-6">
                                <h4><i class="fa-sharp fa-solid fa-cash-register" ></i></h4>
                                </div>
                                <div class="col-md-6">
                                    <span class=" h3 fw-bold text-warning"><?php echo number_format($price);?> ฿</span> <span class=" text-secondary mt-3">/บาท</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="text-center fw-bold">ช่องทางการชำระเงิน</h2>
                    <div class="buy-title p-4">
                        <img src="img/<?php echo $row_w['h_logo'];?>" width="180" alt="">
                        <span class="float-end pt-4 text-secondary"><?php echo date("H:i");?> น.</span>
                    </div>
                    <div class="row mt-3 mb-3">
                        <button class="btn col-md-6 btn-light shadow-sm" id="btn_bank">
                           <h3 class="text-secondary ms-4 "> ชำระผ่าน Internet Banking</h3>
                        </button>
                        <button class="btn col-md-6 btn-light shadow-sm" id="btn_qr">
                           <h3 class="text-secondary ms-4 "> ชำระผ่านการแสกน QR Code</h3>
                        </button>
                     
                    </div>
                    <div class="container ms-4 mb-3  bg-white  shadow-sm" id="bank">
                        <div class="row">
                        <div class="col-md-2">
                            <img src="img/scb.jpg" class="me-4" width="80" alt="">
                        </div>
                          <div class="col-md-10">
                          <span class="h3"> 658-256-8342 </span><span class="float-end me-4 text-secondary"><i class="fa-sharp fa-solid fa-magnifying-glass-plus magnify" onclick="document.getElementById('zoom').style.fontSize='1.75em'"></i></span>
                         <span class="float-end me-4 text-secondary"><i class="fa-sharp fa-solid fa-magnifying-glass-minus magnify" onclick="document.getElementById('zoom').style.fontSize='1em'"></i></span>
                            <p class="text-secondary zoom" id="zoom"> ชื่อบัญชีนายณรงค์ชัย สุราษฎารมย์ | ธนาคารไทยพาณิชย์</p>
                          </div>
                        </div>
                    </div>
                    <div class="container " id="qr" >
                        <h3 class="text-secondary text-center">แสกน QR code</h3>
                            <center><img src="img/qr.jpg"  class="" width="220" alt=""></center>
                   </div>
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="ps-4 fw-bold">หลักฐานการชำระเงิน</h3>
                       <p class="ps-4 text-secondary">กรุณาแนปสลิปเพื่อยืนยันการชำระเงินของท่าน</p>
                        <h3 class="ps-4 fw-bold">เลือกช่างทางที่ท่านได้ทำการชำระ</h3>
                       <p class="ps-4 text-secondary">กรุณาเลือกช่องทางการชำระเงินที่ท่านได้โอนเงินไป</p>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" enctype="multipart/form-data">
                            <input required type="file" name="file_img" class="form-control mb-5 mt-2">
                            <input  type="hidden" name="u_id" value="<?php echo $row_u['u_id'];?>" class="form-control mb-5 mt-2">
                            <input  type="hidden" name="de_id" value="<?php echo $row_rent['de_id'];?>" class="form-control mb-5 mt-2">
                            <div class="form-check-inline">
                                <input type="radio" required name="bill_chanel" value="Internet Banking" class="form-check-input">
                                <label for="" class="form-check-label h5 ms-2">Internet Banking</label>
                                <input type="radio" name="bill_chanel" value="QR Code" class="form-check-input">
                                <label for=""  class="form-check-label h5 ms-2">QR Code</label>
                            </div>
                       
                    </div>
                    <hr>
                        
                        <button name="btn_pay" class=" btn btn-warning  col-md-12 shadow-sm"><h3>ชำระเงิน</h3></button>
                        </form>
                </div>
                </div>
                
               </div>
           </div>
        </section>
   




    <?php include 'footer.php';?>
  <script>
        var btn_bank = document.getElementById("btn_bank");
        var btn_qr = document.getElementById("btn_qr");
        var bank = document.getElementById("bank");
        var qr = document.getElementById("qr");
        qr.style.display='none';
        btn_bank.addEventListener('click',()=>{
            bank.style.display='block';
            qr.style.display='none';
        });
        btn_qr.addEventListener('click',()=>{
            bank.style.display='none';
            qr.style.display='block';
        });
  </script>
  <?php include 'script.php';?>
  <?php include 'check_payment.php';?>
</body>


</html>