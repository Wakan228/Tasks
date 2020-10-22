<?php 
include('include/database.php');
session_start();
function GetUsers($link){
    $selectSQL = "SELECT * FROM `users";
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
$users = GetUsers($link);
function GetTaskUser($link,$user_id){
    $selectSQL = "SELECT * FROM `tasks` WHERE user_execute = '$user_id'" ;
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
$users = GetUsers($link);
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
 	<?php include('include/header.php'); ?>
 	<div class="container">
 	<?php
    $count=10;
    $p = isset($_GET["p"]) ? (int) $_GET["p"] : 0;
      for ($i= $p*$count; $i < ($p+1)*$count; $i++):?>
 			<div class="main_user row justify-content-center">
 				<div class="head_box_user">
 					<div class="row">
 						<div class="col id_user">
 							ID : <?php echo  $users[$i]["user_id"]; ?>
 						</div>
 						<div class="col name_user">
 							Name : <?php echo $users[$i]["first_name"]; ?>
 						</div>
 						<div class="col surname_user">
 							Surname : <?php echo $users[$i]["last_name"]; ?>
 						</div>
 					</div>
 				</div>
                <div class="body_box_user">
                    <div class="task_user">
                        <?php 
                        $user_tasks = GetTaskUser($link,$users[$i]["user_id"]);
                        if(!empty($user_tasks)){
                            echo 'Task : ';
                        }
                        if(!empty($user_tasks)){
                        foreach ($user_tasks as $user_task) {
                            echo '<a class="task_user_a"href="task.php?t='.$user_task['task_id'].'">'.$user_task['task_id'].'</a>';
                        }
                        } ?>
                    </div>
                </div>
 			</div>
 	<?php endfor; ?>
    <?php 
    $len = ceil(count($users) / $count);

     ?>
     <nav aria-label="Статьи по Bootstrap 4">
    <ul class="pagination justify-content-center">
                <?php for ($i=0; $i < $len; $i++) { 
                  echo '<li class="page-item"><a class="page-link" href="?p='.$i.'">'.($i+1).'</a></li>';
               } ?>
        </ul>
    </nav>
 	</div>

 	<?php include('include/js.php');?>	
 </body>
 </html>