@extends('templates.TemplateAdmins.master')
@section('title', 'login')
@section('content')
<body class="member-page-body">
<div class="overlay"></div>
<div class="member-page">
  <div class="container">
   <div class="row">
     <div class="form-box m-auto">

      <h2 class="text-center">Welcome back!</h2>

      <form action="validateForms/login/validate_login.php" method="POST" id="form">
        <div class="form-group">
          <input class="form-control" type="email" name="email" placeholder="Email"
          value="">
        </div>
        <div class="form-group">
          <input class="form-control" type="password" name="password" placeholder="Password">
        </div>

        <div class="form-group">
          <input type="checkbox" name="remember_me" id="remember_me">
          <label for="remember_me">remember me</label>
        </div>

        <input class="btn btn-primary d-block m-auto" type="submit" name="login" value="Send" style="margin-top: 10px !important">
       </form>
    </div>
   </div>
  </div>
</div>
@endsection
