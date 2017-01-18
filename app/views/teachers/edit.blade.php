<form class="form-horizontal form-label-left" id="registerTeacherEdit">

<div class="form-group">
<label>First Name</label>
<input type="text" value="{{$teacher->firstname}}"  name="firstname" {{HelperX::ve(["veName"=>"First  Name", "veVs"=>"required"])}} placeholder="Enter First Name">
</div>

<div class="form-group">
<label>Last Name</label>
<input type="text" value="{{$teacher->lastname}}"  name="lastname" {{HelperX::ve(["veName"=>"Last  Name", "veVs"=>"required"])}} placeholder="Enter Last Name">
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
<p>Profile Picture <label style="cursor: pointer" class="label label-warning">Change Photo</label></p>

<div class="show-image">
  <div id="logo-placeholder">
    @if($teacher->profile_photo == "")
      <img style="width:92px;height: 92px" src="{{url('images/img.jpg')}}" />
    @else
      <img style="width:92px;height: 92px" src="{{$teacher->profile_photo}}" />
    @endif
  </div>
  @if($teacher->profile_photo != "")
  <span class="delete label label-danger photoToRemove" type="button" value=""><i class="fa fa-trash"></i> Remove Photo</span> 
  @endif
</div><br/>
<p></p>



</div>
<hr/>

@include('partials._buttonSave', ['btnId'=>'saveTeacherEdit', 'title'=>'Update Teacher']);

</form>

<!-- jQuery -->
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

<!-- bootstrap-daterangepicker -->
    <script src="{{url('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{url('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
<script>
  $(document).ready(function() {
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