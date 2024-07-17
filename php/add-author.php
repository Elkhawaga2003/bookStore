<?php
include "dp/conn.php";
if(isset($_POST['submit'])){
	$name=$_POST['author_name'];
	$sql="INSERT INTO author (name) VALUES (?)";
	$st=$conn->prepare($sql);
	$st->execute([$name]);
	header('location:../admain.php');
}else{
	header('location:../add-author.php');
}