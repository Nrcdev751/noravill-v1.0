<?php include 'connect.php';

    if(isset($_POST['btn_upload'])){
        $filetmp = $_FILES['file_img']['tmp_name'];
        $filename = $_FILES['file_img']['name'];
        $filetype = $_FILES['file_img']['type'];
        $filepath = "img/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $catg_name = $_POST['catg_name'];
        
        $check = "SELECT catg_name From category where catg_name = '$catg_name'";
        $result = mysqli_query($connect,$check) or die(mysqli_error($connect));
        $num =  mysqli_num_rows($result);
        if($num > 0){
            echo "<script type = 'text/javascript'>;";
            echo "alert('ไม่สามารถสมัครสมาชิกได้เนื่องจาก ชื่อหมวดหมู่กระทู้ นี้เคยถูกใช้ไปแล้ว');";
            echo "window.history.back();";
            echo "</script>";
        }else{
            $user = "INSERT INTO category (catg_name,catg_img,catg_show)
                    values ('$catg_name','$filename','enable')";
            $sql = mysqli_query($connect,$user) or die(mysqli_error($connect));
            echo "<script type = 'text/javascript'>";
            echo "alert('เพิ่มแระเภทห้องพักสำเร็จ');";
            echo "window.location='man_catg.php';";
            echo "</script>";
        }
    }
?>