<?php 
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
    <link rel="stylesheet" type="text/css" href="../css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/imageslider.css">
    <link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-32x32.png?v=201701041855" sizes="32x32">
    <link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-16x16.png?v=201701041855" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>51Records : ร้านเช่าแผ่นเสียงสุดมหัสจรรย์</title>
</head>
<body>

<section>
        <nav class="navigation navbar">

            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="../index.php"><img src="../img/website/logo.png" alt="Logo"></a>
                    <span class="navbar-burger burger" data-target="navbarMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </div>
                
                <div id="navbarMenu" class="navbar-menu">
                    <div class="navbar-end">
                      <span class="navbar-item"><a class="navbar-item" href="../product">รายการสินค้า</a></span>
                      <span class="navbar-item"><a class="navbar-item" href="../about">ติดต่อฉัน</a></span>                    

                      <?php if (!isset($_SESSION['userlevel'])) : header("location: ../login"); endif?>
                        
                      <?php if (isset($_SESSION['userlevel'])) : ?>
                        <?php 
                          if ($_SESSION['userlevel']=='admin'){ ?>
                            <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">Welcome : &nbsp;<strong><?php echo $_SESSION['username']; ?></strong></a>
                            <div class="navbar-dropdown">
                              <div class="navbar-item">Role is &nbsp;<p style="color: red;">ADMIN</p></div>
                              <hr class="navbar-divider">
                              <a class="navbar-item" href="../profile">Profile</a>
                              <hr class="navbar-divider">
                            <div class="navbar-item"><a href="../index.php?logout='1'" style="color: red;">Logout</a></div>
                          </div>
                      </div>
                      <?php } else{ header("location: ../404"); $_SESSION['404error'] = "You Are Not Admin!!!"; } endif;

                      if (isset($_SESSION['userlevel'])) : ?>
                        <?php 
                          if ($_SESSION['userlevel']=='admin'){ ?>
                            <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">Admin Control</strong></a>
                            <div class="navbar-dropdown">
                              <a class="navbar-item" href="admin_userlogin.php">userlogin</a>
                              <a class="navbar-item" href="admin_product.php">product</a>
                              <a class="navbar-item" href="admin_order.php">orders</a>
                              <a class="navbar-item" href="admin_require.php">userRequire</a>
                          </div>
                      </div>
                      <?php } endif ?>
                </div>

          </div>
      </div>
    </nav>
</section><br>
<div align ="left"class="container-fluid">
        <div class="row">
        <div div class="col-md-3" align ="left" style="color: rgb(11, 5, 90);"></div>
            
          
            <div div class="col-md-6" align ="left" style="color: rgb(11, 5, 90);"><br><br>
                <form action="admin_addproduct.php" id="myform" method="POST" enctype="multipart/form-data">

                <p class="text">เพิ่มข้อมูลสินค้า</p>
                    
                    <label for="name">ชื่อสินค้า</label>
                    <input class="form-control" type="text" placeholder="ชื่อสินค้า" id="pname" name="pname" >

                    <label for="name">ราคาสินค้า</label>
                    <input class="form-control" type="number" placeholder="ราคาสินค้า" id="pprice" name="pprice" >

                    <label for="name">ภาพสินค้า</label>
                    <input class="form-control" type="file" placeholder="ภาพสินค้า" id="ppic" name="ppic" >

                    <label for="name">รายละเอียดสินค้า</label>
                    <input class="form-control" type="text" placeholder="รายละเอียดสินค้า" id="pdtell" name="pdtell" >

                      </br>

                    <input class="btn btn-outline-success btn-block" type="submit" value="+ เพิ่มข้อมูลสินค้า" name="addproduct">
                </form>

            </div>
            
        
            
        <div class="col-md-3"style="color: rgb(11, 5, 90);"></div>    
        </div>
    </div>
</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/website.js"></script>
  <script type="text/javascript" src="js/imageslider.js"></script>

</html>

<?php
    include("../connection/connect.php");

    if(isset($_POST['addproduct'])){
        $name = $_POST['pname'];
        $price = $_POST['pprice'];
        $dtell = $_POST['pdtell'];

        if(!empty($_FILES['ppic']['name'])){
            $filename = $_FILES['ppic']['name'];

            copy($_FILES['ppic']['tmp_name'],"../img/product/".$_FILES['ppic']['name']);
        }

        $sql = "INSERT INTO `product`(`product_name`, `product_price`, `product_detail`, `product_img`) VALUES ('$name','$price','$dtell','$filename')";

        if(mysqli_query($conn,$sql)){
            echo "บันทึกลง ฐานข้อมูลเรียบร้อย!!!";
        }else{
            echo "!!!พลาดเกิดข้อผิด";
        }

        
    }
?>

