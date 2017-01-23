<?php $rowId = $parentx->id; ?>


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
      
      <li class=""><a href="#profile4" data-toggle="tab" aria-expanded="true"><i class="fa fa-graduation-cap"></i> Student </a>
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
                    <h4><i class="fa fa-edit"></i> Edit Parent Information</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <form class="form-horizontal form-label-left" id="registerParentEdit">
                      
                      <input type="hidden" name="row_id" value="{{$parentx->id}}" />
                      <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" value="{{$parentx->fullname}}"  name="fullname" {{HelperX::ve(["veName"=>"Fullname", "veVs"=>"required"])}} placeholder="Enter Fullname">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" value="{{$parentx->email}}"  name="email" class="form-control" placeholder="Enter Email">
                      </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" value="{{User::find($parentx->user_id)->username}}"  name="username" {{HelperX::ve(["veName"=>"  Username", "veVs"=>"required"])}} placeholder="Enter UserName">
                      </div>

                    

                      <span id="more_edit" class="label label-primary" style="cursor: pointer"><i class="fa fa-arrow-down"></i> More ...</span><br/><br/>

                      <div style="display:none" id="more_teacher_fields_edit"> 

                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" value="{{$parentx->address}}" name="address" placeholder="Enter Address" class="form-control" />
                        </div>

                        <div class="form-group">
                          <label>Phone</label>
                          <input type="text" value="{{$parentx->phone}}" name="phone" placeholder="Enter Phone" class="form-control" />
                        </div>

                        <div class="form-group">
                          <label>Profession</label>
                          <input type="text" value="{{$parentx->profession}}" name="profession" placeholder="Enter Profession" class="form-control" />
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

                      @include('partials._buttonSave', ['btnId'=>'saveParentEdit', 'title'=>'Update Parent Info']);

                      

                  </form>
                    
                  </div>
        </div>

            
      </div>
      <div class="tab-pane " id="profile">
          <div class="x_panel">
                  <div class="x_title">
                    <h4><i class="fa fa-user"></i> Parent Information</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                      
                        <div class="col-md-3">
                          <div>
                            <label for="">Fullname</label><br/>
                            <i>{{$parentx->fullname}}</i>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Email</label><br/>
                            <i>{{$parentx->email}}</i>
                            
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Phone</label><br/>
                            <i>{{$parentx->phone}}</i>
                            
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Profession</label><br/>
                            <i>{{$parentx->profession}}</i>
                            
                            </div>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                      
                        <div class="col-md-3">
                          <div>
                            <label for="">Username</label><br/>
                            <i>{{User::find($parentx->user_id)->username}}</i>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Status</label><br/>
                            <i>{{HelperX::getStatus($parentx->status)}}</i>
                            
                        </div>
                        </div>
                        <div class="col-md-3">
                          <div>
                            <label for="">Address</label><br/>
                            <i>{{$parentx->address}}</i>
                            
                            </div>
                        </div>
                      </div>
                      <hr/>
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
                          <input type="password" value="" id="password_teacher"  name="password_teacher" {{HelperX::ve(["veName"=>"Password", "veVs"=>"required,funcCall[checkPassMatch[cpassword_teacher]]"])}} placeholder="Enter Password">
                          </div>
                          <div class="form-group">
                          <label>Confirm New Password</label>
                          <input type="password" id="cpassword_teacher"  name="cpassword_teacher" {{HelperX::ve(["veName"=>"Confirm Password", "veVs"=>"required,funcCall[checkPassMatch[password_teacher]]"])}} placeholder="Enter Confirm Password">
                          </div>

                          <hr/>

                          @include('partials._buttonSave', ['btnId'=>'changePassword', 'title'=>'Change Password']);

                          @include('partials._saveFunc', ["btnID" => "changePassword", "formID"=>"teacherChangePassword", "route"=>"parents.changepassword", "routeWith"=>"parents.refreshWith", "rowId"=>$rowId, "update"=>true, ])



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
                    <h4><i class="fa fa-users"></i> Parent's Students Information</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                         <table class="table table-striped table-hover">
                             <thead>
                               <tr>
                                 <th>#</th>
                                 <th>Photo</th>
                                 <th>Fullname</th>
                                 <th>Class Name</th>
                                 <th>Section</th>
`
                               </tr>
                             </thead>
                             <tbody>
                               <?php $k = 1; ?>
                               @foreach(Student::where('parent_id', $parentx->id)->where('status', 1)->get() as $s)
                               <tr>
                                 <td>{{$k}}</td>
                                 <td>
                                    @if($s->profile_photo == "")
                                        <img src="{{url('images/img.jpg')}}" style="width: 52px" />
                                    @else
                                        <img src="{{url($s->profile_photo)}}" style="width: 53px" />
                                    @endif
                                 </td>
                                 <td>{{$s->firstname}} {{$s->lastname}}</td>
                                 <td>{{$s->class_name}}</td>
                                 <td>{{$s->section_name}}</td>

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

@include('partials._saveFunc', ["btnID" => "saveParentEdit", "formID"=>"registerParentEdit", "route"=>"parents.update", "routeWith"=>"parents.refreshWith", "rowId"=>$rowId, "update"=>true])

 <script type="text/javascript">
    function checkPassMatch(field, rules, i, options){
        var a=rules[i+2];
        if((field.val()) != ( $("#"+a).val() ) ){
           return "Password Mismatches"
        }
    }
</script>

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