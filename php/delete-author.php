<?php
	include "dp/conn.php";
		include "dp/conn.php";
		$id=$_GET['id'];
		if(isset($id)){
	$sql="DELETE FROM  author WHERE id=?";
	$st=$conn->prepare($sql);
    $st->execute([$id]);
	$c="delete is done!";
	header("location:../admain.php?x=$c");
}else{
	$c="Erorr on delete!";
	header("location:../admain.php?x=$c");

}