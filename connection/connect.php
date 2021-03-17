<?php
$conn = new mysqli('localhost','root','','51records_db');

if($conn->connect_errno > 0){
    die('เชื่อมต่อฐานข้อมูลไม่สำเร็จ'.$conn->connect_error);
}
?>
