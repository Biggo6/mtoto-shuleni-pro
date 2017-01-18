<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') </title>

    <!-- bootstrap-daterangepicker -->
    <link href="{{url('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{url('sweetalert/dist/sweetalert.css')}}">

    <!-- Datatables -->
    <link href="{{URL('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <style>
        

        div.show-image {
            position: relative;
            float:left;
            margin:5px;
        }
        div.show-image:hover img{
            opacity:0.5;
        }
        div.show-image:hover span {
            margin-top: 8px;
            display: block;
            cursor : pointer;
        }
        div.show-image span {
            position:absolute;
            display:none;
        }
        div.show-image input.update {
            top:0;
            left:0;
        }
        div.show-image span.delete {
            top:0;
            left:59%;
        }
        </style>


     <link rel="stylesheet" href="{{url('ve/css/validationEngine.jquery.css')}}" type="text/css"/>


    <!-- Bootstrap -->
    <link href="{{url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{url('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Switchery -->
    <link href="{{url('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('build/css/custom.min.css')}}" rel="stylesheet">
  </head>