<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BEM KEMA POLBAN 2019/2020</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('admin/fontawesome/css/all.css')}}">
    <link href="{{ asset('admin/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">--}}
    <link href="{{ asset('admin/swal/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
    <link rel="stylesheet" href="{{asset('admin/chart.js/chart/Chart.min.css')}}">
</head>
<body>
<div id="irvan">
    <admin-app></admin-app>
</div>
<!-- General JS Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('admin/nicescroll/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('admin/swal/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('admin/datatables/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('admin/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/js/stisla.js') }}"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{ asset('admin/js/scripts.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>

<script src="{{ asset('admin/chart.js/chart/Chart.min.js') }}"></script>
</body>
</html>
