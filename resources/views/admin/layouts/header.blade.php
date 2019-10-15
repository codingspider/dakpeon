<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <!--Favicon-->
        <link rel="shortcut icon" type="image/png" href="{{  asset('assets/frontend/images/favicon.png')}}" />
        <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/morris.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/bootadmin.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/datatables.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-toggle.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
        <script src="{{asset('assets/admin/js/bootstrap-toggle.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/datatables.min.js')}}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{asset('assets/admin/js/morris.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/raphael.min.js')}}"></script>

        <title>Laravel 5.8 Datatables Tutorial - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
        @php
        $gs = App\Model\GeneralSetting::first();
        @endphp
        <title>{{ $gs->title }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="bg-light">
        <nav class="navbar navbar-expand navbar-dark bg-custom-background">
            <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
            <a class="navbar-brand" href="#">Admin Panel</a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;{{ Auth::guard('admin')->user()->name }}</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                            <a href="{{ route('admin.profile') }}" class="dropdown-item"><i class="fa fa-user"></i> Profile</a>
                            <a href="{{ url('admin/changePassword') }}" class="dropdown-item"><i class="fa fa-cog"></i> Change Password</a>
                            <a href="#"  class="dropdown-item"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-angle-left"></i> Logout</a>
                            <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>