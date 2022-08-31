<?php
include("config.php");
$id=$_GET['id'];
$query = "DELETE FROM customers WHERE customerID=$id";
$result=mysqli_query($conn,$query);
header ("Location: customerregistration.php");   

?>