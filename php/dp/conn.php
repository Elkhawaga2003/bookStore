<?php
$host="localhost";
$dbname="book";
$pass="123456";
$uname='root';
// $conn=mysqli_connect($host,$uname,$pass,$db_name);
try{
	$conn= new PDO("mysql:host=$host;dbname=$dbname",$uname,$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PODException $e){
	echo "connection failed:".$e->getMessage();
}

