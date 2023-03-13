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

$pay_show = "SELECT tb_bill.*,tb_detail.*,tb_reser.* From tb_bill  JOIN tb_detail
            on tb_bill.de_id = tb_detail.de_id  JOIN tb_reser on tb_bill.r_id = tb_reser.r_id
            where  bill_id = '".$_GET['bill_id']."' order by bill_date desc";
$pay_show_query = mysqli_query($connect,$pay_show);
$row_pay = mysqli_fetch_assoc($pay_show_query);
$pay_count = mysqli_num_rows($pay_show_query);

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
  
<section class="rent_show">
          <div class="container">
               
                <div class="print p-2">
                    <img src="img/<?php echo $row_w['h_logo'];?>" width="240" alt="">
                    <span class="float-end h2 mt-4">ใบแจ้งชำระเงิน</span>
                    
                    <hr>
                </div>
                <div class="print p-2">
                   <span><span class="fw-bold">วันที่</span> : <?php echo $row_pay['bill_date'];?></span>
                   <span class="float-end"><span class="fw-bold">เลขที่</span> : <?php echo substr($row_pay['bill_date'],0,4);?><?php echo substr($row_pay['bill_date'],5,2);?><?php echo $row_pay['bill_id'];?></span>
                   <hr>
                </div>
                <div class="print p-2">
                   <span><span class="fw-bold">ผู้จอง</span> : คุณ<?php echo $row_u['name'];?></span>
                   <span class="float-end"><span class="fw-bold">ช่องทางการชำระเงิน</span> : <?php echo $row_pay['bill_chanel'];?></span>
                   <hr>
                </div>
                <div class="container">
                    <div class="row">
                    <div class="col-md-8">
                                <div class="container shadow-sm p-3 rounded-3">
                                         
                                        <h4 class="mb-3 ms-3 fw-bold">ข้อมูลประกอบรายละเอียดการจอง</h4>
                                        <div class="pay-item m-2">
                                            <span class=" h5">ประเภทของห้อง : </span><span class="float-end text-secondary"><?php echo $row_pay['de_name'];?></span>
                                        </div>
                                        <div class="pay-item m-2">
                                            <span class=" h5">หมายเลขห้อง : </span><span class="float-end text-secondary"><?php echo $row_pay['r_room'];?></span>
                                        </div>
                                        <div class="pay-item m-2">
                                            <span class=" h5">จำนวนวัน : </span><span class="float-end text-secondary"><?php echo $row_pay['r_day'];?> วัน</span>
                                        </div>
                                    <hr>
                            
                                    <div class="pay-item m-2">
                                        <span class=" h5">วันที่เช็คอิน : </span><span class="float-end text-secondary"><?php echo $row_pay['r_checkin'];?></span>
                                    </div>
                                    <div class="pay-item m-2">
                                        <span class=" h5">วันที่เช็คเอาท์ : </span><span class="float-end text-secondary"><?php echo $row_pay['r_checkout'];?></span>
                                    </div>
                                    <div class="pay-item m-2">
                                        <span class=" h5">จองเมื่อ : </span><span class="float-end text-secondary"><?php echo $row_pay['r_date'];?></span>
                                    </div>
                                
                               
                                <hr>
                                
                            </div>
                    </div>
                        <div class="col-md-4">
                                    <div class="container shadow-sm p-3 rounded-3">
                                            
                                            <h4 class="mb-3 ms-3 fw-bold">ข้อมูลประกอบการชำระค่าจอง</h4>
                                            <div class="pay-item m-2">
                                                <span class=" h5">ช่องทางการชำระเงิน : </span><span class="float-end text-secondary"><?php echo $row_pay['bill_chanel'];?></span>
                                            </div>
                                            <div class="pay-item m-2">
                                                <span class=" h5">ชำระเมื่อ : </span><span class="float-end text-secondary"><?php echo $row_pay['bill_date'];?></span>
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
                                        <div class="pay-item m-2">
                                            <span class=" h5">จำนวนเงิน : </span> <span class=" h5 fw-bold float-end"><?php echo number_format($row_pay['bill_price']);?> บาท</span>
                                        </div>
                                        <?php if($row_pay['bill_status']=='ชำระเงินแล้ว'){ ?>
                                                <div class="sign">
                                                <div class="pay-item m-2 d-flex justify-content-end">
                                                    <span class=" h5 fw-bold ps-3"><img src="img/sign.png" width="120" alt=""></span> 
                                                </div>
                                                <small class="mt-1 d-flex justify-content-end">(เจ้าหน้าที่ดูแลระบบ)</small>
                                            </div>
                                      <?php  } ?>
                               
                                   
                                </div>
                        </div>
                </div>
               
            </div>            
        </section>
   





  
</body>
<script>
        window.print();
        onafterprint = function() {
            window.history.back();
        }
    </script>
<?php include 'script.php';?>
</html>