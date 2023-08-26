@extends('templates.TemplateAdmins.master')
@section('title', 'rate list')
@section('content')
<!-- Start Main Body -->
<div class="main-body">
 <div class="container">
  <div class="row">
    <div class="responsive-table m-auto">
      <h2 class="text-center">rates List</h2>


      <table class="table-bordered">
       <thead class="text-center">
         <tr>
          <th>ID</th>
          <th>Doctor Name</th>
          <th>Major Title</th>
          <th>Rate(Count of Voting)</th>
          <th>Latest Rate At</th>
        </tr>
       </thead>
        <tbody class="text-center">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><span class="fa fa-star" style="color: orange"></span></td>
                    <td></td>
                </tr>
                <div class="alert alert-danger">There is no rating for any doctor yet</div>
        </tbody>
      </table>

      </div>

    </div>
   </div>

 </div>
</div>
@endsection
