<style>#l {height: 250px;width: 50%;}</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/myStyle.css">
<div class="w3-white" id="tour">


<div class="w3-container" >
<div class="w3-main w3-content w3-center">
<div class="w3-row-padding-padding w3-padding-0 w3-center " id="item">


<?php 

include('connection\connect.php');

$query = "SELECT * FROM product";

$result = mysqli_query ($conn,$query);

while ($db = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {

	
	if ($image = @getimagesize ("img/product/{$db['product_img']}")) { ?>


    <div class='w3-col s4 w3-card w3-section w3-margin-bottom w3-container w3-white w3-col'>
    
		<img id='l' src="img/product/<?php echo $db['product_img'];?>" alt="<?php echo $db['product_name'];?>"   style='width:150px; height:150px; class='w3-hover-opacity'>
		<p><b><?php echo $db['product_name'];?></b></p>
		<p class='w3-left'><b>฿<?php echo $db['product_price'];?></b></p>
		<p class='w3-right'><?php echo "<a class='w3-button w3-round-large w3-black' href='cart.php?p_id=$db[product_id]&act=add'>Add to cart</a></p><br/> "; ?>
  	</div>


	<?php } else {
		echo "<div align=\"center\">No image available."; 
	}
	
	
} 
	
?>
</div>
	   
</div>
</div>
</body>




