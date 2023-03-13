<?php 
       if(isset($_POST['btn_pay'])){
        $filetmp = $_FILES['file_img']['tmp_name'];
        $filename = $_FILES['file_img']['name'];
        $filetype = $_FILES['file_img']['type'];
        $filepath = "img/".$filename;
        move_uploaded_file($filetmp,$filepath);

        $u_id = $_POST['u_id'];
        $de_id = $_POST['de_id'];
        $bill_chanel = $_POST['bill_chanel'];
        $u_date = date("Y-m-d H:i");
        $r_id = $_GET['r_id'];
    
                $sql = "INSERT INTO tb_bill (u_id,de_id,bill_chanel,bill_date,bill_pic,bill_status,r_id,bill_price)
                values ('$u_id','$de_id','$bill_chanel','$u_date','$filename','รอการยืนยัน','$r_id','$price')";
                $user = mysqli_query($connect,$sql) or die(mysqli_error($connect));

                $payed = "UPDATE tb_reser SET r_status = 'ชำระเงินแล้ว' where r_id = '$r_id'";
                $payed_query = mysqli_query($connect,$payed);
             
                echo 
                "<script type ='text/javascript'>;
                    swal('สำเร็จ', 'ชำระเงินสำเร็จ', 'success');;
                    setTimeout(function(){
                    window.location='my_payment.php';
                    },1500);
                    </script>;
                ";
            
         
        }

    ?>