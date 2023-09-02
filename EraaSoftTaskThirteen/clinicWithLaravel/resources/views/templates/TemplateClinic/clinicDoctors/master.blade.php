@include('templates.TemplateClinic.clinicDoctors.header')
<body>
    <div class="page-wrapper">
        @include('templates.TemplateClinic.clinicDoctors.nav')


@yield('content')
@include('templates.TemplateClinic.clinicDoctors.footer_content')
@include('templates.TemplateClinic.clinicDoctors.footer')
