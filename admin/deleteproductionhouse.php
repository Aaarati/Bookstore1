<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM productionhouse WHERE productionhouseID=$id";
$result=mysqli_query($conn,$query);
header ("Location: dashboard.php");   

?>