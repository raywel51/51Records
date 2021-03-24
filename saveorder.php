<title>51Records : Confirm Order</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php //head & rand
    session_start();
    include("connection/connect.php");  
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location:index');
  }

 	date_default_timezone_set('Asia/Bangkok');
		$today = date("Ymd");
   		$rand = strtoupper(substr(uniqid(sha1(time())),0,6));
   		$orderid = $today . $rand;
?>

<?php //nloop user
	$userdb = $_SESSION['username'];
	$query ="SELECT * FROM `userlogin` WHERE username='".$userdb."' ";
    $result = mysqli_query($conn, $query) or die("Error!!!");

		foreach ($result as $row){
			$username =  $row['id'];
			$email = $row['email'];
			$address = $row['address'];
			$name =  $row['name'];
		}
?>

<?php //loop product & save db
	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty) //bigloop
	{
		$sql	= "select * from product where product_id=$p_id";
		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['product_price']*$qty;
		$send   = $sum+50;
		$total	+= $sum;

		$productname = $row['product_name'];

  
		//add to db
		$sql = "INSERT INTO `orders` (product_name, quantity, price,order_number,address,userid,order_status) VALUES ('$productname', '$qty', '$send', '$orderid', '$address', '$username','pending')";
		mysqli_query($conn,$sql);
         
	} ?>
	<section class="contact-page">

       <center>
        <div class="w3-content">
  		<div class="cover w3-container menu w3-padding-32 ">
  		<div class="w3-card w3-center w3-white w3-container" >
  			</br>

   		<p class="w3-center w3-purple"><i class="fa fa-shopping-bag fa-5x" ></i></p>
   		<h2 class="w3-center">Thank You </br></h2>
   			<center><?php echo $name; ?></center>
   		<p class="w3-center w3-large">We'll see you soon</p>
   
  <?php
   echo"
		<div class=\"w3-row-padding\" style=\"margin:0 60px\">
		<div class=\"w3-half w3-hover-opacity-off\">
	    <h4 class=\"w3-center w3-purple\">Order Number</h4>
	    <p class=\"w3-center\">".$orderid."</p>

		</div>
			<div class=\"w3-half \">
				<h4 class=\"w3-center w3-purple\">COD</h4>
				<p class=\"w3-center\">within 3 days</p>
			</div>
		</div> \n";
	     
  
     	echo 'Confirmation mail has been sent';

  		echo"<center><a class=\"w3-button w3-black \" href=\"clear.php\">Done</a><br/><br/></center> \n";   

   
?>
   
			</div>	
		</div>
	</div>


	   
	   
<?php  //close bigloop ?>

