<?php include 'connect.php';

    if(isset($_POST['btn_upload'])){
        $filetmp = $_FILES['file_img']['tmp_name'];
        $filename = $_FILES['file_img']['name'];
        $filetype = $_FILES['file_img']['type'];
        $filepath = "img/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $de_name = $_POST['de_name'];
        $catg_id = $_POST['catg_id'];
        $de_detail = $_POST['de_detail'];
        $de_room = $_POST['de_room'];
        $de_price = $_POST['de_price'];
        $de_floor = $_POST['de_floor'];
        $de_short_des = $_POST['de_short_des'];
        
        $check = "SELECT de_room From tb_detail where de_room = '$de_room'";
        $result = mysqli_query($connect,$check) or die(mysqli_error($connect));
        $num =  mysqli_num_rows($result);
        if($num > 0){
            echo "<script type = 'text/javascript'>;";
            echo "alert('ไม่สามารถสมัครสมาชิกได้เนื่องจาก เลขห้อง นี้เคยถูกใช้ไปแล้ว');";
            echo "window.history.back();";
            echo "</script>";
        }else{
            $user = "INSERT INTO tb_detail (de_name,de_detail,de_img,catg_id,de_view,de_short_des,de_room,de_price,de_show,de_floor)
                    values ('$de_name','$de_detail','$filename','$catg_id','0','$de_short_des','$de_room','$de_price','enable','$de_floor')";
            $sql = mysqli_query($connect,$user) or die(mysqli_error($connect));
            echo "<script type = 'text/javascript'>";
            echo "alert('เพิ่มเเบบหองพักเสร็จสิ้น');";
            echo "window.location='man_room.php';";
            echo "</script>";
        }
    }
?>