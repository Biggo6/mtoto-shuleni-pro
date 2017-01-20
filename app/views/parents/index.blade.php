@extends('layout')

@section('title', 'Manage Parents')

@section('main')

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New Parent</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" id="registerParent">
                      
                      <div class="form-group">
                        <label>Fullname</label>
                        <input type="text"  name="fullname" {{HelperX::ve(["veName"=>"Fullname", "veVs"=>"required"])}} placeholder="Enter Fullname">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input type="text"  name="email" class="form-control" placeholder="Enter Email">
                      </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text"  name="username" {{HelperX::ve(["veName"=>"  Username", "veVs"=>"required"])}} placeholder="Enter UserName">
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="password"  name="password" id="password" {{HelperX::ve(["veName"=>" Password ", "veVs"=>"required,funcCall[checkPassMatch[cpassword]]"])}} placeholder="Enter Password">
                      </div>

                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password"  name="cpassword" id="cpassword" {{HelperX::ve(["veName"=>"Confirm Password ", "veVs"=>"required,funcCall[checkPassMatch[password]]"])}} placeholder="Enter Confirm Password">
                      </div>

                      <span id="more" class="label label-primary" style="cursor: pointer"><i class="fa fa-arrow-down"></i> More ...</span><br/><br/>

                      <div style="display:none" id="more_teacher_fields"> 

                        <div class="form-group">
                        	<label>Address</label>
                        	<input type="text" name="address" placeholder="Enter Address" class="form-control" />
                        </div>

                        <div class="form-group">
                        	<label>Phone</label>
                        	<input type="text" name="phone" placeholder="Enter Phone" class="form-control" />
                        </div>

                        <div class="form-group">
                        	<label>Profession</label>
                        	<input type="text" name="profession" placeholder="Enter Profession" class="form-control" />
                        </div>

                      </div>

                      <div class="form-group">
                          <label>Status</label>
                          <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Blocked</option>
                          </select>
                        </div><br/>

                        <hr/>

                      @include('partials._buttonSave', ['btnId'=>'saveParent', 'title'=>'Save Parent Info']);

                       @section('footerScripts')
                        @include('partials._saveFunc', ["btnID" => "saveParent", "formID"=>"registerParent", "route"=>"parents.store", "routeWith"=>"parents.refreshWith", "debug"=>true])
                      @stop

                  </form>
                    
                  </div>
        </div>
	</div>
	<div class="col-md-8">

<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage Parents</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    @include('partials._success')

                    @include('partials._datatable', ["columns"=>["Fullname", "Email", "Phone", "Status", "Profession", "Actions"], "mapEls"=>["fullname", "email", "phone", "status", "profession"], "data"=>[], "modal"=>"lg", "url_edit"=>"parents/edit", "url_delete"=>"parents/destroy", "refreshWix"=>"parents.refreshWith"])


                  </div>
        </div>

	</div>

</div>

@stop