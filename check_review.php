<?php 
       if(isset($_POST['btn_review'])){
       

        $u_id = $_SESSION['u_id'];
        $re_des = $_POST['re_des'];
        $u_review = $_POST['u_review'];
        $re_score = $_POST['re_score'];
        $date = date("Y-m-d H:i");
    
                    $sql = "INSERT INTO review (u_id,re_des,re_date,re_score,re_status)
                    values ('$u_id','$re_des','$date',$re_score,'new')";
                    $user = mysqli_query($connect,$sql) or die(mysqli_error($connect));
    
                    $update_review = "UPDATE tb_user set u_review = $u_review-1 where u_id = $u_id";
                    $review_query = mysqli_query($connect,$update_review) or die(mysqli_error($connect));
    
                    echo 
                    "<script type ='text/javascript'>;
                        swal('สำเร็จ', 'ส่งคำรีวิวเสร็จสิ้น', 'success');;
                        setTimeout(function(){
                        window.location='review_us.php';
                        },1500);
                        </script>;
                    ";
                
            

     
         
        }

    ?>