<?php
    include("../connection/connect.php");
    if(isset($_GET['del_id'])){
        $deleteId = $_GET['del_id'];
        $sql="DELETE FROM product 
        WHERE product.product_id='".$deleteId."'";
        mysqli_query($conn,$sql)or die("Error!!!");
        echo '<script type="text/javascript">alert("ลบข้อมูลเรียบร้อย")</script>';
        header("location: admin_product");
        mysqli_close($conn);
    }
?>



