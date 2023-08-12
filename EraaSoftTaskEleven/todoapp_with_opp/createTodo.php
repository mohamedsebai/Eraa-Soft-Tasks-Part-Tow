<?php
include 'includes/header.php';
include 'includes/navigation.php';
if(!$session->check('role_user')){
  $validation->redirect('login.php');
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
  if(isset($_POST['createTodo'])){

        $task = $validation->handelInput($_POST['task']);

        $user_id = $session->get('role_user_user_id');

        $form_errors = array();

        if($task == ''){
          $form_errors['task_error'] = 'Task Cann\'t be empty';
         }

        if(empty($form_errors)){

            if( $todo->insertData( $task,$user_id )  ){
                $success = 'data inserted success';
            }else{
                $database_error = 'try agian later!';
            }
            ?>
        <?php } // empty form_errors ?>

  <?php
  }// end 
}




?>
<?php
    if(isset($success)){
        ?>
          <div class="container">
              <div class='alert alert-success' style="padding: 2px 10px; max-width: 500px; margin: auto; margin-top: 5px; ">
              <?php echo $success; ?>
              </div>
          </div>
        <?php
    }
?>
<?php
    if(isset($database_error)){
        ?>
          <div class="container">
              <div class='alert alert-danger' style="padding: 2px 10px; max-width: 500px; margin: auto; margin-top: 5px; ">
              <?php echo $database_error; ?>
              </div>
          </div>
        <?php
    }
?>
  <div class="admin-dashboard">
    </div>


    <div class="container">
    <div class="row"> 
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h2 class="text-center">Create Somthing special today</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="m-auto">
          <!-- Start Task -->
          <div class="form-group">
            <label>Task:</label>
            <textarea name="task"  cols="30" rows="10" class="form-control" placeholder="Type what you want to do"></textarea>
            <?php if(isset($form_errors['task_error']) && !empty($form_errors['task_error'])){ ?>
                <div class="alert alert-danger py-0 px-1"><?php echo $form_errors['task_error']; ?></div>
            <?php } ?>
          </div>
          <!-- Start Profile Image -->
          <input type="submit" class="form-control btn btn-primary d-block" value="Add" name="createTodo">
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>


  </div>

<?php include 'includes/footer.php'; ?>
