@extends('layout')

@section('title', 'Software Update')

@section('main')

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-refresh"></i> Software Update </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <div class="alert alert-danger"><i class="fa fa-warning"></i> {{$error}}</div>	
                  </div>
        </div>
	</div>
	

</div>

@stop