<?php
if(isset($_POST['submit'])){
	include "dp/conn.php";
	$id=$_POST['book_id'];
	$title=$_POST['book_title'];
    $description=$_POST['book_description'];
	$autor_id=$_POST['author_id'];
	$category_id=$_POST['category_id'];
	$current_cover=$_POST['current_cover'];
	$current_file=$_POST['current_file'];
	$cover=$_FILES['cover'];
	$file =$_FILES['book_file'];
	if(!isset($file['name'])){
		if(!isset($cover['name'])){

$sql="UPDATE books SET title=?,
						author_id=?,
					   description=?,
					   catogray_id=?
					   WHERE id=?";
$st=$conn->prepare($sql);
$st->execute([$title,$autor_id,$description,$category_id,$id]);
$c="update is done!";
header("location:../admain.php?x=$c");
}else{
	$allowed_access = array("jpg","jpeg","png");
	$status=uploadfile($cover,$allowed_access,"icons");
	if($status['status']=="good"){
	$allowed_access = array("pdf","dox","pptx");
	$file=uploadfile($file,$allowed_access,"files");
	if($file['status']=="good"){
		$file_url=$file['data'];
		$cover_url=$status['data'];
		$sql="UPDATE  books SET title=?,
								author_id=?,
								description=?,
								catogray_id=?,
								cover=?,
								file=?
								WHERE id=?";
					$st=$conn->prepare($sql);
					$st->execute([$title,$autor_id,$description,$category_id,$cover_url,$file_url,$id]);
					$c="update is done!";
header("location:../admain.php?x=$c");
}else{
header("location:../edite-book.php");	
}
}else{
header("location:../edite-book.php");	
}
}
}
}else{
header("location:../edite-book.php");	
}
