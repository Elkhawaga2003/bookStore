<?php
if($_POST['submit']){
	include "dp/conn.php";
$name=$_POST['author_name'];
$id=$_POST['author_id'];
$sql="UPDATE author SET name=? WHERE id=?";
$st=$conn->prepare($sql);
$st->execute([$name,$id]);
$c="update is done!";
header("location:../admain.php?x=$c");
}else{
	header("location:../edite-author.php");
}