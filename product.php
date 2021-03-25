<?php error_reporting (E_ALL ^ E_NOTICE);session_start();if (!isset($_SESSION['userlevel'])){header("location:login");}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">
    <link rel="icon" type="image/svg" href="img/website/favicon.svg" sizes="32x32">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>51Records : ร้านเช่าแผ่นเสียงสุดมหัสจรรย์</title>
</head>
<body>


  <section class="a is-Success">
    <div class="navigation">
        <nav class="navbar">

            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="index"><img src="img/website/logo_black.png" alt="Logo"></a>
                    <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                
                <div id="navbarMenu" class="navbar-menu">
                    <div class="navbar-end">
                      <span class="navbar-item"><a class="navbar-item" href="product">รายการสินค้า</a></span>
                      <span class="navbar-item"><a class="navbar-item" href="about">ติดต่อฉัน</a></span>                    

                      <?php if (!isset($_SESSION['userlevel'])) : ?>
                        <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">โปรดเข้าสู่ระบบ</a>
                            <div class="navbar-dropdown">
                              <a class="navbar-item" href="register">Register</a>
                              <a class="navbar-item" href="login">Login</a>
                              <hr class="navbar-divider">
                            <div class="navbar-item">Version 0.9.1</div>
                            </div>
                      </div><?php endif ?>

                      <?php if (isset($_SESSION['userlevel'])) : ?>
                        <?php 
                          if ($_SESSION['userlevel']=='admin'){ ?>
                            <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">Welcome : &nbsp;<strong><?php echo $_SESSION['username']; ?></strong></a>
                            <div class="navbar-dropdown">
                              <div class="navbar-item">Role is &nbsp;<p style="color: red;">ADMIN</p></div>
                              <hr class="navbar-divider">
                              <a class="navbar-item" href="profile">Profile</a>
                              <hr class="navbar-divider">
                            <div class="navbar-item"><a href="index.php?logout='1'" style="color: red;">Logout</a></div>
                          </div>
                      </div>
                      <?php } else{ ?>
                            <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">Welcome : &nbsp;<strong><?php echo $_SESSION['username']; ?></strong></a>
                              <div class="navbar-dropdown">
                                <div class="navbar-item">Role is &nbsp;<p style="color: darkblue;">MEMBER</p></div>
                                <hr class="navbar-divider">
                                <a class="navbar-item" href="profile">Profile</a>
                                <a class="navbar-item" href="cart">cart</a>
                                <a class="navbar-item" href="require">Require Records</a>
                                <hr class="navbar-divider">
                              <div class="navbar-item"><a href="index.php?logout='1'" style="color: red;">Logout</a></div>
                            </div>
                        </div>
                      <?php } endif ?>

                      <?php if (isset($_SESSION['userlevel'])) : ?>
                        <?php 
                          if ($_SESSION['userlevel']=='admin'){ ?>
                            <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">Admin Control</strong></a>
                            <div class="navbar-dropdown">
                              <a class="navbar-item" href="../51Records/admin/admin_userlogin.php">userlogin</a>
                              <a class="navbar-item" href="../51Records/admin/admin_product.php">product</a>
                              <a class="navbar-item" href="../51Records/admin/admin_order.php">orders</a>
                              <a class="navbar-item" href="../51Records/admin/admin_require.php">userRequire</a>
                          </div>
                      </div>
                      <?php } endif ?>
                  
                  </div> 
                </div>
            </div>
        </nav>
</section>

</br></br></br>
<?php include 'include/user_product.php'; ?>
</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/website.js"></script>
  <script type="text/javascript" src="js/imageslider.js"></script>
  <script type="text/javascript" src="js/loader.js"></script>

</html>

