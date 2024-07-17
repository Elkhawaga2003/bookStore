<?php
	include "dp/conn.php";
		include "dp/conn.php";
		$id=$_GET['id'];
		if(isset($id)){
	$sql="DELETE FROM  books WHERE id=?";
	$st=$conn->prepare($sql);
    $st->execute([$id]);
    // $the_book=$st->fetch();
    // $cover=$the_book['cover'];
    // $file=$the_book['file'];
    $c_b_c="../uploads/icons/$cover";
    $c_f="../uploads/files/$file";
    unlink($c_b_c);
    unlink($c_f);
	$c="delete is done!";
	header("location:../admain.php?x=$c");
}else{
	$c="Erorr on delete!";
	header("location:../admain.php?x=$c");

}