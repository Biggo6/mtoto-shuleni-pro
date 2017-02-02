<?php

$perms = Permission::where('user_id', $user)->count();

?>


@if($perms == 0)



<div class="alert alert-danger"><i class="fa fa-info-circle"></i> This is Core Role Cannt be Edited</div>

@else

<div>
                    
				<form id="editPerms"> 

					<input type="hidden" name="user_id" value="{{$user}}" />	
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_teachers" class="js-switch2" {{HelperX::isInUserPerms($user, "manage_teachers")}} /> Manage Teachers
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_classes" class="js-switch_" {{HelperX::isInUserPerms($user, "manage_classes")}}  /> Manage Classes
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_subjects" class="js-switch_x" {{HelperX::isInUserPerms($user, "manage_subjects")}}  /> Manage Subjects
                                  </label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_students" class="js-switch9" {{HelperX::isInUserPerms($user, "manage_students")}}  /> Manage Students
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_parents" class="js-switch8" {{HelperX::isInUserPerms($user, "manage_parents")}}  /> Manage Parents
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_users" class="js-switch7" {{HelperX::isInUserPerms($user, "manage_users")}}   /> Manage Users
                                  </label>
                            </div>
                        </div>
                    </div>
                    <br/>
                     <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_exams" class="js-switch3" {{HelperX::isInUserPerms($user, "manage_exams")}}  /> Manage Exams
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_noticeboard" class="js-switch4" {{HelperX::isInUserPerms($user, "manage_noticeboard")}}  /> Manage Noticeboard
                                  </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_reports" class="js-switch5" {{HelperX::isInUserPerms($user, "manage_reports")}}  /> Manage Reports
                                  </label>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="">
                                  <label>
                                    <input type="checkbox" name="perms[]" value="manage_settings" class="js-switch6"  {{HelperX::isInUserPerms($user, "manage_settings")}}  /> Manage Settings
                                  </label>
                            </div>
                        </div>
                        
                    </div>
                    <br/>
                   
                    
                    
                    
                 
              </div>

              <br/>
              <hr/>

              <button class="btn btn-success" id="saveEditPerms"> Save Changes</button>

          		</form>

             


@endif