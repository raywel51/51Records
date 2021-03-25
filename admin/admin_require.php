<?php session_start(); ?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                              <a class="navbar-item" href="admin_about.php">about</a>
                          </div>
                      </div>
                      <?php } endif ?>
                </div>

          </div>
      </div>
    </nav>
</section><br><br><br>
<table width="80%" border="1" align="center" bordercolor="#666666" class="table table-hover">
  <tr>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong>ชื่อผู้ใช้</strong></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong>ข้อหัวเรื่อง</strong></td>
    <td width="40%" align="center" bgcolor="#CCCCCC"><strong>ข้อความ</strong></td>
  </tr>
  
  
  <?php
  //connect db
  include("..\connection/connect.php");
  $sql = "select * from require0 order by id";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
    echo "<td align='left'>" . $row["name"] . "</td>";
    echo "<td align='left'>" . $row["namep"] . "</td>";
    echo "<td align='left'>" . $row["message"] . "</td>";
	  echo "</tr>";
  }
  ?>
</table>
</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="..\js/website.js"></script>
  <script type="text/javascript" src="..\js/imageslider.js"></script>

</html>

