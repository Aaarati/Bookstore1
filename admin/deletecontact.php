<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM contact WHERE id=$id";
$result=mysqli_query($conn,$query);
header ("Location: contact.php");   

?>