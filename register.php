<?php 
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
  ?>
<link rel="icon" type="image/svg" href="img/website/favicon.svg" sizes="32x32">
<link rel="stylesheet" type="text/css" href="css/userlogin.css">
<title>51Records : หน้าการสมัครสมาชิก</title>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <p>Register Page</p>
      <img src="img/website/logo_black.png" id="icon" alt="User Icon" />
    </div>

    <form action="register_db" method="post" enctype="multipart/form-data">
      <?php if (isset($_SESSION['error'])) : ?>
          <div class="error">
            <h3>
                <?php 
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                ?>
            </h3>
          </div>
      <?php endif ?>
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
      <input type="text" id="name" class="fadeIn second" name="name" placeholder="name">
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="email">
      <input type="password" id="password" class="fadeIn third" name="pw1" placeholder="password">
      <input type="password" id="password" class="fadeIn third" name="pw2" placeholder="password">
      <input type="number" id="tel" class="fadeIn third" name="tel" placeholder="telephone">
      <input type="text" id="tel" class="fadeIn third" name="address" placeholder="Address">
      <input class="fadeIn third" type="file" placeholder="ภาพสินค้า" id="ppic" name="myfile" >
      <input type="submit" class="fadeIn fourth" value="Register" name="reg_user">
        
    </form>

    <div id="formFooter ">
      <a class="underlineHover" href="index">Cancel?</a>
           ||
      <a class="underlineHover" href="login">Have a account?</a>
    </div>

  </div>
</div>