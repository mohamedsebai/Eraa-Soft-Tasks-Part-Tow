@extends('templates.TemplateAdmins.master')
@section('title', 'add quote')
@section('content')
<!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
        <div class="row">
        <div class="form-box">
            <h2 class="text-center">Add New quote</h2>

            <a class="btn btn-danger mb-5" href="quotes_list.php?page=1">quote list</a>


            <form action="validateForms/quotes/add_quote.php" method="POST">

            <div class="form-group">
                <label>Title:</label>
                <input class="form-control" type="text" name="title" placeholder="quote title">
            </div>

            <div class="form-group">
            <label>Content:</label>
                <textarea name="content" class="form-control" cols="30" rows="10" placeholder="quote content"></textarea>
            </div>



            <input type="submit" class="btn btn-primary" value="add quote" name="add_quote">
            </form>
        </div>
        </div>
        </div>
    </div>
@endsection
