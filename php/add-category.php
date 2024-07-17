<?php
include "dp/conn.php";
if(isset($_POST['submit'])){
	$category_name=$_POST['category_name'];
	$sql="INSERT INTO category (name) VALUES (?)";
	$st=$conn->prepare($sql);
	$st->execute([$category_name]);
	header("location:../admain.php");

}else{
	header("location:../add-category");
}