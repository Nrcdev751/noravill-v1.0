<?php include 'connect.php';

    if(isset($_POST['btn_upload'])){
        $filetmp = $_FILES['file_img']['tmp_name'];
        $filename = $_FILES['file_img']['name'];
        $filetype = $_FILES['file_img']['type'];
        $filepath = "img/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $n_quest = $_POST['n_quest'];
        $n_detail = $_POST['n_detail'];
        $n_date = date("Y-m-d H:i");
        
        $check = "SELECT n_quest From notify where n_quest = '$n_quest'";
        $result = mysqli_query($connect,$check) or die(mysqli_error($connect));
        $num =  mysqli_num_rows($result);
        if($num > 0){
            echo "<script type = 'text/javascript'>;";
            echo "alert('ไม่สามารถสมัครสมาชิกได้เนื่องจาก ประชาสัมพันธ์ นี้เคยถูกใช้ไปแล้ว');";
            echo "window.history.back();";
            echo "</script>";
        }else{
            $user = "INSERT INTO notify (n_quest,n_detail,n_img,n_date)
                    values ('$n_quest','$n_detail','$filename','$n_date')";
            $sql = mysqli_query($connect,$user) or die(mysqli_error($connect));
            echo "<script type = 'text/javascript'>";
            echo "alert('เพิ่มประชาสัมพันธ์เสร็จสิ้น');";
            echo "window.location='man_notify.php';";
            echo "</script>";
        }
    }
?>