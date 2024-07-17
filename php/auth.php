<?php 
session_start();

if (isset($_POST['email']) && 
	isset($_POST['password'])) {
include"dp/conn.php";
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$sql="SELECT * FROM user WHERE email=?";
	$st=$conn->prepare($sql);
	$st->execute([$email]);
	if($st->rowCount()===1){
		$user=$st->fetch();
		$user_id=$user['id'];
		$user_email=$user['email'];
		$user_pass=$user['password'];
		if($email==$user_email){
			if(password_verify($pass, $user_pass)){
				$_SESSION['user_id']=$user_id;
				$_SESSION['user_email']=$user_email;
				header('location:../admain.php');
			}else{
				$err='make sure that your password is correct!';
		header("location:../login.php?error=$err");
			}
		}
	}else{
		$err='you are not accept';
		header("location:../login.php?error=$err");
	}
	}else {
	# Redirect to "../login.php"
	header("Location: ../login.php");
}
