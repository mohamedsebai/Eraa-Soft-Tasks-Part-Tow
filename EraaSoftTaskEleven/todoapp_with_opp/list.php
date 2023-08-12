<?php

include 'includes/header.php';

if(!$session->check('role_user')){
  $validation->redirect('login.php');
}

include 'includes/navigation.php';



// delete
if(isset($_GET['delete_id']) && !is_numeric($_GET['delete_id'])){
  $validation->redirect('index.php');
}
    
if(isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])){
  $todo->deleteData($_GET['delete_id'], $session->get('role_user_user_id'));
  $success = 'deleted success';
}

?>
<div class="profile_page">
  <div class="container">
    <h2 class="text-center">My list Todo for user name is : <?php echo $session->get('role_user_email'); ?></h2>
      <div class="profile_info">
      <div class="row">

        <?php if(isset($error)) : ?>
          <div class="container">
              <div class='alert alert-danger' style="padding: 2px 10px; max-width: 500px; margin: auto; margin-top: 5px; ">
              <?php echo $error; ?>
              </div>
          </div>
        <?php endif; ?>

        <?php if(isset($success)) : ?>
          <div class="container">
              <div class='alert alert-success' style="padding: 2px 10px; max-width: 500px; margin: auto; margin-top: 5px; ">
              <?php echo $success; ?>
              </div>
          </div>
        <?php endif; ?>
      

      <table class="table table-sm table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Task</th></th>
            <th scope="col">Options</th>
          </tr>
        </thead>
          <tbody>
            <?php
            $count = $todo->selectData($session->get('role_user_user_id'))['count'];
            if($count > 0){
              $tasks = $todo->selectData($session->get('role_user_user_id'))['row'];
              foreach( $tasks as $data){
            ?>
            <tr>
              <td><?php echo $data['id']; ?></td>
              <td><?php echo $data['task']; ?></td>
               <td>
                <a class="btn btn-primary" href="updateTodoList.php?id=<?php echo $data['id']; ?>">update</a>
                <a class="btn btn-danger" href="list.php?delete_id=<?php echo $data['id']; ?>">delete</a>
               </td>
            </tr>
            <?php } 
          }else{ ?>
          <div class="container">
              <div class='alert alert-danger' style="padding: 2px 10px; max-width: 500px; margin: auto; margin-top: 5px; ">
              There is Task Yet! try to add one
              </div>
          </div>
          <?php } ?>
          </tbody>
      </table>
      </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
