@extends('layout')

@section('title', 'Manage Students')

@section('main')

<div class="modal fade" id="modal-add-student">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Add New Student</h4>
            </div>
            <form class="form-horizontal form-label-left" id="registerStudent">
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Photo</label>
                                
                                <input type="file" id="studentphoto" name="studentphoto" class="filestyle" data-input="false" data-buttonName="btn-danger">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text"  name="firstname" {{HelperX::ve(["veName"=>"Firstname", "veVs"=>"required"])}} placeholder="Enter Firstname">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text"  name="lastname" {{HelperX::ve(["veName"=>"Lastname", "veVs"=>"required"])}} placeholder="Enter Lastname">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"  name="username" {{HelperX::ve(["veName"=>"Username", "veVs"=>"required"])}} placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Class</label>
                            <select name="status" class="form-control">
                            
                          </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password"  name="username" {{HelperX::ve(["veName"=>"Username", "veVs"=>"required"])}} placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Section</label>
                            
                          <select name="status" class="form-control">
                            
                          </select>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password"  name="username" {{HelperX::ve(["veName"=>"Username", "veVs"=>"required"])}} placeholder="Enter Confirm Password">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Admitt Number</label>
                            <input type="text"  name="admit" {{HelperX::ve(["veName"=>"Admit Number", "veVs"=>"required"])}} placeholder="Enter Admit Number">
                        </div>
                    </div>
                </div>
                
                <hr/>
                <span id="more" class="label label-primary" style="cursor: pointer"><i class="fa fa-arrow-down"></i> More ...</span><br/><br/>

                
                <div  style="display:none" id="more_teacher_fields">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                          <label>Status</label>
                          <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Blocked</option>
                          </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="text" id="birthday" placeholder="Enter Birthday"  name="birthday" class="form-control date-picker" />
                             </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Gender</label>
                              <select name="gender" class="form-control">
                                <option value="">---  Select Gender ----</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text"  name="address" class="form-control" placeholder="Enter Address Here" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text"  name="phone" class="form-control" placeholder="Enter Phone Here" />
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"  name="email" class="form-control" placeholder="Enter Email Here" />
                           </div>
                        </div>
                    </div>
                </div>
                <br/><hr/>

                 @include('partials._buttonSave', ['btnId'=>'saveStudent', 'btn'=>'success', 'title'=>'Save New Student Information']);

                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-student-bulk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Add Bulk Students</h4>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div

<div class="row">

	<div class="col-md-12">
		<div class="x_panel">
                  <div class="x_title">
                    <h2>
                    	<button data-toggle="modal" href='#modal-add-student' class="btn btn-success"><i class="fa fa-plus"></i> Admit Student</button>
                    	<!-- <button data-toggle="modal" href='#modal-add-student-bulk' class="btn btn-warning"><i class="fa fa-plus"></i> Admit Bulk Student</button> -->
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                    <div class="row">
                    	
                    	<div class="col-md-3">
                    			<div class="form-group" id="sxl">
			                        <h3>Select Class</h3>
			                        <select id="sel" name="class_name" class="form-control">
			                          <option>--Select Class --</option>
			                          <?php $classes =  MsClass::where('status', 1)->select('class_name')
            ->distinct()
            ->get(); ?>
			                          @foreach($classes as $c)
			                              <option  value="{{$c->class_name}}">{{$c->class_name}}</option>
			                          @endforeach
			                        </select>  
			                      </div>
                    	</div>
                    	<div class="col-md-3"></div>
                    </div>

                    <hr/>

                    <div class="row">
                    	<div class="col-md-12">
                    		<img id="ijax" style="display:none" src="{{url('images/ijax.gif')}}" />
                    	</div>
                    </div>
                    
                    <div id="students_area"></div>	
                    
                    
                  </div>
        </div>
	</div>
	

</div>

@stop

@section('footerScripts')

<script type="text/javascript">
$(function(){
	$('body').on('change', '#sel', function(){
		var sel = $(this).val();
		if(sel!=""){
			$('#ijax').show();
			$('#sel').prop('disabled', true);
			$('#students_area').html('');
			$.post('{{route('students.fetch')}}', {class_name:sel}, function(res){
				$('#ijax').hide();
				$('#sel').prop('disabled', false);
				$('#students_area').hide().html(res).fadeIn();
			});
		}
	});
});	
</script>

@stop