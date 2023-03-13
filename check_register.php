<?php 
       if(isset($_POST['btn_submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password1'];
        $password2 = $_POST['password2'];
        $u_date = date("Y-m-d H:i");
      
        
        $check = "SELECT * From tb_user where email = '$email'";
        $result = mysqli_query($connect,$check) or die(mysqli_error($connect));
        $num = mysqli_num_rows($result);
        if($num > 0){
            echo 
            "<script type ='text/javascript'>;
            swal('ผิดพลาด', 'email นี้เคยถูกใช้ไปแล้วกรุณาลองใหม่อีกครั้ง', 'error');
            </script>";
        }else{
            if($password == $password2){
                $sql = "INSERT INTO tb_user (username,email,password,u_date,level)
                values ('$username','$email','$password','$u_date','user')";
                $user = mysqli_query($connect,$sql) or die(mysqli_error($connect));
                echo 
                "<script type ='text/javascript'>;
                    swal('สำเร็จ', 'สมัครสมาชิกเสร็จสิ้น', 'success');;
                    setTimeout(function(){
                    window.location='login.php';
                    },1500);
                    </script>;
                ";
            
            }else{
                echo 
                "<script type ='text/javascript'>;
                 swal('ผิดพลาด', 'รหัสผ่านที่กรอกไม่ตรงกันกรุณาลองใหม่อีกครั้ง', 'error');
                 </script>";
            }
          
        }
       }

    ?>