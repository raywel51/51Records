<?php 
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location:index');
  }
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="css/imageslider.css">
    <link rel="stylesheet" type="text/css" href="css/loader.css">
    <link rel="stylesheet" type="text/css" href="css/cards.css">
    <link rel="icon" type="image/svg" href="img/website/favicon.svg" sizes="32x32">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>51Records : ร้านเช่าแผ่นเสียงสุดมหัสจรรย์</title>
</head>
<body>


  <section class="hero is-Success is-medium is-bold">
    <div class="hero-head navigation">
        <nav class="navbar">

            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="index"><img src="img/website/logo_white.png" alt="Logo"></a>
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
                              <a class="navbar-item" href="../51Records/admin/admin_about.php">about</a>
                          </div>
                      </div>
                      <?php } endif ?>
                  
                  </div> 
                </div>
            </div>
        </nav>
    
    

  </div><div class="img-slider">
      <div class="slide active">
        <img src="img\imageslider\1.jpg" alt="">
        <div class="info">
          <h2>51Records</h2>
        </div>
      </div>

      <div class="slide">
        <img src="img\imageslider\2.jpg" alt="">
        <div class="info">
          <h2>51Records</h2>
        </div>
      </div>
      
      <div class="slide">
        <img src="img\imageslider\3.jpg" alt="">
        <div class="info">
          <h2>51Records</h2>
        </div>
      </div>

      <div class="slide">
        <img src="img\imageslider\4.jpg" alt="">
        <div class="info">
          <h2>51Records</h2>
        </div>
      </div>

      <div class="slide">
        <img src="img\imageslider\5.jpg" alt="">
        <div class="info">
          <h2>51Records</h2>
        </div>
      </div>
    </div>
</section>
<section class="section">
        <div class="container has-text-centered">
            <h2 class="title">51Records</h2>
            <p>We have created a fictional band website. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            <div class="columns is-centered" style="padding: 2rem">

            <?php
  //connect db
  include("connection/connect.php");
  $sql = "select * from product WHERE product_id=21";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  { ?>
                <div class="column">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-2by1">
                                <img src="img/product/<?php echo $row["product_img"]; ?>" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4"><?php echo $row["product_name"]; ?></p>
                                    <p class="subtitle is-6">@polycat</p>
                                </div>
                            </div>

                            <div class="content">
                                <?php echo $row["product_detail"]; ?>
                                <a href='cartfast.php?p_id=21&act=add'>@Buyit</a>.
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <?php
  //connect db
  include("connection/connect.php");
  $sql = "select * from product WHERE product_id=22";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  { ?>
                <div class="column">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-2by1">
                                <img src="img/product/<?php echo $row["product_img"]; ?>" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4"><?php echo $row["product_name"]; ?></p>
                                    <p class="subtitle is-6">@Chilling Sunday</p>
                                </div>
                            </div>

                            <div class="content">
                                <?php echo $row["product_detail"]; ?>
                                <a href='cartfast.php?p_id=22&act=add'>@Buyit</a>.
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <?php
  //connect db
  include("connection/connect.php");
  $sql = "select * from product WHERE product_id=26";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  { ?>
                <div class="column">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-2by1">
                                <img src="img/product/<?php echo $row["product_img"]; ?>" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4"><?php echo $row["product_name"]; ?></p>
                                    <p class="subtitle is-6">@Taitosmith</p>
                                </div>
                            </div>

                            <div class="content">
                                <?php echo $row["product_detail"]; ?>
                                <a href='cartfast.php?p_id=26&act=add'>@Buyit</a>.
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            </div>
        </div>
        </div>
    </section>

    <section class="section">
        <div class="container has-text-centered">
            <h2 class="title">Contact</h2>

            <form class="contact1-form validate-form" action="index.php" id="myform" method="POST" enctype="multipart/form-data">
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input" name = "name" type="text" placeholder="Name">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" name = "123" type="email" placeholder="Email">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea" name = "message" placeholder="Message us"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <button type="submit" name ="add" class="button is-primary">
                                    Send message
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    <a href="">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="">
                        <i class="fab fa-snapchat fa-2x"></i>
                    </a>
                </p>
                <p>
                   By Nonthawat Kittayawat
                    </a>
                </p>
            </div>
        </div>
    </footer>
</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/website.js"></script>
  <script type="text/javascript" src="js/imageslider.js"></script>
  <script type="text/javascript" src="js/loader.js"></script>

</html>

<?php 
    include('connection\connect.php');
    
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $name1 = $_POST['123'];
		$message = $_POST['message'];

                $sql = "INSERT INTO `about`(`name`, `email`, `message`) VALUES ('$name', '$name1', '$message')";
                mysqli_query($conn, $sql);

            } else {
            }
    

?>