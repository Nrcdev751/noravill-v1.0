<?php include 'connect.php';
error_reporting(0);
session_start();
if(!$_SESSION['u_id']){
  echo "<script type='text/javascript'>";
  echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
  echo "window.location='login.php';";
  echo "</script>;";
}

error_reporting(0);



$user = "SELECT * From tb_user where u_id = '".$_SESSION['u_id']."'";
$user_query = mysqli_query($connect,$user) or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($user_query);

$page = 'index';?>
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
   

    <?php include 'home.php';?>
    <?php include 'information.php';?>
    <?php include 'services.php';?>
    <?php include 'rent_room.php';?>
    <?php include 'recommend.php';?>
    <?php include 'contact_us.php';?>



    <?php include 'footer.php';?>
  
</body>
<?php include 'script.php';?>
</html>