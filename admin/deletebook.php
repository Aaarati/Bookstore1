<?php
include("config.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM books WHERE id=$id";
$result=mysqli_query($conn,$query);
header ("Location: book.php");   

?>