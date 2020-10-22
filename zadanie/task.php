<?php 
include('include/database.php');
session_start();
function GetTaskFilter($link,$progress,$ASC){
		$selectSQL = "SELECT * FROM `tasks` WHERE status $progress ORDER BY task_id $ASC";
		//echo $selectSQL;
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

function GetTask($link){
		$selectSQL = "SELECT * FROM `tasks`";
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
	//$tasks = GetTask($link);
	if(!empty($_GET["age"])){
		$ASC = $_GET['age'];
	}else{
		$ASC = 'ASC';
	}
	if(!empty($_GET["donne"])){
		$progress = '= "'.$_GET['donne'].'"';
	}else{
		$progress = "!= ''";
	}
	$tasks = GetTaskFilter($link,$progress,$ASC);
 ?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<?php include('include/link.php');  ?>
 	<title>Document</title>
 </head>
 <body>
 	<?php include('include/modal.php'); ?>
 	<?php include('include/header.php'); ?>
 		<form action="" method="GET" id="data">
		<div class="menu_task_box">
		<select  name="donne" form="data">
		  <option value="In Progress" >In Progress</option>
		  <option value="Done" >Done</option>
		</select>
		<select name="age" form="data">
		  <option value="ASC" >New</option> 
		  <option value="DESC" >Old</option> 
		</select>
		<button type="submit" class="filter" form="data" value="Done">Filter</button>
		</div>
		</form>
 	 <?php 
 	 if(empty($_GET['t']) || empty($_GET['status']) || empty($_GET['new'])):
 			if(!empty($tasks)):
 				
 				foreach ($tasks as $task):?>
 			 <div class="task_box" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel"><?=$task['title'];?></h5>
			      </div>
			      <div class="modal-body"><?=$task['description'];?>
			      </div>
			      <div class="modal-footer">
			        <div type="button" class="btn  op_task" data-dismiss="modal"  data-toggle="modal" data-target="#Modal_op_task<?=$task['task_id']?>">
			        	<img src="img/op.png" alt="">
			        </div>
			         <div type="button" class="btn  give_task" data-dismiss="modal"  data-toggle="modal" data-target="#Modal_give_task<?=$task['task_id']?>">
			        	<img src="img/men.png" alt="">
			        </div>
			        <div type="button" class="btn btn-primary_up done" data-id="<?=$task['task_id']?>">
			        	<img src="img/check-mark.png" alt="">
			        </div>
			     
			      </div>
			    </div>
			  </div>
			<?php endforeach;
		endif;
	endif;?>
 
 	<?php include('include/js.php');?>	
 </body>
 </html>