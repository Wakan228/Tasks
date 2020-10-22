<?php 
include('../include/database.php');
session_start();
function GetID($link,$user_id){
	$selectSQL = "SELECT email FROM `users` WHERE user_id='$user_id' LIMIT 1";
	$selectResult = $link->query($selectSQL);
	$categoryData = $selectResult->fetch_assoc();
	return $categoryData;
}

function GetEmail($link,$email){
	$selectSQL = "SELECT user_id FROM `users` WHERE email='$email' LIMIT 1";
	$selectResult = $link->query($selectSQL);
	$categoryData = $selectResult->fetch_assoc();
	return $categoryData;
}
 
 function Delete($link,$user_id)
		{
			$selectSQL = "DELETE FROM `users` WHERE user_id='$user_id'LIMIT 1";

			$selectResult = $link->query($selectSQL);
		}
 function Tune($link,$user_id,$First_name,$Last_name,$Email,$Password)
		{
			$selectSQL = "UPDATE `users` SET first_name='$First_name', last_name='$Last_name', email='$Email', password='$Password' WHERE user_id = '$user_id'";
			$selectResult = $link->query($selectSQL);
		}
	if(isset($_POST['Delete'])){
		Delete($link,$_SESSION["user_id"]);
		session_destroy();
	}
	if(isset($_POST['Tune'])){
		if(GetID($link,$_SESSION["user_id"])["email"] == $_POST['email']){
			Tune($link,$_SESSION["user_id"],$_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password']);
		$_SESSION["first_name"] =$_POST['first_name'];
		$_SESSION["last_name"] = $_POST['last_name'];
		$_SESSION["password"] = $_POST['password'];
		$_SESSION["email"] = $_POST['email'];
	}else{
		if(!empty(GetEmail($link,$_POST['email']))){
			exit("Пользователь с таким Email уже зарегестрирован");
		}else{
		Tune($link,$_SESSION["user_id"],$_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password']);
		$_SESSION["first_name"] =$_POST['first_name'];
		$_SESSION["last_name"] = $_POST['last_name'];
		$_SESSION["password"] = $_POST['password'];
		$_SESSION["email"] = $_POST['email'];
		}
	}
}
header("Location:../index.php"); 
 ?>