

@extends('templates.TemplateClinic.clinicDoctors.master')
@section('title', 'Home')
@section('content')

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php?page=1">doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Doctor name</li>
                </ol>
            </nav>

            <div class="d-flex flex-column gap-3 details-card doctor-details">

                <?php

                ?>
                <div class="details d-flex gap-2 align-items-center">
                    <img src="'../admin/assets/images/doctors/d" alt="doctor" class="img-fluid rounded-circle" height="150"
                        width="150">
                    <div class="details-info d-flex flex-column gap-3 ">
                        <h4 class="card-title fw-bold">name</h4>
                    <!-- include ratign page here for doctor -->
                    @include('templates.TemplateClinic.clinicDoctors.rating')

                <form class="form" action="../validateForms/booking_insert.php" method="POST">
                    <input type="hidden" name="doctor_id" value="">
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                            value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" name="phone" class="form-control" id="phone"
                            value="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                            value="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="booking">Confirm Booking</button>
                </form>

            </div>
        </div>
    </div>
@endsection


