<?php 
include('../include/database.php');
header('content-type: application/json');
function GetTaskOne($link,$task_id){
		$selectSQL = "SELECT * FROM `tasks` WHERE task_id = '$task_id'";
		$selectResult = $link->query($selectSQL);
        $result = $selectResult->fetch_assoc()
	    return $result;
	}
$input = json_decode(file_get_contents("php://input"), true);
$task = GetTaskOne($link,$input['t']);
echo json_encode('task_id' = $task['task_id'] , 'title' = $task['title']  ,'description' = $task['description'] , 'user_execute' = $task['user_execute'] , 'status' = $task['status'] );
 ?>