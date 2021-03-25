<?php 
    session_start();
    include("connection/connect.php");  
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
</section><br><br><br>
<form id="frmcart" name="frmcart" method="post" action="saveorder.php">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB">
      <strong>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td bgcolor="#F9D5E3">สินค้า</td>
      <td align="center" bgcolor="#F9D5E3">ราคา</td>
      <td align="center" bgcolor="#F9D5E3">จำนวน</td>
      <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
    </tr>
<?php
	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from product where product_id=$p_id";
		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['product_price']*$qty;
    $sent	= $sum+50;
		$total	+= $sent;
    echo "<tr>";
    echo "<td>" . $row["product_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['product_price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
  echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>ค่าจัดส่ง</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>"."50"."</b>"."</td>";
    echo "</tr>";
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($sent,2)."</b>"."</td>";
    echo "</tr>";
?>

	<td colspan="4" align="center" bgcolor="#CCCCCC">
  <p style="text-align:left"><a href="clear.php">ล้างค่า</a></p>
	<input type="submit" class="button is-primary is-small is-fullwight is-light" name="Submit2" value="สั่งซื้อ" /></br>
  </td>
</form>
</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/website.js"></script>
  <script type="text/javascript" src="js/imageslider.js"></script>

</html>

