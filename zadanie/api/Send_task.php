<?php 
include('../include/database.php');
header('content-type: application/json');
function SetTaskOne($link,$task_id,$user_id){
	$selectSQL = "UPDATE `tasks` SET user_execute='$user_id' WHERE task_id = '$task_id'";
	$selectResult = $link->query($selectSQL);
	}

$input = json_decode(file_get_contents("php://input"), true);
SetTaskOne($link,$input['task_id'],$input['user_id']);
echo json_encode('Task successfully submitted');
 ?>