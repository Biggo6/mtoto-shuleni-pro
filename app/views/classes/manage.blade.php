@extends('layout')

@section('title', 'Manage Classes')

@section('main')

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New Class</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <form class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter Class Name">
                      </div><br/>

                      @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                      <div class="form-group">
                        <label>Section/Stream</label>
                        

                       
                      </div>
                       @endif
                      @endif

                    </form>
                    
                  </div>
        </div>
	</div>
	<div class="col-md-8">
    <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage all Classes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    
                  </div>
        </div>
  </div>

</div>

@stop