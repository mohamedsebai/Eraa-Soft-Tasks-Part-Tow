@extends('templates.TemplateAdmins.master')
@section('title', 'users list')
@section('content')
<div class="main-body">
 <div class="container">
  <div class="row">
    <div class="responsive-table m-auto">

      <h2 class="text-center">Users List</h2>
      <table class="table-bordered">
       <thead class="text-center">
         <tr>
          <th>ID</th>
          <th>Profile Image</th>
          <th>full name</th>
          <th>Email</th>
          <th>gender</th>
          <th>country</th>
          <th>Comment Count</th>
          <th>Status</th>
          <th>option</th>
        </tr>
       </thead>
        <tbody class="text-center">
            <tr>
              <td></td>
              <td><img src="" width="50"></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
              </td>
              <td>
                  <a href="" class="btn btn-info custom-btn">
                    <i class="fa fa-close"></i>Approve
                  </a>
                  <a href="" class="btn btn-info custom-btn">
                    <i class="fa fa-close"></i>Unapproved
                  </a>
              </td>
              <td>
                  <span class="btn btn-danger custom-btn" style="cursor: not-allowed; background-color: #5f1c1cc4;">You</span>
                  <span class="btn btn-danger custom-btn" style="cursor: not-allowed; background-color: #5f1c1cc4;">Admin</span>
                <a href="" class="btn btn-danger custom-btn">
                  <i class="fa fa-close"></i>Delete
                </a>
             </td>
            </tr>
             <div class="alert alert-info">there is no users yet</div>
        </tbody>
      </table>
    </div>
   </div>
   <div class="order-list">
     <ul class="list-unstyled">
       <a href="">1</a>
       <a href="">2</a>
       <a href="">3</a>
     </ul>
   </div>
 </div>
</div>


@endsection
