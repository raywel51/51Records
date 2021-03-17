
<link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-32x32.png?v=201701041855" sizes="32x32">
<link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-16x16.png?v=201701041855" sizes="16x16">
<link rel="stylesheet" type="text/css" href="css/userlogin.css">
<title>51Records : หน้าการเข้าสู่ระบบ</title>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <p>Login Page</p>
      <img src="img/product/1005371.png" id="icon" alt="User Icon" />
    </div>

    <form action="login_db" method="post">
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
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="login_user">
      <a class="fadeIn fourth" href="index.php">Cancel?</a>
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="#">No account?</a>
    </div>

  </div>
</div>