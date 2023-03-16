<?php include 'connect.php';

    if(isset($_POST['btn_upload'])){
        $filetmp = $_FILES['file_img']['tmp_name'];
        $filename = $_FILES['file_img']['name'];
        $filetype = $_FILES['file_img']['type'];
        $filepath = "img/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $b_name = $_POST['b_name'];
        $b_des = $_POST['b_des'];
        $b_date = date("Y-m-d H:i");
        
        $check = "SELECT b_name From banner where b_name = '$b_name'";
        $result = mysqli_query($connect,$check) or die(mysqli_error($connect));
        $num =  mysqli_num_rows($result);
        if($num > 0){
            echo "<script type = 'text/javascript'>;";
            echo "alert('ไม่สามารถสมัครสมาชิกได้เนื่องจาก ชื่อพันธมิตร นี้เคยถูกใช้ไปแล้ว');";
            echo "window.history.back();";
            echo "</script>";
        }else{
            $user = "INSERT INTO banner (b_name,b_des,b_img,b_date)
                    values ('$b_name','$b_des','$filename','$b_date')";
            $sql = mysqli_query($connect,$user) or die(mysqli_error($connect));
            echo "<script type = 'text/javascript'>";
            echo "alert('เพิ่มพันธมิตรเสร็จสิ้น');";
            echo "window.location='man_banner.php';";
            echo "</script>";
        }
    }
?>