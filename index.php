<?php include 'connect.php';
error_reporting(0);
session_start();
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
    <script src="https://kit.fontawesome.com/ed752c8035.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/ed752c8035.css" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
  
</head>

<body style = "font-family: 'Kanit', sans-serif;">
 <?php include 'navbar_i.php';?>
    
    <?php include 'home.php';?>
    <?php include 'information.php';?>
    <?php include 'services.php';?>
    <?php include 'rent_room.php';?>
    <?php include 'recommend.php';?>
    <?php include 'contact_us.php';?>
 


    <?php include 'footer.php';?>
  
<?php include 'script.php';?>
</body>
</html>