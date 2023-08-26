@extends('templates.TemplateAdmins.master')
@section('title', 'add city')
@section('content')

<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Add New City</h2>

            <a class="btn btn-danger mb-5" href="city_list.php?page=1">City list</a>

            <form action="validateForms/cities/add_city.php" method="POST">

            <div class="form-group">
                <label>City Name:</label>
                <input class="form-control" type="text" name="city_name" placeholder="city name">

            </div>
            <input type="submit" class="btn btn-primary" value="add City" name="add_city">
            </form>
        </div>
        </div>
        </div>
    </div>

<!-- End Main Body -->
@endsection
