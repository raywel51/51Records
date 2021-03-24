<?php 
    session_start();
    
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location:index');
  }
  
  ?>

<?php
include("connection/connect.php");
if(isset($_GET['edit_id'])){ //เมื่อรับค่า update_id มา
    $edit_id = $_GET['edit_id'];
    $query ="   SELECT *
                FROM  product
                WHERE product.product_id ='".$edit_id."' " ;

    $result = mysqli_query($conn,$query);

    while($arr1 = mysqli_fetch_array($result)){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="css/imageslider.css">
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
                    <a class="navbar-item" href="index.php"><img src="img/website/logo.png" alt="Logo"></a>
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
                      <span class="navbar-item"><a class="navbar-item">ติดต่อฉัน</a></span>                    

                      <?php if (!isset($_SESSION['username'])) : ?>
                      <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">โปรดเข้าสู่ระบบ</a>
                            <div class="navbar-dropdown">
                            <a class="navbar-item" href="register">Register</a>
                            <a class="navbar-item" href="login">Login</a>
                            <hr class="navbar-divider">
                            <div class="navbar-item">Version 0.9.1</div>
                            </div>
                      </div></div><?php endif ?>

                      <?php if (isset($_SESSION['username'])) : ?>
                      <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">Welcome : &nbsp;<strong><?php echo $_SESSION['username']; ?></strong></a>
                            <div class="navbar-dropdown">
                            <a class="navbar-item">Role is Admin</a>
                            <a class="navbar-item" href="profile">Profile</a>
                            <a class="navbar-item" href="dashboard">Dashboard</a>
                            <hr class="navbar-divider">
                            <div class="navbar-item"><a href="index.php?logout='1'" style="color: red;">Logout</a></div>
                            </div>
                      </div></div><?php endif ?>
                </div>

          </div>
      </div>
    </nav>
</section><br>
<div align ="left"class="container-fluid">
        <div class="row">
        <div div class="col-md-3" align ="left" style="color: rgb(11, 5, 90);"></div>
            
          
            <div div class="col-md-6" align ="left" style="color: rgb(11, 5, 90);"><br><br>
                <form action="editproduct.php" id="myform" method="POST" enctype="multipart/form-data">

                <p class="text">แก้ไขข้อมูลสินค้า</p>
                    <label for="name">รหัสสินค้า</label>
                    <input class="form-control" type="text" value="<?php echo $arr1['product_id'] ?>" id="id" name="id" >

                    <label for="name">ชื่อสินค้า</label>
                    <input class="form-control" type="text" value="<?php echo $arr1['product_name'] ?>" id="pname" name="pname" >

                    <label for="name">ราคาสินค้า</label>
                    <input class="form-control" type="number" value="<?php echo $arr1['product_price'] ?>" id="pprice" name="pprice" >

                    <label for="name">ภาพสินค้า</label>
                    <input class="form-control" type="test" value="<?php echo $arr1['product_img'] ?>" id="ppic" name="ppic" >

                    <label for="name">รายละเอียดสินค้า</label>
                    <input class="form-control" type="text" value="<?php echo $arr1['product_detail'] ?>" id="pdtell" name="pdtell" >

                      </br>

                    <input class="btn btn-outline-success btn-block" type="submit" value="+- แก้ไขข้อมูลสินค้า" name="addproduct">
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
    }// end while

}// end if(isset($_GET['update_id']))

?>

<?php
    include("connection/connect.php");
    

    if(isset($_POST['addproduct'])){
        $id = $_POST['id'];
        $name = $_POST['pname'];
        $price = $_POST['pprice'];
        $dtell = $_POST['pdtell'];
        $sql = "UPDATE `product` SET `product_name` = '$name', `product_price` =  '$price', `product_detail` = '$dtell' WHERE `product`.`product_id` = $id;";


if (mysqli_query($conn, $sql)) {
    echo '<script type="text/javascript">alert("แก้ไขข้อมูลเรียบร้อย")</script>';
    header("location: admin_product");
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

        
    }
?>