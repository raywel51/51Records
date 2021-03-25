<?php session_start();if (!isset($_SESSION['username'])){header("location:login");} ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-32x32.png?v=201701041855" sizes="32x32">
    <link rel="icon" type="image/png" href="https://bulma.io/favicons/favicon-16x16.png?v=201701041855" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

	<div class="contact1">



			<form class="contact1-form validate-form" action="require.php" id="myform" method="POST" enctype="multipart/form-data">
				<span class="contact1-form-title">
					Require Product : <?php echo $_SESSION['username']; ?>
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="namep" placeholder="ชื่อสินค้า">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea class="input1" name="subject" placeholder="ลายละเอียด"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn" >
					<input type="submit" class="contact1-form-btn summit" name="add" value="Add Data">
				</div>
			</form>
		
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

<?php 
    include('connection\connect.php');

	$userdb = $_SESSION['username'];
	$query ="SELECT * FROM `userlogin` WHERE username='".$userdb."' ";
    $result = mysqli_query($conn, $query) or die("Error!!!");

		foreach ($result as $row){
			$username =  $row['name'];}
    
    if (isset($_POST['add'])) {
        $name = $_SESSION['username'];
        $name1 = $_POST['namep'];
		$subject = $_POST['subject'];

                $sql = "INSERT INTO `require0`(`name`, `namep`, `message`) VALUES ('$username', '$name1', '$subject')";
                mysqli_query($conn, $sql);

            } else {
                echo "<script type='text/javascript'>alert('ข้อมูลไม่ถ฿กต้อง');</script>";
            }
    

?>
