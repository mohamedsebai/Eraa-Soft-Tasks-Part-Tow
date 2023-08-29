@include('templates.TemplateClinic.clinicDoctors.header')

<body>
    <div class="page-wrapper">

        {{-- custom navbar for doctors booking  --}}
    <nav class="navbar navbar-expand-lg navbar-expand-md bg-blue sticky-top">
    <div class="container">
        <div class="navbar-brand">
            <a class="fw-bold text-white m-0 text-decoration-none h3" href="../index.php">VCare</a>
    </div>
    <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button"
        data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
            <a type="button" class="btn btn-outline-light navigation--button" href="../index.php">Home</a>
            <a type="button" class="btn btn-outline-light navigation--button"
                href="../majors.php?page=1">majors</a>
            <a type="button" class="btn btn-outline-light navigation--button"
                href="../doctors/index.php?page=1">Doctors</a>


                        <a type="button" class="btn btn-outline-light navigation--button" href="./logout.php">logout</a>

                        <a type="button" class="btn btn-outline-light navigation--button" href="./login.php">login</a>


                </div>
            </div>
        </div>
        </nav>


        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <h2 class="fw-200">Welcome back Doctor Name</h2>
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item active" aria-current="page">Your Booking history</li>
                </ol>
            </nav>
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">major</th>
                        <th scope="col">location</th>
                        <th scope="col">completed</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td class="d-flex align-items-center gap-2"><img src="" alt="" width="25"
                                height="25" class="rounded-circle">
                            <a href="../doctors/doctor.php?doctor_id="></a>
                        </td>
                        <td></td>
                        <td><a href="https://www.eraasoft.com" target="_blank">eraasoft</a></td>
                        <td>
                        </td>
                    </tr>

                <div class="alert alert-danger">There is no booking yet</div>

                </tbody>
            </table>
        </div>
    </div>
    @include('templates.TemplateClinic.clinicDoctors.footer')
