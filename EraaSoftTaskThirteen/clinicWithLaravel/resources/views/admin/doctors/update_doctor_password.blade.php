@extends('templates.TemplateAdmins.master')
@section('title', 'udpate doctor password')
@section('content')
<div class="change-pass">
    <div class="container">
        <div class="row">
        <div class="form-box m-auto">
            <h2 class="text-center" style="margin: 30px 0;">Change Doctor  Password</h2>

        <form action="validateForms/doctors/update_password.php" method="POST">
            <input type="hidden" name="doctor_id" value="">
            <div class="form-group">
            <input class="form-control" type="password" name="new_password" placeholder="New Password">
            </div>
            <div class="form-group">
            <input class="form-control" type="password" name="repeat_new_password" placeholder="Repeat New Password">
            </div>
            <input class="btn btn-primary"type="submit" value="change password" name="change_password">
            </form>
        </div>
        </div>
        </div>
</div>

<!-- End Main Body -->

@endsection
