@extends('templates.TemplateAdmins.master')
@section('title', 'doctor list')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        <h2 class="text-center">doctors List</h2>

        <a class="btn btn-danger mb-5" href="add_doctor.php">Create New Doctor</a>

        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Summary</th>
            <th>City Name</th>
            <th>Major Name</th>
            <th>created at</th>
            <th>option</th>
            </tr>
        </thead>
            <tbody class="text-center">

                    <tr>
                        <td><?php echo $doctor['id']; ?></td>
                        <td><?php echo $doctor['name']; ?></td>
                        <td>
                        <img src="<?php echo 'assets\images\doctors\\' . $doctor['doctor_img']; ?>" alt="" width="100" height="100">
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit password</a>

                        <a href="" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit</a>
                        <a href=" class="btn btn-danger custom-btn"><i class="fa fa-close"></i>Delete</a>
                        </td>
                    </tr>


                    <div class="alert alert-danger">There is no doctors yet</div>


            </tbody>
        </table>

        </div>

        </div>
    </div>

</div>
<!-- End Main Body -->


@endsection
