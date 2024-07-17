<?php 
include "dp/conn.php";
if(isset($_POST['submit'])){
	$id=$_POST['category_id'];
	$name=$_POST['category_name'];
	$sql="UPDATE category SET name=? WHERE id=?";
	$st=$conn->prepare($sql);
	$st->execute([$name,$id]);
	$c="update is done";
	header("location:../admain.php?x=$c");
}else{
	header("location:../edite-category.php");
}