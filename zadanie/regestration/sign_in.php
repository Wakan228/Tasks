<?php 
include('../include/database.php');
session_start();
		function GetLOgin($link,$email,$password)
		{
			$selectSQL = "SELECT * FROM `users` WHERE email='$email' AND password = '$password' LIMIT 1";
			$selectResult = $link->query($selectSQL);
			$categoryData = $selectResult->fetch_assoc();
			return $categoryData;
		}
if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} }
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (empty($email) or empty($password)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);

    $email = trim($email);
    $password = trim($password);
    $person = GetLOgin($link,$email,$password);
    if (empty($person['user_id']))
    {

        header("Location:../index.php"); exit("Email или пароль введены не верно!");
    }
    else {
    $_SESSION['user_id'] = $person['user_id'];
    $_SESSION['first_name'] = $person['first_name'];
    $_SESSION['last_name'] = $person['last_name'];
    $_SESSION['password'] = $person['password'];
    $_SESSION['email'] = $person['email'];
    header("Location:../index.php"); exit;
    }

 ?>