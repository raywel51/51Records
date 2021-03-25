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
                FROM  userlogin
                WHERE id ='".$edit_id."' " ;

    $result = mysqli_query($conn,$query);

    while($arr1 = mysqli_fetch_array($result)){
    
?>
<div class="columns is-centered">
<form action="admin_edituserlogin.php" id="myform" method="POST" enctype="multipart/form-data">


  <div class="field is-horizontal"></div>
  <label class="label">User is </label>
  <input class="input is-primary" size="1" name="userid" id="ordercode" type="text" value="<?php echo $arr1["id"];?>">
  
        

  
  <div class="select">
    <select name='role'>
      <option value="user">user</option>
      <option value="admin">admin</option>
    </select>
  </div>
  &nbsp;&nbsp;&nbsp;
  <input class="button is-primary" type="submit" value="แก้ไขระดับผู้ใช้งาน" name="edituser" >
  </div>
</div>
</from>

<div class="columns is-full is-centered">
<div class="field is-horizontal">
  <table width="100%" border="1" align="left" bordercolor="#666666" class="table table-hover">
  <tr>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>ID</strong></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong>ชื่อผู้ใช้</strong></td>
    <td width="30%" align="center" bgcolor="#CCCCCC"><strong>อีเมลล์</strong></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong>ชื่อ</strong></td>
    <td width="20%" align="center" bgcolor="#CCCCCC"><strong>ที่อยู่</strong></td>
    <td width="15%" align="center" bgcolor="#CCCCCC"><strong>เบอร์โทร</strong></td>
    <td width="5%" align="center" bgcolor="#CCCCCC"><strong>ระดับ</strong></td>
  </tr>
    
  
  <?php
  //connect db
  include("../connection/connect.php");
  $sql = "select * from userlogin WHERE id ='".$edit_id."' ";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
      echo "<td align='center'>" . $row["id"] . "</td>";
      echo "<td align='left'>" . $row["username"] . "</td>";
      echo "<td align='left'>" . $row["email"] . "</td>";
      echo "<td align='left'>" . $row["name"] . "</td>";
      echo "<td align='left'>" . $row["address"] . "</td>";
      echo "<td align='left'>" . $row["tel"] . "</td>";
      echo "<td align='left'>" . $row["role"] . "</td>";
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

    if(isset($_POST['edituser'])){
        $role = $_POST['role'];
        $id123 = $_POST['userid'];

        $sql = "UPDATE `userlogin` SET `role` = '$role' WHERE `id` = '$id123'";

        if (mysqli_query($conn, $sql)) {
          echo '<script type="text/javascript">alert("แก้ไขข้อมูลเรียบร้อย")</script>';
          header("location: admin_userlogin");
        } else {
          echo "Error updating record: " . mysqli_error($conn);
          echo $sql;
        }

        
    }
?>


