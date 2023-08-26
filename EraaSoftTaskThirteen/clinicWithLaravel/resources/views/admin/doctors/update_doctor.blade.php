@extends('templates.TemplateAdmins.master')
@section('title', 'update doctor')
@section('content')

    <!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Update doctor</h2>

            <a class="btn btn-danger mb-5" href="doctors_list.php?page=1">doctors list</a>


            <form action="validateForms/doctors/update_doctor.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="doctor_id" value="">

            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" name="name" placeholder="doctor name" value="">
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input class="form-control" type="text" name="phone" placeholder="doctor phone" value="">
            </div>


            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" placeholder="doctor email" value="">
            </div>


            <div class="form-group">
                <label>Summary:</label>
                <input class="form-control" type="text" name="summary" placeholder="doctor summary" value="">
            </div>

            <div class="form-group">
                <select name="major_id" class="form-group">
                        <option value=""></option>
                </select>
            </div>

            <div class="form-group">
                <select name="city_id" class="form-group">
                        <option value=""></option>

                </select>
            </div>

            <div class="form-group">
            <label>Image:</label>
            <input class="form-control" type="file" name="image" >
            </div>

            <input type="submit" class="btn btn-primary" value="update doctor" name="update_doctor">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->
@endsection
