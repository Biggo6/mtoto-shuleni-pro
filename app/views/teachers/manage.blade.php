@extends('layout')

@section('title', 'Manage Teachers')

@section('main')

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New Teacher</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <form class="form-horizontal form-label-left" id="registerTeacher">
                      
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text"  name="firstname" {{HelperX::ve(["veName"=>"First  Name", "veVs"=>"required"])}} placeholder="Enter First Name">
                      </div>

                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text"  name="lastname" {{HelperX::ve(["veName"=>"Last  Name", "veVs"=>"required"])}} placeholder="Enter Last Name">
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
                          <label>Status</label>
                          <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Blocked</option>
                          </select>
                        </div><br/>

                        	<div class="form-group">
                        	<label>Birthday</label>
                        	<input type="text" id="birthday" placeholder="Enter Birthday"  name="birthday" class="form-control date-picker" />
                        </div>

                        <div class="form-group">
                          <label>Gender</label>
                          <select name="gender" class="form-control">
                            <option value="">---  Select Gender ----</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                        </div>

                        <div class="form-group">
                        	<label>Address</label>
                        	<input type="text" name="address" placeholder="Enter Address" class="form-control" />
                        </div>

                        <div class="form-group">
                        	<label>Phone</label>
                        	<input type="text" name="phone" placeholder="Enter Phone" class="form-control" />
                        </div>

                        <div class="form-group">
                        	<label>Email</label>
                        	<input type="text" name="email" placeholder="Enter Email" class="form-control" />
                        </div>

                      </div>

                      

                      

                      <div class="form-group">
                      	<label>Profile Picture</label>
                      	<input type="file" id="profile_photo" name="profile_photo" class="filestyle" data-input="false" data-buttonName="btn-success">
                      	<hr/>
                      	<div id="logo-placeholder">
						</div>
                      </div>
                     <hr/>

                      @include('partials._buttonSave', ['btnId'=>'saveTeacher', 'title'=>'Save New Teacher']);

                      @section('footerScripts')
                        @include('partials._saveFunc', ["btnID" => "saveTeacher", "formID"=>"registerTeacher", "route"=>"teachers.store", "routeWith"=>"teachers.refreshWith","photo"=>"profile_photo"])
                      @stop

                    </form>
                    
                  </div>
        </div>
	</div>
	<div class="col-md-8">
    <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage Teachers</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    @include('partials._success')

                    @include('partials._datatable', ["columns"=>["Photo", "Firstname", "Lastname", "Status", "Actions"], "mapEls"=>["profile_photo", "firstname", "lastname", "status"], "data"=>Teacher::orderBy('created_at', 'DESC')->get(), "modal"=>"lg", "url_edit"=>"teachers/edit", "url_delete" =>"teachers/delete", "refreshWix"=>"teachers.refreshWith", "photos"=>["profile_photo"]])


                  </div>
        </div>
  </div>

</div>

@stop