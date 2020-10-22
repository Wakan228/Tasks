<?php 
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
    $user_giveeds = GetUsers($link);
 ?>
 <div class="modal fade" id="Modal_in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../regestration/sign_in.php" method="POST">
      	 <input type="text" class="input_up input" name="email" placeholder="Email">
         <input type="password" class="input_up input" name="password" placeholder="Password">

      </div>
      <div class="modal-footer">
        <button  type="button"class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary_in">Sign in</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- ///////////////////////////////////////////////// -->
 <div class="modal fade" id="Modal_up" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
       <div class="input_box">
       	<div class="row">
       		<div class="col-6 justify-content-center">
       			<input class="input_name first_name input"type="text" name="first_name" placeholder="First name">
       		</div>
       		<div class="col-6">
       			<input class="input_name last_name input"type="text" name="last_name" placeholder="Last name">
       		</div>
       	</div>
       <input type="email" class="input_up Email_up input" name="email" placeholder="Email">
       <input type="password" class="input_up Password_up input" name="password" placeholder="Password">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary_up btn_sign_up">Sign up</button>
      </div>
    </div>
  </div>
</div>
<!-- /////////////////////////////////////////////// -->
<div class="modal fade" id="Modal_customization" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="../regestration/delete.php" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Сustomization</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
       <div class="input_box">
        <div class="row">
          <div class="col-6 justify-content-center">
            Name <input class="input_name first_name input"type="text" name="first_name" value='<? echo $_SESSION["first_name"]?>'>
          </div>
          <div class="col-6">
            Surname<input class="input_name last_name input"type="text" name="last_name" value='<? echo $_SESSION["last_name"]?>'>
          </div>
        </div>
       Email<input type="text" class="input_up Email_up input" name="email" value='<? echo $_SESSION["email"]?>'>
       Password<input type="text" class="input_up Password_up input" name="password" value='<? echo $_SESSION["password"]?>'>
       </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="Delete"class="btn btn_delete">Delete</button>
        <button type="submit" name="Tune"class="btn btn-primary_up tune">Tune</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////// -->
<div class="modal fade" id="Modal_add_task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <input type="text"placeholder="Title" class="title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
       <div class="input_box">
        <textarea type="text" class="description">
          
        </textarea>
       </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="Tune"class="btn add_task">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- ///////////////////////////////////////////////////// -->
<?php if(!empty($_SESSION['user_id'])):
       if(!empty($tasks)):
      foreach ($tasks as $task): ?>
<div class="modal fade" id="Modal_give_task<?=$task['task_id']?>" tabindex="-1" role="dialog" data-id="<?=$task['task_id']?>" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog_give" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Give</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
       <div class="input_box">
        <?php foreach ($user_giveeds as $user_giveed):?>
          <div class="main_user">
          <div class="row">
            <div class="col id_user">
              ID : <?php echo  $user_giveed["user_id"]; ?>
            </div>
            <div class="col name_user">
               <?php echo $user_giveed["first_name"]; ?>
            </div>
            <div class="col surname_user">
              <?php echo $user_giveed["last_name"]; ?>
            </div>
            <div class="col btn_gived btn" data-task-id="<?=$task['task_id']?>" data-user-id="<?=$user_giveed['user_id']?>">
              Give 
            </div>
          </div>
        </div>
        <?php endforeach; ?>
       </div>
      </div>
    </div>
  </div>
</div>
<?php
endforeach;  
endif; 
endif;?>
<!-- ///////////////////////////////////////////////////// -->
<?php
if(!empty($_SESSION['user_id'])):
  if(!empty($tasks)):
 foreach ($tasks as $task):?>
  <div class="modal fade" id="Modal_op_task<?=$task['task_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <input type="text" value="<?=$task['title']?>" id="task_title<?=$task['task_id']?>" class="title">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">            
       <div class="input_box">
        <textarea type="text" value="<?=$task['description']?>" id="task_description<?=$task['task_id']?>"></textarea>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="Tune"class="btn op_task_delete" data-id="<?=$task['task_id']?>">Delete</button>
        <button type="submit" name="Tune"class="btn op_task_tune" data-id="<?=$task['task_id']?>">Tune</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach;
endif; 
endif;?>
