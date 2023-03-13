<?php 
       if(isset($_POST['btn_submit'])){
       

        $u_id = $_SESSION['u_id'];
        $de_id = $_POST['de_id'];
        $r_checkin = $_POST['r_checkin'];
        $r_checkout = $_POST['r_checkout'];
        $date = date("Y-m-d H:i");

        $date1=date_create($r_checkin);
        $date2=date_create($r_checkout);
        $diff=date_diff($date1,$date2);
    
                if($r_checkin == $r_checkout){
                    echo 
                    "
                    <script type ='text/javascript'>;
                    swal('ผิดพลาด', 'ห้ามเช็คอินในวันเดียวกันครับ', 'error');
                     </script>";
                }else{
                    $sql = "INSERT INTO tb_reser (u_id,de_id,r_date,r_status,r_day,r_checkin,r_checkout,r_room)
                    values ('$u_id','$de_id','$date','รอการชำระเงิน','".$diff->format("%a")."','$r_checkin','$r_checkout','รอการยืนยัน')";
                    $user = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    
                    $rent = "SELECT * From tb_reser where u_id = '".$_SESSION['u_id']."' AND de_id = '$de_id' order by r_date desc limit 1";
                    $rent_query = mysqli_query($connect,$rent);
                    $row_rent = mysqli_fetch_assoc($rent_query);
    
                    $rent_id = $row_rent['r_id'];
    
                    echo 
                    "<script type ='text/javascript'>;
                        swal('สำเร็จ', 'จองห้องพักสำเร็จ', 'success');;
                        setTimeout(function(){
                        window.location='rent_confirm.php?r_id=$rent_id';
                        },1500);
                        </script>;
                    ";
                
                }

     
         
        }

    ?>