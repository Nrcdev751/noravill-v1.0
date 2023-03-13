<?php include 'connect.php';
session_start();
error_reporting(0);

if(!$_SESSION['u_id']){
    echo "<script type = 'text/javascript'>";
    echo "alert('กรุณาเข้าสู่ระบบก่อนครับ');";
    echo "window.location='login.php';";
    echo "</script>";
}
$page = 'contact';

$user = "SELECT * From tb_user where u_id = '".$_SESSION['u_id']."'";
$user_query = mysqli_query($connect,$user) or die(mysqli_error($connect));
$row_u = mysqli_fetch_assoc($user_query);
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
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ed752c8035.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/ed752c8035.css" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js"></script>
  
</head>

<body style = "font-family: 'Kanit', sans-serif;">
 <?php include 'navbar.php';?>
    <section class="home">
        <div class="container ">
            <br><br><br><br><br><br><br><br><br><br>
            <h1 class="text-white  fw-bold text-center cor" style="<?php echo $hero_t;?>">เกี่ยวกับเรา</h1>
            <div class="cursor"></div>
            <br>
        </div>
    </section>
    <?php include 'contact_detail.php';?>
    <?php include 'footer.php';?>
    <script>
        const cursor = doucument.querySelector('.cursor');
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.pageX + 'px';
            cursor.style.top = e.pageY + 'px';
        })
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>
    <script src="nav.js"></script>
    <script src="js/script.js"></script>
</body>
</html>