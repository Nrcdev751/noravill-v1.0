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

$room_show = "SELECT tb_detail.*,category.* From tb_detail INNER JOIN 
    category on tb_detail.catg_id = category.catg_id where tb_detail.catg_id = '".$_GET['catg_id']."'";
$room_show_query = mysqli_query($connect,$room_show);
$row_show = mysqli_fetch_assoc($room_show_query);

$count_unpay = "SELECT r_status From tb_reser where u_id = '".$_SESSION['u_id']."' AND r_status = 'รอการชำระเงิน'";
$count_query = mysqli_query($connect,$count_unpay);
$count = mysqli_num_rows($count_query); 

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
                <a href="rent_catg.php"class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-hand-pointer menu-icon"></i>เลือกบริการ</span></a>
                <a href="" class="text-decoration-none menu-item"><span class="bg-warning  shadow-sm text-white pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-list menu-icon"></i> รายละเอียด</span></a>
                <a href="rent_confirm.php?de_id=<?php echo $row_show['de_id'];?>" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-square-check menu-icon"></i> ยืนยันการจอง</span></a>
                <a href="my_payment.php" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-clock-rotate-left menu-icon"></i> ประวัติการชำระเงิน</span></a>
                <a href="my_room.php" class="text-decoration-none menu-item b-badege"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-sharp fa-solid fa-person-shelter menu-icon"></i> ห้องของฉัน
                <?php if($count > 0){ ?>
                    <span class="badge bg-danger rounded-circle shadow-sm"><?php echo $count;?></span>
              <?php  } ?></span></a>
                <a href="" class="text-decoration-none menu-item"><span class="rent-btn shadow-sm pe-4 ps-4 h4 rounded-3"><i class="fa-solid fa-star"></i>  รีวิวห้องพัก</span></a>
              
            </div>
            
        </section>
        <section class="rent_detail bg-light">
            <div class="container bg-white p-4 rounded-3 shadow-sm">
                    <div class="row p-4">
                        <div class="col-md-6 p-3 rounded-3"><img src="img/<?php echo $row_show['de_img'];?>" width="100%" alt=""></div>
                        <div class="col-md-6">
                            <div class="detail-title mb-5">
                                <span class="h1"><?php echo $row_show['catg_name'];?></span> <span class="text-secondary float-end">/ต่อคืน</span><span class="h1 float-end fw-bold text-warning">฿ <?php echo $row_show['de_price'];?>.-</span>
                                <br><img src="img/star5.svg" width="120" alt="">
                            </div>
                            <div class="detail" id="detail">
                                <div class="icon_detail d-flex justify-content-evenly h3 mb-4">
                                    <?php if($row_show['de_count']==0){ ?>
                                           <i class="fa-sharp fa-solid fa-rectangle-xmark text-danger"></i><span class=" fw-bold  text-danger">ขออภัยไม่มีห้องว่างในขณะนี้</span>
                                  <?php  }else{ ?>
                                        <i class="fa-sharp fa-solid fa-street-view"></i><span class=" fw-bold">จำนวน <?php echo $row_show['de_count'];?> ห้อง</span>
                                   <?php } ?>
                                    <i class="fa-sharp fa-solid fa-bed"></i><span class=" fw-bold"><?php echo $row_show['catg_name'];?></span>
                                   
                                </div>
                                <h5 class="text-secondary"><?php echo $row_show['de_detail'];?></h5>
                                <hr>
                                <ul>
                                    <h3>สิ่งอำนวยความสะดวก</h3>
                                    <li>WIFI ฟรี</li>
                                    <li>มีเครื่องปรับอากาศ</li>
                                    <li>อาหารเช้า</li>
                                    <li>เครื่องทำน้ำอุ่น</li>
                                </ul>
                                <?php if($row_show['de_count']==0){ ?>
                                    <button id="btn_confirm" disabled class="btn btn-warning p-2 col-md-12 shadow"><h3>ขณะนี้ห้องยังไม่พร้อมใช้งาน </h3></button>
                             <?php   }else{ ?>
                                    <button id="btn_confirm" class="btn btn-warning p-2 col-md-12 shadow"><h3><i class="fa-solid fa-check-double"></i>จองเลย </h3></button>
                                <?php } ?>
                            </div>
                            <div class="detail" id="confirm">
                                <h3>กำหนดวันที่ท่านต้องการจะจอง</h3>
                               <form method="POST" class="mt-3 mb-3">
                                   <div class="row">
                                        <input type="hidden" value="<?php echo $row_show['de_id'];?>" name="de_id">
                                        <div class="col-md-6">
                                            <input type="date" required name="r_checkin" class="form-control">
                                            <label for="">กรุณาเลือกวันที่เช็คอิน</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" required name="r_checkout" class="form-control">
                                            <label for="">กรุณาเลือกวันที่เช็คเอาท์</label>
                                        </div>
                                   </div>
                                   <hr>
                                   <button id="btn_detail" class="btn btn-light p-2 col-md-3 shadow"><h5><i class="fa-sharp fa-solid fa-rotate-left"></i> กลับ</h5></button>
                                   
                                   <?php if($row_u['tel']==null && $row_u['line_id']==null){ ?>
                                    <a href="profile.php" class="btn btn-warning p-2 col-md-8 shadow"><h5><i class="fa-sharp fa-solid fa-circle-check"></i> กรุณากรอกข้อมูลของท่านให้ครบถ้วน</h5></a>
                                  <?php }else{ ?>
                                    <button name="btn_submit" class="btn btn-warning p-2 col-md-8 shadow"><h5><i class="fa-sharp fa-solid fa-circle-check"></i> ยืนยันการจอง</h5></button>
                                 <?php  } ?>
                               </form>
                           
                                
                            </div>
                        </div>
                       
                    </div>
            </div>
        </section>

        
   




    <?php include 'footer.php';?>
    <script>
        var btn_bank = document.getElementById("btn_detail");
        var btn_qr = document.getElementById("btn_confirm");
        var bank = document.getElementById("detail");
        var qr = document.getElementById("confirm");
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
</body>
<?php include 'script.php';?>
<?php include 'check_reser.php';?>
</html>