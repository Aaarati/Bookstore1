<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM about WHERE id=$id";
$result=mysqli_query($conn,$query);
header ("Location: about.php");   

?>