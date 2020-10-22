<?php 
include('../include/database.php');
	echo $_GET["age"];
	echo $_GET["donne"];
function GetTaskOne($link,$progress,$ASC){
		$selectSQL = "SELECT * FROM `tasks` WHERE status = '$progress' AND ORDER BY task_id $ASC";
		$selectResult = $link->query($selectSQL);
        if ($selectResult->num_rows > 0) {
	    	 $cat = array();
	    	 while($result = $selectResult->fetch_assoc()){
	    	 	array_push($cat,$result);
	    	 }
	        return $cat;
	    }
	    return false;
	}

if(!empty($_GET['new'])){
	$progress = $_GET['new'];
}else{
	$progress = '';
}

 ?>