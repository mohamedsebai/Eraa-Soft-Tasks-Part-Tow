@extends('templates.TemplateAdmins.master')
@section('title', 'admin list')
@section('content')
<!-- Start Main Body -->
<div class="main-body">
 <div class="container">
  <div class="row">
    <div class="responsive-table m-auto">
      <h2 class="text-center">admins List</h2>
      <a class="btn btn-danger mb-5" href="add_admin.php">Add new Admin</a>



      <table class="table-bordered">
       <thead class="text-center">
         <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Image</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Role</th>
          <th>created at</th>
          <th>option</th>
        </tr>
       </thead>
        <tbody class="text-center">

                <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <img src="" alt="" width="100" height="100">
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    <a href="" class="btn btn-danger custom-btn"><i class="fa fa-close"></i>Delete</a>
                    </td>
                </tr>
                <div class="alert alert-danger">There is no admins yet</div>


        </tbody>
      </table>

      </div>

    </div>
   </div>

 </div>
</div>
<!-- End Main Body -->
@endsection
