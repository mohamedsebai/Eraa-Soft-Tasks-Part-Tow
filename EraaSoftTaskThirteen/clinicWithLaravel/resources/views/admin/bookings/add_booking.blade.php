@extends('templates.TemplateAdmins.master')
@section('title', 'add booking')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Add New booking</h2>

            <a class="btn btn-danger mb-5" href="bookings_list.php?page=1">bookings list</a>


            <form action="validateForms/bookings/add_booking.php" method="POST">

            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" placeholder="booking username">
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input class="form-control" type="text" name="phone" placeholder="booking phone">
            </div>


            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" placeholder="booking email">
            </div>


                <div class="form-group">
                    <select name="doctor_id" class="form-group">

                            <option value=""></option>

                    </select>
                </div>


            <input type="submit" class="btn btn-primary" value="add booking" name="add_booking">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->
@endsection
