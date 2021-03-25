<?php 
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
  ?>
<link rel="icon" type="image/svg" href="img/website/favicon.svg" sizes="32x32">
<link rel="stylesheet" type="text/css" href="css/userlogin.css">
<title>51Records : หน้าการเข้าสู่ระบบ</title>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <p>Login Page</p>
      <img src="img/website/logo_black.png" id="icon" alt="User Icon" />
    </div>

    <form action="login_db" method="post">
    <?php if (isset($_SESSION['lgerror'])) : ?>
          <div class="error">
            <h3>
                <?php 
                  echo "*".$_SESSION['lgerror']."*";
                  unset($_SESSION['lgerror']);
                ?>
            </h3>
          </div>
      <?php endif ?>
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="login_user">
        <a class="fadeIn fourth" href="index.php">Cancel?</a>
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="register">No account?</a>
           ||
      <a class="underlineHover" href="index">Go Homepage</a>
    </div>

  </div>
</div>