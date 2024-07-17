<?php 
function get_all_category($conn){
	$sql="SELECT * FROM category";
	$st=$conn->prepare($sql);
	$st->execute();
	if($st->rowCount()>0){
		$categores=$st->fetchAll();
	}else{
		$categores=0;
	}
	return $categores;
}
function get_categoryBy_id($conn,$id){
	$sql="SELECT * FROM category WHERE id=?";
	$st=$conn->prepare($sql);
	$st->execute([$id]);
	if($st->rowCount()>0){
		$categores=$st->fetch();
	}else{
		$categores=0;
	}
	return $categores;
}