<?php 
include('../include/database.php');
session_start();
header('content-type: application/json');
function SetTask($link,$title,$description,$user_execute,$status){
	$selectSQL = "INSERT INTO `tasks` (title,description,user_execute,status) VALUES('$title','$description','$user_execute','$status')";
	$selectResult = $link->query($selectSQL);
}
$input = json_decode(file_get_contents("php://input"), true);
if(empty($input["title"]) || empty($input["description"])){
echo json_encode("Write title or description!");
}else{
SetTask($link,$input["title"],$input["description"],$_SESSION['user_id'],"In Progress");
echo json_encode("Task Added");
}
?>