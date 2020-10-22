<?php 
include('../include/database.php');
header('content-type: application/json');
function SetTaskDone($link,$task_id){
	$selectSQL = "UPDATE `tasks` SET status='Done' WHERE task_id = '$task_id'";
	$selectResult = $link->query($selectSQL);
}
$input = json_decode(file_get_contents("php://input"), true);
SetTaskDone($link,$input['task_id']);
echo json_encode("Task Done");
 ?>