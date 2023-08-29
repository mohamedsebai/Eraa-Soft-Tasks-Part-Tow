@extends('templates.TemplateAdmins.master')
@section('title', 'booking list')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        <h2 class="text-center">bookings List</h2>

            <div class="dropdown mb-5">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Doctors
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href=""></a>
            </div>
            </div>


            <a class="btn btn-danger mb-5" href="add_booking.php">Add new booking</a>


            <table class="table-bordered">
            <thead class="text-center">
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <td>doctor</td>
                <td>major</td>
                <th>created at</th>
                <th>Status</th>
                <th>option</th>
                </tr>
            </thead>
                <tbody class="text-center">

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td>
                        <a href="" class="btn btn-danger custom-btn">Not complated</a>
                            <a href="" class="btn btn-success custom-btn">complated</a>
                    </td>

                    <td>
                    <a href="" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit</a>
                    <a href="" class="btn btn-danger custom-btn"><i class="fa fa-close"></i>Delete</a>
                    </td>
                </tr>

                <div class="alert alert-danger">There is no bookings yet</div>


            </tbody>
        </table>

        </div>

        </div>
    </div>




    </div>
    </div>
<!-- End Main Body -->
@endsection
