<?php
include 'includes/header.php';

if(!$session->check('role_user')){
  $validation->redirect('login.php');
}

include 'includes/navigation.php';
?>

  <div class="admin-dashboard">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
                <div class="container">
                    <div class='alert alert-success' style="padding: 2px 10px; max-width: 500px; margin: auto; margin-top: 5px; ">
                    <?php echo 'welcome back:=> ' . $session->get('role_user_email'); ?>
                    </div>
                    <img src="uploaded_imgs\<?php echo $session->get('role_user_img'); ?>" width="300" height="300">
                </div>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include 'includes/footer.php'; ?>
