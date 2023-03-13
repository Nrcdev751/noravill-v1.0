<?php include 'connect.php';
session_start();

    if(isset($_POST['btn_submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check = "SELECT * From tb_user where email = '$email' and password = '$password'";
        $result = mysqli_query($connect,$check) or die(mysqli_error($connect));
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $_SESSION['u_id'] = $row['u_id'];
            $_SESSION['level'] = $row['level'];
            echo 
            "<script type ='text/javascript'>;
            swal('สำเร็จ', 'เข้าสู่ระบบเสร็จสิ้น', 'success');;
            setTimeout(function(){
            window.location='user.php';
            },1500);
            </script>;
        ";
        }else{
            echo 
            "
            <script type ='text/javascript'>;
            swal('ผิดพลาด', 'ไม่สามารถเข้าสู่ระบบได้', 'error');
             </script>";
        }
    }
?>