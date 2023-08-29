
@extends('templates.TemplateClinic.clinicDoctors.master')
@section('title', 'Home')
@section('content')

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.php"
                            index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">doctors</li>
                </ol>
            </nav>
            <div class="filteration d-flex gap-3 mb-3 flex-wrap justify-content-center justify-content-lg-start justify-content-md-start">

            <a href="index.php?page=1" class="btn btn-danger">All</a>

                <div class="dropdown">
                    <button class="btn bg-blue btn-primary align-items-center d-flex gap-2 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        city
                    </button>
                    <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href=""></a></li>

                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn bg-blue btn-primary align-items-center d-flex gap-2 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        major
                    </button>
                    <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href=""></a></li>

                    </ul>
                </div>
            </div>
            <div class="doctors-grid">
                            <div class="card p-2" style="width: 18rem; background: #222dbb73"">
                                <img src="" class="card-img-top rounded-circle card-image-circle"
                                                    alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center"></h4>
                                    <h6 class="card-title fw-bold text-center"></h6>
                                    <a href="" class="btn btn-outline-primary card-button">Book an appointment</a>
                                </div>
                            </div>
            </div>



        </div>
    </div>
@endsection


