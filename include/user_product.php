<style>#l {height: 250px;width: 50%;}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/myStyle.css">
<div class="w3-white" id="tour">


<div class="w3-container" >
<div class="w3-main w3-content w3-center "">
<div class="w3-row-padding w3-padding-16 w3-center" id="item">


<?php 

require_once ('connection/connect.php');

$query = "SELECT * FROM product";

$result = mysqli_query ($conn,$query);

while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {

	
	// Display each record.
	if ($image = @getimagesize ("img/product/{$row['product_img']}")) {
		echo "   


    <div class='w3-third w3-card w3-section w3-margin-bottom w3-container w3-white'>
    
		            <img id='l' src=\"img/product/{$row['product_img']}\" alt=\"{$row['product_name']}\"   style='width:100%; height:20% class='w3-hover-opacity'>
		            <p><b>{$row['product_name']}</b></p>
		            <p class='w3-left'><b>฿{$row['product_price']}</b></p>
			    <p class='w3-right'><a class='w3-button w3-round-large w3-black'href =\"add_cart.php?pid={$row['product_id']}\">Add to cart</a></p><br/>

  
		            </div>";	
	} else {
		echo "<div align=\"center\">No image available."; 
	}
	
	
} 
	
?>
</div>
	   
</div>
</div>
</body>




