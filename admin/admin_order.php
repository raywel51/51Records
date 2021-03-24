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
    <link rel="stylesheet" type="text/css" href="..\css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="..\css/imageslider.css">
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
                    <a class="navbar-item" href="../index.php"><img src="..\img/website/logo.png" alt="Logo"></a>
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
                            <hr class="navbar-divider">
                            <div class="navbar-item"><a href="index.php?logout='1'" style="color: red;">Logout</a></div>
                            </div>
                      </div></div><?php endif ?>

                      <?php if (isset($_SESSION['userlevel'])) : ?>
                        <?php 
                          if ($_SESSION['userlevel']=='admin'){ ?>
                            <div class="navbar-item has-dropdown is-hoverable">
                          <a class="navbar-link">Admin Control</strong></a>
                            <div class="navbar-dropdown">
                              <a class="navbar-item" href="../admin/admin_userlogin.php">userlogin</a>
                              <a class="navbar-item" href="../admin/admin_product.php">product</a>
                              <a class="navbar-item" href="../admin/admin_order.php">orders</a>
                              <a class="navbar-item" href="../admin/admin_require.php">userRequire</a>
                          </div>
                      </div>
                      <?php } endif ?>
                </div>

          </div>
      </div>
    </nav>
</section><br><br><br>
<?php //nloop user
  include("../connection/connect.php"); 
	$userdb = $_SESSION['username'];
	$query ="SELECT * FROM `userlogin`";
    $result = mysqli_query($conn, $query) or die("Error!!!");

		foreach ($result as $row){
			$username =  $row['id'];
			$email = $row['email'];
			$address = $row['address']; 
      $name = $row['name'];?>
	
    


    <?php } ?>
  </div>
  <div class="column">
  <p>ตารางการสั้งชื้อ</p>
  <table width="99%" border="1" align="left" bordercolor="#666666" class="table table-hover">
  <tr>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>Orders No.</strong></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong>เวลา</strong></td>
    <td width="20%" align="center" bgcolor="#CCCCCC"><strong>ชื่อสินค้า</strong></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>จำนวน</strong></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>ราคา</strong></td>
    <td width="15%" align="center" bgcolor="#CCCCCC"><strong>สถานที่จัดส่ง</strong></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>สถานะ</strong></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>แก้ไข</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("../connection/connect.php");
  $sql = "select * from orders";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
      echo "<td align='left'>" . $row["order_number"] . "</td>";
      echo "<td align='left'>" . $row["timestamp"] . "</td>";
      echo "<td align='left'>" . $row["product_name"] . "</td>";
      echo "<td align='left'>" . $row["quantity"] . "</td>";
      echo "<td align='left'>" . $row["price"] . "</td>";
      echo "<td align='left'>" . $row["address"] . "</td>";
      echo "<td align='left'>" . $row["order_status"] . "</td>";
      echo "<td align='center'><a href='admin_editorder.php?edit_id=$row[order_number]'><i class='fa fa-shopping-cart fa-2x' aria-hidden='true'></a></td>";
	echo "</tr>";
  }
  ?>
</table>
</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="..\js/website.js"></script>
  <script type="text/javascript" src="..\js/imageslider.js"></script>

</html>

