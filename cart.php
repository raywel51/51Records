<?php ini_set('display_errors','Off');;?>
<?php 
    session_start();?>
    <?php 
    if (!isset($_SESSION['userlevel'])){header("location:login");} ?>

<?php
	
	$p_id = $_GET['p_id']; 
	$act = $_GET['act'];

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/myStyle.css">
    <link rel="stylesheet" type="text/css" href="css/imageslider.css">
    <link rel="stylesheet" type="text/css" href="css/loader.css">
    <link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-32x32.png?v=201701041855" sizes="32x32">
    <link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-16x16.png?v=201701041855" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Shopping Cart</title>
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
</section></br></br></br></br></br>
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td colspan="5" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("connection/connect.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from product where product_id=$p_id";
		$query = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_array($query)){
		$sum = $row['product_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["product_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["product_price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$p_id]' value='$qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
} 
?>
<tr>
<td><a href="product.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
	<a href="clear.php">ล้างค่า</a></a>
    <input type="submit" name="button" id="button" value="ปรับปรุง" />
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
</td>
</tr>
</table>
</form>
</body>
</html>
<?php } ?>