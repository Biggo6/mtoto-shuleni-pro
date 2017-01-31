@extends('layout')

@section('title', 'Manage Users')

@section('main')


<div class="modal fade" id="modal-id">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-clock-o"></i> User Login History</h4>
            </div>
            <div class="modal-body">
                    <center>
                        <img style="display:none" id="history" src="{{url('images/loader.gif')}}" />
                    </center>
                    <div id="history_area"></div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-id-2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-user-plus"></i> Add New Administrator </h4>
      </div>
      <div class="modal-body">

          <form class="form-horizontal form-label-left" id="registerAdmin">
          <div class="row">

          <div class="col-md-4">
               
                      
                      <div class="form-group">
                        <label>Firstname</label>
                        <input type="text"  name="firstname" {{HelperX::ve(["veName"=>"Firstname", "veVs"=>"required"])}} placeholder="Enter Firstname">
                      </div>

                      <div class="form-group">
                        <label>Lastname</label>
                        <input type="text"  name="lastname" {{HelperX::ve(["veName"=>"Lastname", "veVs"=>"required"])}} placeholder="Enter Lastname">
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

                      

                      <div class="form-group">
                          <label>Status</label>
                          <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Blocked</option>
                          </select>
                        </div><br/>

                        <hr/>

                      @include('partials._buttonSave', ['btnId'=>'saveAdmin', 'title'=>'Save']);
                      @section('footerScripts')
                        @include('partials._saveFunc', ["btnID" => "saveAdmin", "formID"=>"registerAdmin", "route"=>"users.storeAdmin", "routeWith"=>"app.refreshWith"])
                      @stop
                       

             
          </div>
          <div class="col-md-8">

              <div>
                    <label for="stream">Permissions</label>
                    <hr/>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_teachers" class="js-switch" checked /> Manage Teachers
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_classes" class="js-switch" checked /> Manage Classes
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_subjects" class="js-switch" checked /> Manage Subjects
                                  </label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_students" class="js-switch" checked /> Manage Students
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_parents" class="js-switch" checked /> Manage Parents
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_users" class="js-switch"  /> Manage Users
                                  </label>
                            </div>
                        </div>
                    </div>
                    <br/>
                     <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_exams" class="js-switch" checked /> Manage Exams
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_noticeboard" class="js-switch" checked /> Manage Noticeboard
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_reports" class="js-switch" checked /> Manage Reports
                                  </label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_settings" class="js-switch"  /> Manage Settings
                                  </label>
                            </div>
                        </div>
                        
                    </div>
                    <br/>
                   
                    
                    
                    
                 
              </div>


          </div>

          </form> 

          </div>

      </div>
      
    </div>
  </div>
</div>

<div class="row">

	<div class="col-md-12">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage Users</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                    <button data-toggle="modal" href='#modal-id-2' class="btn btn-success"><i class="fa fa-user-plus"></i> Add New Administrator</button>

                     <hr/>

                   <table id="datatable" class="table  table-striped table-bordered">
                                                 <thead>
                                                     <tr>
                                                         <th>#</th>
                                                         <th>Firstname</th>
                                                         <th>Lastname</th>
                                                         <th>Username</th>
                                                         <th>Role</th>
                                                         <th>Status</th>
                                                         <th>Logout Time</th>
                                                         <th>Login Time</th>
                                                         <th>Actions</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>


                                              <?php
                                                  $users = User::orderBy('created_at', 'DESC')->get();

                                                  $i = 1;
                                              ?>

                                             @foreach($users as $u)
                                             <tr>
                                                  <td>{{$i}}</td>
                                                  <td>{{$u->firstname}}</td>
                                                  <td>{{$u->lastname}}</td>
                                                  <td>{{$u->username}}</td>
                                                  <td><h5>{{Role::find($u->role_id)->name}}</h5></td>
                                                  <td>{{HelperX::getStatus($u->active)}}</td>
                                                  <td>{{HelperX::getLogoutTime($u->id)}}</td>
                                                  <td>{{HelperX::getLoginTime($u->id)}}</td>
                                                  <td>

                                                   <a  data-toggle="modal" href='#modal-id'><label user_id="{{$u->id}}" class="label label-info user_history" title="View User Login Histories" style="cursor: pointer"> <i class="fa fa-list "></i> Login Histories</label></a>

                                                     &nbsp;

                                                   <a  data-toggle="modal" href='#modal-id-3'><label user_id="{{$u->id}}" class="label label-success user_edit" title="Edit User" style="cursor: pointer"> <i class="fa fa-edit "></i> Edit </label></a>

                                                   &nbsp;

                                                   <a><label user_id="{{$u->id}}" class="label label-danger user_delete" title="Edit User" style="cursor: pointer"> <i class="fa fa-trash "></i> Delete </label></a>


                                                  </td>
                                              </tr>
                                             @endforeach



                                                 </tbody>
                                               </table>
                  </div>
        </div>
	</div>

</div>

@stop