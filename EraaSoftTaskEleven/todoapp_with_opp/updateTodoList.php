<?php

include 'includes/header.php';
include 'includes/navigation.php';
if(!$session->check('role_user')){
  $validation->redirect('login.php');
}

if(isset($_GET['id']) && !is_numeric($_GET['id'])){
  $validation->redirect('index.php');
}
   

if(isset($_GET['id']) && is_numeric($_GET['id'])){
  $task_id = $_GET['id'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
  if(isset($_POST['update'])){

        $task = $validation->handelInput($_POST['task']);

        $form_errors = array();

        if($task == ''){
          $form_errors['task_error'] = 'Task Cann\'t be empty';
         }

        if(empty($form_errors)){

            if( $todo->updateData( $task, $task_id )  ){
                $success = 'update data success';
            }else{
                $database_error = 'try agian later!';
            }
            ?>
        <?php } // empty form_errors ?>

  <?php
  }// end 
}

?>

  <div class="admin-dashboard">
    </div>


    <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h2 class="text-center">Update Your todo list</h2>

        <?php if(isset($database_error)):?>
          <div class="container">
                    <div class='alert alert-danger text-center' style="padding: 2px 10px; max-width: 500px; margin: auto; margin-top: 5px; ">
                    <?php echo $database_error; ?>
                    </div>
          </div>
        <?php endif; ?>
        <?php if(isset($success)):?>
          <div class="container">
                    <div class='alert alert-success text-center' style="padding: 2px 10px; max-width: 500px; margin: auto; margin-top: 5px; ">
                    <?php echo $success; ?>
                    </div>
          </div>
        <?php endif; ?>

      <?php
      $count = $todo->selectDataWithCondtion($task_id)['count'];
      if($count > 0){
        $task = $todo->selectDataWithCondtion($task_id)['row'];
      foreach($task as $data){ ?>
              <form action="updateTodoList.php?id=<?php echo $data['id']?>" method="POST" class="m-auto">
              <!-- Start Username -->
              <div class="form-group">
                <label>Task:</label>
                <textarea name="task" id="" cols="30" rows="10" class="form-control" placeholder="Type what you want to do"><?php echo $data['task']; ?></textarea>
                <?php if(isset($form_errors['task_error']) && !empty($form_errors['task_error'])){ ?>
                <div class="alert alert-danger py-0 px-1"><?php echo $form_errors['task_error']; ?></div>
                <?php } ?>
              </div>
              <!-- Start Profile Image -->
              <input type="submit" class="form-control btn btn-primary d-block" value="update" name="update">
            </form>
      <?php }
      }else{
        $validation->redirect('index.php');
      }?>
        
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>


  </div>

<?php include 'includes/footer.php'; ?>
