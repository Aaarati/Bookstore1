<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM orders WHERE order_number=$id";
$result=mysqli_query($conn,$query);
header ("Location: orders.php");   

?>