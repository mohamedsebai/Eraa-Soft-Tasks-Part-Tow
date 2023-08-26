@extends('templates.TemplateAdmins.master')
@section('title', 'update booking')
@section('content')

    <!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">update New booking</h2>

            <a class="btn btn-danger mb-5" href="bookings_list.php?page=1">bookings list</a>

            <form action="validateForms/bookings/update_booking.php" method="POST">

            <input type="hidden" name="booking_id" value="">

            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" placeholder="booking username" value="">
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input class="form-control" type="text" name="phone" placeholder="booking phone" value="">
            </div>


            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" placeholder="booking email" value="">
            </div>


                <div class="form-group">
                    <select name="doctor_id" class="form-group">
                            <option value=""></option>
                    </select>
                </div>


            <input type="submit" class="btn btn-primary" value="update booking" name="update_booking">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->
<?php require_once('templates/footer.php');
