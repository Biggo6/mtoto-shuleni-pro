

<?php
	
	$sections = MsClass::where('class_name', $c)->where('status',1)->where('class_section', '!=', 0)->count();
	if($sections != 0){
      $real_sections = Section::all();
      $class_sections = MsClass::where('status', 1)->where('class_name', $c)->select('class_section')
            ->distinct()
            ->get();

           $css = []; 
          foreach ($class_sections as $cs) {
              $css[] = Section::find($cs->class_section)->name;
          }
  }
  

?>

<div >
	<h3 class="alert alert-info">Students Information - Class : <label class="label label-danger"><i>{{$c}}</i></label></h3>
</div>
<hr/>

<div class="modal fade" id="modal-mark-sheet">
                            	<div class="modal-dialog modal-lg">
                            		<div class="modal-content">
                            			<div class="modal-header">
                            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            				<h4 class="modal-title"><i class="fa fa-file"></i> Marking Sheet</i></h4>
                            			</div>
                            			<div class="modal-body">

                            			</div>

                            		</div>
                            	</div>
                            </div>


<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i> All Students ({{Student::where('class_name', $c)->orderBy('created_at', 'DESC')->count()}})</a>
    </li>
    @if(School::count())
                          @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
    @if($sections!=0)
      <?php $cc=2; ?>
      @foreach($real_sections as $rs)
        @if(in_array($rs->name, $css))
      <li role="presentation" class=""><a href="#tab_content{{$cc}}" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Section {{$rs->name}} ({{Student::where('section_name', $rs->name)->where('class_name', $c)->orderBy('created_at', 'DESC')->count()}})</a>
      </li>
      @endif
      <?php $cc++; ?>
      @endforeach
    @endif

    @endif
    @endif
    
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
        
        <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                            <table id="datatable" class="table  table-striped table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Admit Number</th>
                                      <th>Photo</th>
                                      <th>Full Name</th>
                                      <th>Address</th>
                                      <th>Email</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>

                                  <?php 
                                      $students = Student::where('class_name', $c)->orderBy('created_at', 'DESC')->get();

                                      $i = 1;
                                  ?>

                                 @foreach($students as $s)
                                  <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$s->admit_number}}</td>
                                    <td>
                                        @if($s->profile_photo == "")
                                            <img src="{{url('images/img.jpg')}}" style="width:52px" />
                                        @else
                                             <img src="{{$s->profile_photo}}" style="width:52px" />
                                        @endif
                                    </td>
                                    <td>{{$s->firstname}} {{$s->lastname}}</td>
                                    <td>{{$s->address}}</td>
                                    <td>{{$s->email}}</td>
                                    <td>
                                        <span data-toggle="modal" href='#modal-mark-sheet' style="cursor: pointer" class="label label-primary mark_sheet_student" row_id="{{$s->id}}"><i class="fa fa-signal"></i> Mark Sheet</span>
                                        <span data-toggle="modal" href='#modal-student-edit' style="cursor: pointer" class="label label-success edit_student" row_id="{{$s->id}}"><i class="fa fa-edit"></i> Edit</span>
                                        <span style="cursor: pointer" class="label label-danger delete_student" row_id="{{$s->id}}"><i class="fa fa-trash"></i> Delete</span>
                                    </td>
                                  </tr>
                                  <?php $i++; ?>
                                  @endforeach
                              </tbody>
                            </table> 
                  </div>
      </div>

         
    </div>
    @if($sections!=0)
      <?php $ccc=2; ?>
      @foreach($real_sections as $rs)
        @if(in_array($rs->name, $css))
        <div role="tabpanel" class="tab-pane fade in" id="tab_content{{$ccc}}" aria-labelledby="home-tab">

          <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<table id="datatable{{$ccc}}" class="table  table-striped table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Admit Number</th>
                                      <th>Photo</th>
                                      <th>Full Name</th>
                                      <th>Address</th>
                                      <th>Email</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 <?php
                                                                       $students = Student::where('section_name',$rs->name )->where('class_name', $c)->orderBy('created_at', 'DESC')->get();

                                                                       $i = 1;
                                                                   ?>

                                                                  @foreach($students as $s)
                                                                   <tr>
                                                                     <td>{{$i}}</td>
                                                                     <td>{{$s->admit_number}}</td>
                                                                     <td>
                                                                         @if($s->profile_photo == "")
                                                                             <img src="{{url('images/img.jpg')}}" style="width:52px" />
                                                                         @else
                                                                              <img src="{{$s->profile_photo}}" style="width:52px" />
                                                                         @endif
                                                                     </td>
                                                                     <td>{{$s->firstname}} {{$s->lastname}}</td>
                                                                     <td>{{$s->address}}</td>
                                                                     <td>{{$s->email}}</td>
                                                                     <td>
                                                                             <span data-toggle="modal" href='#modal-mark-sheet' style="cursor: pointer" class="label label-primary mark_sheet_student" row_id="{{$s->id}}"><i class="fa fa-signal"></i> Mark Sheet</span>
                                                                              <span data-toggle="modal" href='#modal-student-edit' style="cursor: pointer" class="label label-success edit_student" row_id="{{$s->id}}"><i class="fa fa-edit"></i> Edit</span>
                                                                                                                    <span style="cursor: pointer" class="label label-danger delete_student" row_id="{{$s->id}}"><i class="fa fa-trash"></i> Delete</span>

                                                                     </td>
                                                                   </tr>
                                                                   <?php $i++; ?>
                                                                   @endforeach
                              </tbody>
                            </table> 
                  </div>
          </div>        
                           

    </div>
      @endif
      <?php $ccc++; ?>
      @endforeach
    @endif
    
  </div>
</div>

     <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

     <script>
        $(function(){

            $('.edit_student').on('click', function(){
                 var student_id  = $(this).attr('row_id');
                 $('#loader_').show();
                 $('#student_editor').html('');
                  $.post('{{route('students.edit', 1)}}', {student_id:student_id}, function(res){
                        $('#loader_').hide();
                        $('#student_editor').hide().html(res).fadeIn();
                 });
            });

            $('.delete_student').on('click', function(){

                        var student_id  = $(this).attr('row_id');

                        var that = $(this);

                        swal({
                          title: "Are you sure?",
                          text: "You will not be able to recover this imaginary file!",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "Yes, delete it!",
                          cancelButtonText: "No, cancel plx!",
                          closeOnConfirm: false,
                          closeOnCancel: true
                        },
                        function(isConfirm){
                          if (isConfirm) {

                                            $(that).parent().parent().css('opacity', 0.2);

                                            $.post('{{route('students.destroy', 1)}}', {student_id:student_id}, function(res){
                                                    $(that).parent().parent().delay(100).fadeOut();
                                                    swal({
                                                        title: 'Deleted',
                                                        text: 'Successfully deleted!',
                                                        type: 'success'
                                                    }, function() {

                                                    });
                                            });



                          }
                        });



            });
        });
     </script>

       <script src="{{url('ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
                  <script src="{{url('ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>

<!-- Datatables -->
    <script src="{{url('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{url('vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>

    <script type="text/javascript">
    $(function(){
        $('#datatable').dataTable();
        @if($sections!=0)
        <?php $cx=2; ?>
        @foreach($real_sections as $rs)
          @if(in_array($rs->name, $css))
            $('#datatable{{$cx}}').dataTable();
          @endif
          <?php $cx++; ?>
        @endforeach
        @endif  

    });
    </script>    

