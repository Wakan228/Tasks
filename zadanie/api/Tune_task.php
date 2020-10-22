<?php 
include('../include/database.php');
header('content-type: application/json');
function SetTaskDone($link,$task_id,$title,$description){
	$selectSQL = "UPDATE `tasks` SET title='$title' ,description='$description' WHERE task_id = '$task_id'";
	$selectResult = $link->query($selectSQL);
}
$input = json_decode(file_get_contents("php://input"), true);
SetTaskDone($link,$input['task_id'],$input['title'],$input['description']);
echo json_encode("Task Tune");
 ?>