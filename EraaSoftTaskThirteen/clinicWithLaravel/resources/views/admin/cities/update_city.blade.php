@extends('templates.TemplateAdmins.master')
@section('title', 'update city')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Update City</h2>
            <a class="btn btn-danger mb-5" href="add_city.php">Create New City</a>
            <a class="btn btn-danger mb-5" href="city_list.php?page=1">city list</a>
            <form action="validateForms/cities/update_city.php" method="POST">

            <input type="hidden" name="city_id" value="">

            <div class="form-group">
                <label>City Name:</label>
                <input class="form-control" type="text" name="city_name" placeholder="City Name" value="">
            </div>

            <input type="submit" class="btn btn-primary" value="update City" name="update_city">
            </form>
        </div>
        </div>
        </div>
    </div>


<!-- End Main Body -->

@endsection

