<?php $rowId = $teacher->id; ?>


<div class="row">

  <div class="col-xs-3">
    <!-- required for floating -->
    <!-- Nav tabs -->
    <div class="">
    <ul class="nav nav-tabs tabs-left">
      <li class="active"><a href="#home" data-toggle="tab" aria-expanded="false"><i class="fa fa-edit"></i> Edit</a>
      </li>
      <li class=""><a href="#profile" data-toggle="tab" aria-expanded="true"><i class="fa fa-eye"></i> View </a>
      </li>
      <li class=""><a href="#profile2" data-toggle="tab" aria-expanded="true"><i class="fa fa-lock"></i>  Password </a>
      </li>
      
      <li class=""><a href="#profile4" data-toggle="tab" aria-expanded="true"><i class="fa fa-bank"></i> Classes </a>
      </li>
      <li class=""><a href="#profile3" data-toggle="tab" aria-expanded="true"><i class="fa fa-cogs"></i> Settings </a>
      </li>
    </ul>
  </div>
  </div>

  <div class="col-xs-9">
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="home">

        <div class="x_panel">
                  <div class="x_title">
                    <h4><i class="fa fa-edit"></i> Edit Teacher Information</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <form class="form-horizontal form-label-left" id="registerTeacherEdit">


  <input type="hidden" value="{{$rowId}}" name="row_id" />

<div class="form-group">
<label>First Name</label>
<input type="text" value="{{$teacher->firstname}}"  name="firstname" {{HelperX::ve(["veName"=>"First  Name", "veVs"=>"required"])}} placeholder="Enter First Name">
</div>

<div class="form-group">
<label>Last Name</label>
<input type="text" value="{{$teacher->lastname}}"  name="lastname" {{HelperX::ve(["veName"=>"Last  Name", "veVs"=>"required"])}} placeholder="Enter Last Name">
</div>

<div class="form-group">
  <label>Username</label>
  <input type="text" value="{{User::find($teacher->user_id)->username}}"   name="username" {{HelperX::ve(["veName"=>"  Username", "veVs"=>"required"])}} placeholder="Enter UserName">
</div>



<span id="more_edit" class="label label-primary" style="cursor: pointer"><i class="fa fa-arrow-down"></i> More ...</span><br/><br/>

<div style="display:none" id="more_teacher_fields_edit"> 

<div class="form-group">
<label>Status</label>
<select name="status" class="form-control">
@if($teacher->status == 1)
<option value="1">Active</option>
<option value="0">Blocked</option>
@else
<option value="0">Blocked</option>
<option value="1">Active</option>
@endif
</select>
</div><br/>

<div class="form-group">
<label>Birthday</label>
@if($teacher->birthday == '0000-00-00' )
<input type="text" id="birthday_edit"  placeholder="Enter Birthday"  name="birthday" class="form-control date-picker" />
@else
<input type="text" id="birthday_edit" value="{{$teacher->birthday}}"  placeholder="Enter Birthday"  name="birthday" class="form-control date-picker" />
@endif
</div>

<div class="form-group">
<label>Gender</label>
<select name="gender" class="form-control">
@if($teacher->gender == "")  
<option value="">---  Select Gender ----</option>
@endif
@if($teacher->gender == "male")
<option value="male">Male</option>
<option value="female">Female</option>
@elseif($teacher->gender == "female")
<option value="female">Female</option>
<option value="male">Male</option>
@else
<option value="male">Male</option>
<option value="female">Female</option>
@endif
</select>
</div>

<div class="form-group">
<label>Address</label>
<input type="text" value="{{$teacher->address}}" name="address" placeholder="Enter Address" class="form-control" />
</div>

<div class="form-group">
<label>Phone</label>
<input type="text" value="{{$teacher->phone}}" name="phone" placeholder="Enter Phone" class="form-control" />
</div>

<div class="form-group">
<label>Email</label>
<input type="text" value="{{$teacher->email}}" name="email" placeholder="Enter Email" class="form-control" />
</div>

</div>




<hr/>
<div class="form-group">
<p>Profile Picture 
  <label id="file" style="cursor: pointer" class="label label-warning">Change Photo</label>
  <input type="file" style="display:none" id="profile_photo_edit"  name="profile_photo_edit" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
</p>

<div id="logo-placeholder-edit">

</div>

<br/>
<div class="show-image" id="EditImage">
  <div id="logo-placeholder-edit-2">
    @if($teacher->profile_photo == "")
      <img style="width:92px;height: 92px" src="{{url('images/img.jpg')}}" />
    @else
      <img style="width:92px;height: 92px" src="{{$teacher->profile_photo}}" />
    @endif
  </div>
  @if($teacher->profile_photo != "")
  <span class="delete label label-danger photoToRemove" type="button" value=""><i class="fa fa-trash"></i> Remove Photo</span> 
  @endif
</div>


<br/>
<p></p>



</div>
<hr/>

@include('partials._buttonSave', ['btnId'=>'saveTeacherEdit', 'title'=>'Update Teacher']);




</form>
                    
                  </div>
        </div>

            
      </div>
      <div class="tab-pane " id="profile">
          <div class="x_panel">
                  <div class="x_title">
                    <h4><i class="fa fa-user"></i> Teacher Information</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                        <div class="col-md-3">
                          <div>
                            <label for="">Profile Photo</label><br/>
                            @if($teacher->profile_photo == "")
                              <img src="{{url('images/img.jpg')}}" style="width: 150px" />
                            @else
                              <img src="{{$teacher->profile_photo}}" style="width: 50px" />
                            @endif
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Firstname</label><br/>
                            <i>{{$teacher->firstname}}</i>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Lastname</label><br/>
                            <i>{{$teacher->lastname}}</i>
                            
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Username</label><br/>
                            <i>{{$teacher->lastname}}</i>
                            
                            </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Status</label><br/>
                            <i>{{HelperX::getStatus($teacher->status)}}</i>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Birthday</label><br/>
                            <i>{{$teacher->birthday}}</i>
                            
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Gender</label><br/>
                            <i>{{$teacher->gender}}</i>
                            
                            </div>
                        </div>
                      </div>
                      <br/>
                      <hr/>
                      <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Address</label><br/>
                            <i>{{($teacher->address)}}</i>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Phone</label><br/>
                            <i>{{$teacher->phone}}</i>
                            
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Email</label><br/>
                            <i>{{$teacher->email}}</i>
                            
                            </div>
                        </div>
                      </div>
                  </div>  
          </div>
                 

      </div>
      <div class="tab-pane " id="profile2">
          <div class="x_panel">
                  <div class="x_title">
                    <h4><i class="fa fa-unlock"></i> Change Password</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form class="form-horizontal form-label-left" id="teacherChangePassword">
                          <input type="hidden" value="{{$rowId}}" name="row_id" />
                          <div class="form-group">
                          <label>New Password</label>
                          <input type="password" value="" id="password_teacher"  name="password_teacher" {{HelperX::ve(["veName"=>"Password", "veVs"=>"required"])}} placeholder="Enter Password">
                          </div>
                          <div class="form-group">
                          <label>Confirm New Password</label>
                          <input type="password" id="cpassword_teacher"  name="cpassword_teacher" {{HelperX::ve(["veName"=>"Confirm Password", "veVs"=>"required"])}} placeholder="Enter Confirm Password">
                          </div>

                          <hr/>

                          @include('partials._buttonSave', ['btnId'=>'changePassword', 'title'=>'Change Password']);

                          @include('partials._saveFunc', ["btnID" => "changePassword", "formID"=>"teacherChangePassword", "route"=>"teachers.changepassword", "routeWith"=>"teachers.refreshWith", "rowId"=>$rowId, "update"=>true, ])



                      </form>    
                  </div>
          </div>
      </div>
      <div class="tab-pane " id="profile3">
          <div class="x_panel">
                  <div class="x_title">
                    <h4><i class="fa fa-cog"></i> General Settings</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"></div>
          </div>
      </div>
      <div class="tab-pane " id="profile4">
          <div class="x_panel">
                  <div class="x_title">
                    <h4><i class="fa fa-bank"></i> Classes Taught By This Teacher</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Class Name</th>
                            @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                            <th>Section/Stream</th>
                            @endif
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          <?php $k = 1; ?>
                          @foreach(MsClass::where('teacher_id', $teacher->id)->where('status', 1)->get() as $ms)
                          <tr>
                            <td>{{$k}}</td>
                            <td>{{$ms->class_name}}</td>
                             @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                            <td>{{Section::find($ms->class_section)->name}}</td>
                            @endif
                            @endif
                          </tr>
                          <?php $k++; ?>
                          @endforeach
                        </tbody>
                      </table>

                  </div>
          </div>
      </div>
    </div>
  </div>

</div>
            




<!-- jQuery -->
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

@include('partials._saveFunc', ["btnID" => "saveTeacherEdit", "formID"=>"registerTeacherEdit", "route"=>"teachers.update", "routeWith"=>"teachers.refreshWith", "rowId"=>$rowId, "update"=>true, "photo"=>"profile_photo_edit"])

<!-- bootstrap-daterangepicker -->
    <script src="{{url('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{url('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
<script>
  $(document).ready(function() {

    var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
    var fileInput = $('#profile_photo_edit').wrap(wrapper);

    var fileDisplayArea = document.getElementById('logo-placeholder-edit');

    fileInput.change(function(){
        
        var file = (fileInput[0].files[0]);

        var imageType = /image.*/;

        if (file.type.match(imageType)) {

          $('#EditImage').hide();

          var reader = new FileReader();

          reader.onload = function(e) {
          fileDisplayArea.innerHTML = "";

          // Create a new image.
          var img = new Image();
          // Set the img src property using the data URL.
          img.width = 150;
          img.height = 150;
          img.src = reader.result;

          // Add the image to the page.
          fileDisplayArea.appendChild(img);
          $(fileDisplayArea).append("<br/><hr/><label class='label label-danger' style='cursor:pointer' id='removeLogo_Edit'><i class='fa fa-trash'></i> REMOVE PHOTO</label>");

          }

          reader.readAsDataURL(file);
        } else {
          $('#logo-placeholder-edit').html('');
          var $el = $('#' + target);
          $el.wrap('<form>').closest('form').get(0).reset();
          $el.unwrap();     
          fileDisplayArea.innerHTML = "<label class='label label-danger'><i class='fa fa-warning'></i> File not supported!</label>";
          fileDisplayArea.style.borderRadius = "4px";
          fileDisplayArea.style.border       = "1px solid #ccc";
          fileDisplayArea.style.padding      = "2px";
          return false;
        }

    })

    $('#file').click(function(){
        fileInput.click();
    }).show();

    $('#birthday_edit').daterangepicker({
      autoUpdateInput: false,
      singleDatePicker: true,
      calender_style: "picker_4"
    }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
    $('#birthday_edit').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY'));
    });
  });
</script>

<script type="text/javascript">
$(function(){

$('body').on('click', '#removeLogo_Edit',function(){

          $('#EditImage').delay(100).fadeIn();
          $('#logo-placeholder-edit').html('');
          var $el = $('#profile_photo_edit');
          $el.wrap('<form>').closest('form').get(0).reset();
          $el.unwrap();

});


var j = 0;
$('body').on('click', '#more_edit', function(){
    if(j==0){
      $('#more_teacher_fields_edit').delay(200).fadeIn();
      $(this).removeClass('label-primary').addClass('label-info').html('<i class="fa fa-arrow-up"></i> Less ...')
      j++;
    }else{
      j = 0;
      $('#more_teacher_fields_edit').delay(200).fadeOut();
      $(this).addClass('label-primary').removeClass('label-info').html('<i class="fa fa-arrow-down"></i> More ...')
    }
    
});
});
</script>