<?php 
include('../include/database.php');
header('content-type: application/json');
 function Delete_task($link,$task_id){
 	$selectSQL = "DELETE FROM `tasks` WHERE task_id='$task_id'LIMIT 1";
	$selectResult = $link->query($selectSQL);
}
$input = json_decode(file_get_contents("php://input"), true);
Delete_task($link,$input['task_id']);
echo json_encode("Task removed");
 ?>