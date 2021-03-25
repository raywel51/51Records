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
</section><br><br><br><br>

<?php
include("../connection/connect.php");
if(isset($_GET['edit_id'])){ //เมื่อรับค่า update_id มา
    $edit_id = $_GET['edit_id'];
    $query ="   SELECT *
                FROM  orders
                WHERE order_number ='".$edit_id."' " ;

    $result = mysqli_query($conn,$query);

    while($arr1 = mysqli_fetch_array($result)){
    
?>
<div class="columns is-centered">
<form action="admin_editorder.php" id="myform" method="POST" enctype="multipart/form-data">


  <div class="field is-horizontal"></div>
  <label class="label">Order is </label>
  <input class="input is-primary" name="ordercode" id="ordercode" type="text" value="<?php echo $arr1["order_number"];?>">
  
        

  
  <div class="select">
    <select name='status'>
      <option value="pending">pending</option>
      <option value="seccess">seccess</option>
    </select>
  </div>
  &nbsp;&nbsp;&nbsp;
  <input class="button is-primary" type="submit" value="แก้ไขข้อมูลการจัดส่ง" name="editorder" >
  </div>
</div>
</from>

<div class="columns is-full is-centered">
<div class="field is-horizontal">
  <table width="100%" border="1" align="left" bordercolor="#666666" class="table table-hover">
  <tr>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>name.</strong></td>
    <td width="20%" align="center" bgcolor="#CCCCCC"><strong>เวลา</strong></td>
    <td width="30%" align="center" bgcolor="#CCCCCC"><strong>ชื่อสินค้า</strong></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>จำนวน</strong></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
    <td width="15%" align="center" bgcolor="#CCCCCC"><strong>สถานที่จัดส่ง</strong></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>สถานะ</strong></td>
  </tr>
    
  
  <?php
  //connect db
  include("../connection/connect.php");
  $sql = "select * from orders WHERE order_number ='".$edit_id."' ";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
      echo "<td align='center'>" . $row["name"] . "</td>";
      echo "<td align='left'>" . $row["timestamp"] . "</td>";
      echo "<td align='left'>" . $row["product_name"] . "</td>";
      echo "<td align='left'>" . $row["quantity"] . "</td>";
      echo "<td align='left'>" . $row["price"] . "</td>";
      echo "<td align='left'>" . $row["address"] . "</td>";
      echo "<td align='left'>" . $row["order_status"] . "</td>";
	echo "</tr>";
  }
  ?>
</table>


</div><br>
</div>
</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/website.js"></script>
  <script type="text/javascript" src="js/imageslider.js"></script>

</html>
<?php } } ?>

<?php
    include("../connection/connect.php");

    if(isset($_POST['editorder'])){
        $status = $_POST['status'];
        $id123 = $_POST['ordercode'];

        $sql = "UPDATE `orders` SET `order_status` = '$status' WHERE `order_number` = '$id123'";

        if (mysqli_query($conn, $sql)) {
          echo '<script type="text/javascript">alert("แก้ไขข้อมูลเรียบร้อย")</script>';
          header("location: admin_order");
        } else {
          echo "Error updating record: " . mysqli_error($conn);
          echo $sql;
        }

        
    }
?>


