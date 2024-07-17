<?php
function get_all_books($conn){
	$sql="SELECT * FROM books ORDER bY id DESC";
	$st=$conn->prepare($sql);
	$st->execute();
	if($st->rowCount()>0){
		$books=$st->fetchAll();
	}else{
		$books=0;
	}
	return $books;
}
function get_bookBy_id($conn,$id){
	$sql="SELECT * FROM books WHERE id=?";
	$st=$conn->prepare($sql);
	$st->execute([$id]);
	if($st->rowCount()>0){
		$book=$st->fetch();
	}else{
		$book=0;
	}
	return $book;
}
function search_book($conn,$key){
	$key="%{$key}%";
	$sql="SELECT * FROM books WHERE title LIKE ?
									OR description LIKE ? ";
	$st=$conn->prepare($sql);
	$st->execute([$key,$key]);
	if($st->rowCount()>0){
		$books=$st->fetchAll();
	}else{
		$books=0;
	}
	return $books;
}
function get_books_by_category($conn,$id){
	$sql="SELECT * FROM books WHERE catogray_id=?";
	$st=$conn->prepare($sql);
	$st->execute([$id]);
	if($st->rowCount()>0){
		$book=$st->fetchAll();
	}else{
		$book=0;
	}
	return $book;
}
function  get_books_by_auhtor($conn,$id){
	$sql="SELECT * FROM books WHERE author_id=?";
	$st=$conn->prepare($sql);
	$st->execute([$id]);
	if($st->rowCount()>0){
		$book=$st->fetchAll();
	}else{
		$book=0;
	}
	return $book;
}