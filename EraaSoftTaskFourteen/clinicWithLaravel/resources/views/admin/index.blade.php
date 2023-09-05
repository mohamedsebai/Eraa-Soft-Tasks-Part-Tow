    @extends('templates.TemplateAdmins.master')
    @section('title', 'Home')
    @section('content')
    <!-- Start Main Body -->
    <div class="main-body">
    <div class="container">
    <div class="row">
    <div class="col-md-6 col-lg-3">
    <div class="stat user">
        <div class="d-inline-block text-center">
        <h5>Admin</h5>
        <i class="fa fa-users"></i>
        </div>
        <div class="float-right d-inline-block text-center">
        <h5>Count</h5>
        <span>3</span>
        </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-3">
    <div class="stat user">
        <div class="d-inline-block text-center">
        <h5>Users</h5>
        <i class="fa fa-users"></i>
        </div>
        <div class="float-right d-inline-block text-center">
        <h5>Count</h5>
        <span>3</span>
        </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat post">
        <div class="d-inline-block text-center">
            <h5>Posts</h5>
            <i class="fa fa-paste"></i>
        </div>
        <div class="float-right d-inline-block text-center">
            <h5>Count</h5>
            <span>3</span>
        </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat category">
        <div class="d-inline-block text-center">
            <h5>Category</h5>
            <i class="fa fa-tags"></i>
        </div>
        <div class="float-right d-inline-block text-center">
            <h5>Count</h5>
            <span>4</span>
        </div>
        </div>
    </div>
    </div>

    <div class="latest-items">
    <div class="row">

    <div class="col-md-6">
        <div class="latest latest-users">
        <h4>Latest User</h4>

            <div class="item user">
                <img src="" width="30">
                <span class="author"></span>
                <p class="body">
                <span class="email d-block"></span>
                <span class="d-block"></span>
                <span class="d-block"></span>
                <p>
            </div>
            <hr>

            <div class="alert alert-danger">there is no users yet</div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="latest latest-posts">
        <h4>Latest Posts</h4>

            <div class="item post">
            <img src="" width="30">
            <span class="title"></span>
            <p class="body">
            <span class="cat d-block">Category: </span>
            <span class="tag d-block">tags:</span>
            <span class="body d-block"></span>
            <p>
            </div>
            <hr>

            <div class="alert alert-danger">there is no posts yet</div>

        </div>
    </div>

    </div>
    </div>

    </div>
    </div>


    @endsection
