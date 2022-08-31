<?php
session_start();
if (!isset($_SESSION['username'])){
	header('location:Adminlogin.php');
}
$productionhouseID = $_GET['productionhouseID'];
//connect to database
$conn = mysqli_connect('localhost','root','','bookstore');
//query to delete record from tbl_category with id
$sql = "DELETE FROM productionhouse WHERE productionhouseID = $productionhouseID";
//execute query
mysqli_query($conn, $sql);

//redirect to listing page
header('location:book.php');
?>