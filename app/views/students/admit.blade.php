<form class="form-horizontal form-label-left" id="registerStudentContinue">
                <div class="modal-body">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text"  name="firstname" {{HelperX::ve(["veName"=>"Firstname", "veVs"=>"required"])}} placeholder="Enter Firstname">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Lastname</label><br/>
                            <input type="text"  name="lastname" {{HelperX::ve(["veName"=>"Lastname", "veVs"=>"required"])}} placeholder="Enter Lastname">

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Parent</label>
                            <?php $parents = Parentx::where('status', 1)->get();  ?>
                            <select name="parentx" style="width:100%"   {{HelperX::ve(["veName"=>"Student Parent", "veVs"=>"required", "clx"=>"select_2", "vePos"=>"topRight"])}}>



                                <option value="">--- Select Parent ----</option>

                                @foreach($parents as $p)
                                    <option value="{{$p->id}}">{{$p->fullname}}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"  name="username" {{HelperX::ve(["veName"=>"Username", "veVs"=>"required", "vePos"=>"bottomLeft"])}} placeholder="Enter Username">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Class</label>
                            <?php $classes = MsClass::where('status', 1)->select('class_name')
            ->distinct()
            ->get();  ?>
                            <select id="student_class_select_"  name="class_name" style="width:100%"   {{HelperX::ve(["veName"=>"Student Class", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>



                                <option value="">--- Select Class ----</option>

                                @foreach($classes as $c)
                                    <option value="{{$c->class_name}}">{{$c->class_name}}</option>
                                @endforeach


                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password_"  name="password" {{HelperX::ve(["veName"=>"Password", "veVs"=>"required,funcCall[checkPassMatch[cpassword_]]", "vePos"=>"bottomLeft"])}} placeholder="Enter Password">
                        </div>
                    </div>

                    @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Section</label>

                          <select id="sectionS_"  name="section" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required", "vePos"=>"bottomLeft"])}}>



                          </select>
                        </div>

                    </div>

                    @endif

                    @endif


                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password"  id="cpassword_"  name="cpassword" {{HelperX::ve(["veName"=>"Confirm Password", "veVs"=>"required,funcCall[checkPassMatch[password_]]", "vePos"=>"bottomLeft"])}} placeholder="Enter Confirm Password">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Admitt Number</label>
                            <input type="text"  name="admitnumber" {{HelperX::ve(["veName"=>"Admit Number", "veVs"=>"required"])}} placeholder="Enter Admit Number">
                        </div>
                    </div>
                </div>

                <span id="more_a" class="label label-primary" style="cursor: pointer"><i class="fa fa-arrow-down"></i> More ...</span><br/><br/>


                <div  style="display:none" id="more_teacher_fields_a">
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
                                <input type="text" id="birthday_" placeholder="Enter Birthday"  name="birthday" class="form-control date-picker" />
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

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <p>Profile Picture<br/><br/>
                          <label id="file" style="cursor: pointer" class="btn btn-warning"><i class="fa fa-photo"></i> Change Photo</label>
                          <input type="file" style="display:none" id="profile_photo_edit"  name="profile_photo_edit" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
                        </p>



                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="logo-placeholder-edit">
                        </div>
                    </div>
                </div>
                <br/><hr/>

                 @include('partials._buttonSave', ['btnId'=>'saveStudentX', 'btn'=>'success', 'title'=>'Save New Student Information']);
                    <a class="btn btn-danger" href="{{route('students.manage')}}">CANCEL</a>


                </div>
            </form>

             <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

             <script src="{{url('ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
             <script src="{{url('ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>

             @include('partials._saveFuncX', ["btnID" => "saveStudentX", "formID"=>"registerStudentContinue", "route"=>"students.store", "routeWith"=>"students.refreshWith","photo"=>"profile_photo_edit"])


             <script type="text/javascript">
                                         $(function(){
                                                 $('body').on('change', '#student_class_select_', function(){
                                                       var sel = $(this).val();
                                                       if(sel!=""){
                                                           $('#sectionS_').prop('disabled', true);
                                                           $('#sectionS_').html('');
                                                           $.post('{{route('students.getSections')}}', {className:sel}, function(res){
                                                                 $('#sectionS_').html(res);
                                                                 $('#sectionS_').prop('disabled', false);
                                                           });
                                                       }
                                                 });

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

             <script src="{{url('vendors/moment/min/moment.min.js')}}"></script>
                 <script src="{{url('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

                  <script>
                                        $(document).ready(function() {
                                          $('#birthday_').daterangepicker({
                                            autoUpdateInput: false,
                                            singleDatePicker: true,
                                            calender_style: "picker_4"
                                          }, function(start, end, label) {
                                            console.log(start.toISOString(), end.toISOString(), label);
                                          });
                                          $('#birthday_').on('apply.daterangepicker', function(ev, picker) {
                                              $(this).val(picker.startDate.format('MM/DD/YYYY'));
                                          });
                                        });
                                      </script>

             <script type="text/javascript" src="{{url('select2/dist/js/select2.min.js')}}"></script>
                 <script type="text/javascript" src="{{url('bf/src/bootstrap-filestyle.min.js')}}"> </script>






           <script>


            $(function(){

                $('body').on('click', '#removeLogo_Edit',function(){

                          $('#EditImage').delay(100).fadeIn();
                          $('#logo-placeholder-edit').html('');
                          var $el = $('#profile_photo_edit');
                          $el.wrap('<form>').closest('form').get(0).reset();
                          $el.unwrap();

                });


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
            });


           $(function(){


                $('.select_2').select2();

                var i = 0;
                $('body').on('click', '#more_a', function(){
                    if(i==0){
                      $('#more_teacher_fields_a').delay(200).fadeIn();
                      $(this).removeClass('label-primary').addClass('label-info').html('<i class="fa fa-arrow-up"></i> Less ...')
                      i++;
                    }else{
                      i = 0;
                      $('#more_teacher_fields_a').delay(200).fadeOut();
                      $(this).addClass('label-primary').removeClass('label-info').html('<i class="fa fa-arrow-down"></i> More ...')
                    }

                });

           });

           </script>
        