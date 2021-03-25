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
    <link rel="stylesheet" type="text/css" href="css/card.css">
    <link rel="icon" type="image/svg" href="img/website/favicon.svg" sizes="32x32">
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

<div class="columns is-desktop">
  <div class="column is-one-third">

  <?php //nloop user
  include("connection/connect.php"); 
	$userdb = $_SESSION['username'];
	$query ="SELECT * FROM `userlogin` WHERE username='".$userdb."' ";
    $result = mysqli_query($conn, $query) or die("Error!!!");

		foreach ($result as $row){
			$username =  $row['id'];
			$email = $row['email'];
			$address = $row['address']; 
      $name = $row['name'];
	    $_SESSION['name'] = $row['name'];?>

    <br><br><br><br><br><br>
    <div class="card">
    <img src="img/profile/<?php echo $row['img'];?>" alt="<?php echo $row['username'];?>" style="width:100%">
    <h1><?php echo "คุณ ".$name;?></h1>
    <p class="title"><?php echo $row['address'];?></p>
    <p><?php echo $row['tel'];?></p>
    <p><?php echo $row['email'];?></p>

    <?php echo"<a href='editprofile.php?edit_id=$row[id];'><p><button>Edit</button></p></a>"?>
    </div>

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
  </tr>
  
  
  <?php
  //connect db
  include("connection/connect.php");
  $sql = "select * from orders WHERE userid='".$username."' ";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) 
{
  	echo "<tr>"; ?>
    <form action="profile.php" method="post" name="myForm">
    <?php  echo "<td align='left'><button class='button is-ghost' name='pdfview'>".$row["order_number"]."</button></td>"; ?>
      </from> <?php
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
 

  <div class="column">
  <p>ตารางRequire</p>
  <table width="80%" border="1" align="center" bordercolor="#666666" class="table table-hover">
  <tr>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong>ชื่อผู้ใช้</strong></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong>ข้อหัวเรื่อง</strong></td>
    <td width="40%" align="center" bgcolor="#CCCCCC"><strong>ข้อความ</strong></td>
  </tr>
  
  
  <?php
  //connect db
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
  </div>

  
</div>

</body>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/website.js"></script>
  <script type="text/javascript" src="js/imageslider.js"></script>

</html>

<?php
include("connection/connect.php");
if(isset($_POST['pdfview'])){
            

    require("fpdf/fpdf.php");
ob_end_clean();
ob_start();

class PDF extends FPDF
{
// Page header
function Header()
{
    global $title;
    $this->AddFont('THSarabun','','THSarabun.php');
    $this->SetFont('THSarabun','',18);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(90,10,iconv('UTF-8','cp874',$title),1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('THSarabun','',12);
    // Page number
    $this->Cell(0,10,iconv('UTF-8','cp874','หน้า').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$title = "รายชื่อนักศึกษา";
$pdf->SetTitle($title,true); // ให้แสดง title ไทย
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('THSarabun','',12);
$pdf->AddFont('THSarabun','','THSarabun.php');
$pdf->SetFont('THSarabun','',16);

$pdf->SetFillColor(181,236,177);
$pdf->setDrawColor(50,50,100);
$pdf->cell(39,10,iconv('UTF-8','cp874',"รหัส"),1,0,'',true);
$pdf->cell(39,10,iconv('UTF-8','cp874',"ชื่อ - นามสกุล"),1,0,'',true);
$pdf->cell(39,10,iconv('UTF-8','cp874',"เพศ"),1,0,'',true);
$pdf->cell(39,10,iconv('UTF-8','cp874',"อุปกรณ์"),1,0,'',true);
$pdf->cell(39,10,iconv('UTF-8','cp874',"E-Mail"),1,0,'',true);
$pdf->Ln();

$onumber = $_POST['pdfview'];
$sql = "select * from orders  ";//WHERE order_number='".$onumber."'
$result = mysqli_query($conn,$sql);
while($array = mysqli_fetch_assoc($result)){
    $studentid = $array["order_number"];
    $name = $array["order_number"];
    $gander= $array["order_number"];
    $equipment= $array["order_number"];
    $email= $array["order_number"];

    $pdf->Cell(39,10,iconv('UTF-8','cp874',$studentid),1,0,"c");
    $pdf->Cell(39,10,iconv('UTF-8','cp874',$name),1,0,"c");
    $pdf->Cell(39,10,iconv('UTF-8','cp874',$gander),1,0,"c");
    $pdf->Cell(39,10,iconv('UTF-8','cp874',$equipment),1,0,"c");
    $pdf->Cell(39,10,iconv('UTF-8','cp874',$email),1,0,"c");
    $pdf->Ln();
}
$pdf->Output();
ob_end_flush();
}

?>

