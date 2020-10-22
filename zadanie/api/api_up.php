<?php 
header('content-type: application/json');
$input = json_decode(file_get_contents("php://input"), true);
echo $input["Last_name"];
//echo json_encode($input);
?>