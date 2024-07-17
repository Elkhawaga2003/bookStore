<?php 
include "func-addFile.php";
include "dp/conn.php";
if(isset($_POST['submit'])){
	$title=$_POST['book_title'];
    $description=$_POST['book_description'];
	$autor_id=$_POST['author_id'];
	$category_id=$_POST['category_id'];
	$cover=$_FILES['cover'];
	$file=$_FILES['book_file'];
	$allowed_access = array("jpg","jpeg","png");
	$status=uploadfile($cover,$allowed_access,"icons");
	if($status['status']=="good"){
	$allowed_access = array("pdf","dox","pptx");
	$file=uploadfile($file,$allowed_access,"files");
	if($file['status']=="good"){
		$file_url=$file['data'];
		$cover_url=$status['data'];
		$sql="INSERT INTO books (title,
								author_id,
								description,
								catogray_id,
								cover,
								file)
					VALUES  (?,?,?,?,?,?)";
					$st=$conn->prepare($sql);
					$st->execute([$title,$autor_id,$description,$category_id,$cover_url,$file_url]);
		$c='added sucussfully';
		header("location:../admain.php?x=$c");
			}else{
		$c=$file['data'];
		header("location:../admain.php?x=$c");
	}
	}else{
		$c=$status['data'];
		header("location:../admain.php?x=$c");
	}
}else{
		header("location:../admain.php?x=$c");
}