<section class="contact_us bg-light p-5">
    <div class="container">
                <div class="container mt-4 p-4 bg-dark shadow mobile-contact">
                    <br><br>
                    <h2 class="text-white ms-3">ข้อมูลติดต่อ</h2><hr class="text-white col-md-6">
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2">
                            <div class="container">
                            <i class="fa-sharp fa-solid fa-location-dot text-white float-center" style="<?php echo $icon_t;?>"></i>
                            </div>
                        </div>
                        <div class="col-md-12 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2">
                            <div class="container">
                            <i class="fa-sharp fa-solid fa-location-dot text-white float-center" style="<?php echo $icon_t;?>"></i>
                            </div>
                        </div>
                        <div class="col-md-12 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2">
                            <div class="container">
                            <i class="fa-sharp fa-solid fa-location-dot text-white float-center" style="<?php echo $icon_t;?>"></i>
                            </div>
                        </div>
                        <div class="col-md-12 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2">
                            <div class="container">
                            <i class="fa-sharp fa-solid fa-location-dot text-white float-center" style="<?php echo $icon_t;?>"></i>
                            </div>
                        </div>
                        <div class="col-md-12 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                </div>
       <div class="row">
       <?php   $keyrecaptcha = "6LfF4XwkAAAAAEeYafV9ytHCVbIpxwWOeTo_dh8w";?>
            <div class="col-md-4">
                <div class="container mt-4 p-4 bg-dark shadow fly-in">
                    <br><br>
                    <h2 class="text-white ms-3">ข้อมูลติดต่อ</h2><hr class="text-white col-md-6">
                    <br>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2">
                            <div class="container">
                            <i class="fa-sharp fa-solid fa-location-dot text-white float-center" style="<?php echo $icon_t;?>"></i>
                            </div>
                        </div>
                        <div class="col-md-9 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2">
                            <div class="container">
                            <i class="fa-sharp fa-solid fa-location-dot text-white float-center" style="<?php echo $icon_t;?>"></i>
                            </div>
                        </div>
                        <div class="col-md-9 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2">
                            <div class="container">
                            <i class="fa-sharp fa-solid fa-location-dot text-white float-center" style="<?php echo $icon_t;?>"></i>
                            </div>
                        </div>
                        <div class="col-md-9 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mt-2">
                            <div class="container">
                            <i class="fa-sharp fa-solid fa-location-dot text-white float-center" style="<?php echo $icon_t;?>"></i>
                            </div>
                        </div>
                        <div class="col-md-9 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container bg-white shadow p-4">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                    <h3 class="fw-bold"><i class="fa-sharp fa-solid fa-headset me-2"></i>ติดต่อเรา</h3>
                        <span class="text-secondary">Lorem, ipsum dolor.</span>
                        <form action="line-notify.php" method="POST" class="form-contact">
                            <div class="form-floating mt-2 ">
                                <input type="text" name="name" placeholder="name" required class="form-control ">
                                <label for="">ชื่อของท่าน</label>
                            </div>
                            <div class="form-floating mt-2 ">
                                <input type="email" name="email"placeholder="name" required class="form-control ">
                                <label for="">อีเมลล์ของท่าน</label>
                                <br>
                            
                            </div>
                            <textarea name="des" id="" required cols="5" rows="5" placeholder="รายละเอียดข้อมูล" class="form-control col-md-5"></textarea>
                            <div class="g-recaptcha mt-4  col-md-12" data-callback="makeaction" data-sitekey="<?php echo $keyrecaptcha; ?>""></div>
                          <?php if($_SESSION['u_id']){ ?>
                             <button disabled type="submit"  id="submit" name="btn_submit"  class="btn btn-warning text-dark mt-4 rounded-3 p-3 col-md-6">ส่งข้อความ</button>
                       <?php   }else{ ?>
                            <a href="login.php"  class="btn btn-warning text-dark mt-4 rounded-3 p-3 col-md-6">กรุณาเข้าสู่ระบบก่อนครับ</a>
                         <?php } ?>
                           
                        </form>
                        <script> // กำหนดปุ่มเป็น disable ไว้ ต้องทำ reCHAPTCHA ก่อนจึงกดได้
                        function makeaction(){
                        document.getElementById('submit').disabled = false;  
                        }
                        </script>
                    </div>
                </div>
                </div>
            </div>
       </div>
    </div>
</section>

  <!--==================== Recaptcha ====================-->
  <script src="https://www.google.com/recaptcha/api.js" async defer ></script>
