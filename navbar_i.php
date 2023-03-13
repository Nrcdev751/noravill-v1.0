<section class="nav">
    <nav class="nav">
        <div class="container">
            <div class="logo">
                <a href="index.php"><img src="img/logo.svg" class="mb-2" width="150" height="50" alt=""></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="index.php" <?php if($page=='index'){echo 'class="text-warning"';}?>><i class="fa-sharp fa-solid fa-house "></i> หน้าแรก</a></li>
                    <li><a href="rent_catg.php"><i class="fa-sharp fa-solid fa-book"></i> ระบบการจอง</a></li>
                    <li><a href="#"><i class="fa-sharp fa-solid fa-bag-shopping"></i> สินค้าภายในโรงแรม</a></li>
                    <li><a href="contact.php"><i class="fa-sharp fa-solid fa-address-card"></i> เกี่ยวกับเรา</a></li>
                    <div class="right-menu">
                        <li class=""><a class=" menu-button" href="#">เมนู</a><i class="fa-sharp fa-solid fa-caret-down text-white"></i></li>
                        <div class="dropdown-menu-test">
                            <a class="dropdown-item" href="register.php"><i class="fa-sharp fa-solid fa-user-group"></i> สมัครสมาชิก</a>
                            <a class="dropdown-item" href="login.php"><i class="fa-sharp fa-solid fa-key"></i> เข้าสู่ระบบ</a>
                         
                        </div>
                    </div>
                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>
 </section>