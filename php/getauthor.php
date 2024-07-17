<?php
function get_all_authors($conn){
	$sql="SELECT * FROM author ";
	$st=$conn->prepare($sql);
	$st->execute();
	if($st->rowCount()>0){
		$authors=$st->fetchAll();
	}else{
		$authors=0;
	}
	return $authors;
}
function get_authorBy_id($conn,$id){
	$sql="SELECT * FROM author WHERE id=?";
	$st=$conn->prepare($sql);
	$st->execute([$id]);
	if($st->rowCount()>0){
		$author=$st->fetch();
	}else{
		$author=0;
	}
	return $author;
}