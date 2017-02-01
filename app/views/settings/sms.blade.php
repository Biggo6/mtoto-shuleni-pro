@extends('layout')

@section('title', 'SMS Settings')

@section('main')

<div class="row">

  @if(HelperX::getRoleName() == "admin")

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Top Up</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                      @include('partials._success')
                     <form class="form-horizontal form-label-left" id="registerSMS">
                      
                      <div class="form-group">
                        <label>Messages Number</label>
                        <input type="text"  name="messages" {{HelperX::ve(["veName"=>"Messages", "veVs"=>"required,custom[number]"])}} placeholder="Enter Messages Number">
                      </div>

                      <hr/>




                       @include('partials._buttonSave', ['btnId'=>'saveSMS', 'title'=>'Save Changes']);

                       @section('footerScripts')
                        @include('partials._saveFunc', [ "btnID" => "saveSMS", "formID"=>"registerSMS", "route"=>"sms.store", "routeWith"=>"app.refreshWith"])
                      @stop

                    </form>

                  </div>
        </div>
	</div>

  @else

  <div class="col-md-4">
    
      <div class="alert alert-success"><i class="fa fa-check"></i> Successfully Recharged 1000 SMS! </div>
</div>
  @endif
	<div class="col-md-8"></div>

</div>

@stop