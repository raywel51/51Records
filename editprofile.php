<?php 
    error_reporting (E_ALL ^ E_NOTICE);
    session_start();
    include("connection/connect.php");
    if(isset($_GET['edit_id'])){ //เมื่อรับค่า update_id มา
      $edit_id = $_GET['edit_id'];
      $query ="   SELECT *
                  FROM  userlogin
                  WHERE id='".$edit_id."' " ;
  
      $result = mysqli_query($conn,$query);
  
      while($arr1 = mysqli_fetch_array($result)){

  ?>
  ?>
<link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-32x32.png?v=201701041855" sizes="32x32">
<link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-16x16.png?v=201701041855" sizes="16x16">
<link rel="stylesheet" type="text/css" href="css/userlogin.css">
<title>51Records : แก้ไขข้อมูลสมาชิค</title>
<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <p>Edit Page</p>
      <img src="img/website/logo_black.png" id="icon" alt="User Icon" />
    </div>

    <form action="editprofile" method="post" enctype="multipart/form-data">
      <input type="text" id="login" class="fadeIn second" name="username" value="<?php echo $arr1['username'];?>">
      <input type="email" id="email" class="fadeIn second" name="email" value="<?php echo $arr1['email'];?>">
      <input type="text" id="password" class="fadeIn third" name="pw" value="<?php echo $arr1['password'];?>">
      <input type="text" id="tel" class="fadeIn third" name="tel"value="<?php echo $arr1['tel'];?>">
      <input type="text" id="address" class="fadeIn third" name="address" value="<?php echo $arr1['address'];?>">
      <input type="file" id="file" class="fadeIn third" name="file" value="<?php echo $arr1['img'];?>">
      <input type="submit" class="fadeIn fourth" value="Edit" name="Edit">
        
    </form>


  </div>
</div>

<?php
    }// end while

}// end if(isset($_GET['update_id']))

?>

<?php
if(isset($_POST['Edit'])){ //เมื่อกดปุ่มแก้ไข
    $sql = "UPDATE `userlogin` 
            SET bakname = '".$_POST['name']."' , bakpicture = '".$_POST['fileupload']."', bakprice = '".$_POST['price']."', bakdetail = '".$_POST['dtell']."', baktype = '".$_POST['type']."'
            WHERE bakid = '".$_POST['id']."' ";

            echo $sql;

    mysqli_query($conn,$sql);
    echo "ปรับปรุงข้อมูลเรียบร้อยแล้ว!!!";

}

?>