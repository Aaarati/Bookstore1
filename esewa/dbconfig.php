<?php

$conn = mysqli_connect("localhost","root","","esewa");
if( $conn ->connect_error)
{
	echo "Failed to connect to MySQL". $conn->connect_error;
	exit;
}