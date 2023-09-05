@extends('templates.TemplateAdmins.master')
@section('title', 'qoute list')
@section('content')
<!-- Start Main Body -->
<div class="main-body">
    <div class="container">
    <div class="row">
        <div class="responsive-table m-auto">
        <h2 class="text-center">quotes List</h2>
        <a class="btn btn-danger mb-5" href="add_quote.php">Create New quote</a>

        <table class="table-bordered">
        <thead class="text-center">
            <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>created at</th>
            <th>option</th>
            </tr>
        </thead>
            <tbody class="text-center">


                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="" class="btn btn-success custom-btn"><i class="fa fa-edit"></i>Edit</a>
                        <a href="" class="btn btn-danger custom-btn"><i class="fa fa-close"></i>Delete</a>
                        </td>
                    </tr>
                    <div class="alert alert-danger">There is no quotes yet</div>


            </tbody>
        </table>

        </div>

        </div>
    </div>

    </div>
</div>
<!-- End Main Body -->
@endsection
