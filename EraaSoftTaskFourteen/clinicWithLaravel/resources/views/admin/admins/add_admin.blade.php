@extends('templates.TemplateAdmins.master')
@section('title', 'add admin')
@section('content')

<!-- Start Main Body -->
  <div class="main-body">
   <div class="container">
    <div class="row">
      <div class="form-box">
        <h2 class="text-center">Add New admin</h2>

        <a class="btn btn-danger mb-5" href="admins_list.php?page=1">admins list</a>

        <form action="validateForms/admins/add_admin.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label>Name:</label>
            <input class="form-control" type="text" name="username" placeholder="admin name">
          </div>

          <div class="form-group">
            <label>Phone:</label>
            <input class="form-control" type="text" name="phone" placeholder="admin phone">
          </div>


          <div class="form-group">
            <label>Email:</label>
            <input class="form-control" type="email" name="email" placeholder="admin email">
          </div>


          <div class="form-group">
            <label>Password:</label>
            <input class="form-control" type="password" name="password" placeholder="admin password">
          </div>

          <div class="form-group">
            <label>Role: is admin</label>
            <input class="form-control" type="hidden" name="role" placeholder="Role" value="admin">
          </div>


        <div class="form-group">
        <label>Image:</label>
        <input class="form-control" type="file" name="image" >
        </div>

          <input type="submit" class="btn btn-primary" value="add admin" name="add_admin">
         </form>
       </div>
      </div>
    </div>
  </div>


<!-- End Main Body -->
@endsection
