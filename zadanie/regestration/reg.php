<?php 
include('../include/database.php');
header('content-type: application/json');
$error =  array();
$info = json_decode(file_get_contents("php://input"), true);

function GetEmail($link,$email){
	$selectSQL = "SELECT user_id FROM `users` WHERE email='$email'  LIMIT 1";
	$selectResult = $link->query($selectSQL);
	$categoryData = $selectResult->fetch_assoc();
	return $categoryData;
}

function SetId($link,$First_name,$Last_name,$Email,$Password){
	$selectSQL = "INSERT INTO `users` (first_name,last_name,email,password) VALUES('$First_name','$Last_name','$Email','$Password')";
	$selectResult = $link->query($selectSQL);
}

	if (isset($info['First_name'])) { $First_name = $info['First_name']; if ($First_name == '') { unset($First_name);} }
  if (isset($info['Last_name'])) { $Last_name=$info['Last_name']; if ($Last_name =='') { unset($Last_name);} }
  if (isset($info['Email'])) { $Email=$info['Email']; if ($Email =='') { unset($Email);} }
  if (isset($info['Password'])) { $Password=$info['Password']; if ($Password =='') { unset($Password);} }

  if (empty($First_name) or empty($Last_name) or empty($Email) or empty($Password))
    {
   array_push($error,"Введены не все данные!");

    }
       $First_name = stripslashes($First_name);
  		 $First_name = htmlspecialchars($First_name);
  		 $Last_name = stripslashes($Last_name);
  		 $Last_name = htmlspecialchars($Last_name);
 			 $Email = stripslashes($Email);
   		 $Email = htmlspecialchars($Email);
   		 $Password = stripslashes($Password);
   		 $Password = htmlspecialchars($Password);
   		  //удаляем лишние пробелы
		    $First_name = trim($First_name);
		    $Last_name = trim($Last_name);
		    $Email = trim($Email);
		    $Password = trim($Password);

		    $Check = GetEmail($link,$Email);
    if (!empty($Check['user_id'])) {
      array_push($error,"Пользователь с таким Email или паролем уже зарегестрирован");
    }
    if(!empty($error)){
      echo json_encode(array_pop($error));
    }else{
		SetId($link,$First_name,$Last_name,$Email,$Password);
		echo json_encode("Вы успешно зарегестрированы");
    }
    
  
 ?>