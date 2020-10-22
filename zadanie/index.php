<?php 
include('include/database.php');
session_start();
function GetTask($link,$user_id){
		$selectSQL = "SELECT * FROM `tasks` WHERE user_execute = '$user_id' AND status != 'Done'";
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
$tasks = GetTask($link,$_SESSION['user_id']);
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

 	<?php if(!empty($_SESSION['user_id'])):?>
 		<div class="container main">
 		<div class="main_menu">
		 		<div type="button" data-toggle="modal" data-target="#Modal_add_task" class="task-add">
		 			<img src="img/plus.png" alt="">
		 		</div>
	 		<a href="users.php">
		 		<div class="task-add user_img">
		 			<img src="img/user.png" alt="">
		 		</div>
	 		</a>
	 		<a href="task.php">
		 		<div class="task-add user_img">
		 			<img src="img/task.png" alt="">
		 		</div>
	 		</a>
 		</div>
 		<div class="main_task">
 			<?php 
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
		endif;?>
 		</div>
 	</div>
 	<?php endif; ?>
 	
 	<?php include('include/js.php');?>	
 </body>
 </html>