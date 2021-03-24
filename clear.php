<?php 
    session_start();
    include("connection/connect.php");  

echo ($_SESSION['cart']);
unset($_SESSION['cart']);

header('location:index');
?>