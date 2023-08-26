@extends('templates.TemplateAdmins.master')
@section('title', 'update profile')
@section('content')
<!-- Start Main Body -->
  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box">
        <h2 class="text-center">Update Admin profile</h2>

        <a class="btn btn-danger mb-5" href="change_password.php">Change Password</a>

        <form action="validateForms/profile/update_profile.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="username" placeholder="admin name" value="">
          </div>

          <div class="form-group">
            <label>Phone:</label>
            <input class="form-control" type="text" name="phone" placeholder="admin phone" value="">
          </div>


          <div class="form-group">
            <label>Email:</label>
            <input class="form-control" type="text" name="email" placeholder="admin email" value="">
          </div>

        <div class="form-group">
        <label>Image:</label>
        <input class="form-control" type="file" name="image" >
        </div>

          <input type="submit" class="btn btn-primary" value="update profile" name="update_profile">
         </form>
       </div>
      </div>
    </div>
  </div>


<!-- End Main Body -->
@endsection
