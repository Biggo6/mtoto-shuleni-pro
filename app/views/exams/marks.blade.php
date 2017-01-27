@extends('layout')

@section('title', 'Manage Exam Marks')

@section('main')

<div class="row">

	<div class="col-md-12">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-pencil"></i> Manage Exam Marks</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="manageExamMarks">
                        <div class="row">
                        
                        <div class="col-md-3">
                                <label>Exam</label><br/>
                               
                                 <select id="exam_name"  name="exam_name" style="width:100%"   {{HelperX::ve(["veName"=>"Exam Name", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>



                                     <option value="">--- Select Exam Name----</option>

                                     <?php
                                      $exams = Examlist::whereStatus(1)->get();
                                     ?>

                                     @foreach($exams as $e)
                                         <option value="{{$e->id}}">{{$e->name}}</option>
                                     @endforeach


                                 </select>
                        </div>
                        
                        <div class="col-md-3">
                                <label>Class</label><br/>
                               <?php $classes = MsClass::where('status', 1)->select('class_name')
                                           ->distinct()
                                           ->get();  ?>
                             <select id="class_name"  name="class_name" style="width:100%"   {{HelperX::ve(["veName"=>"Class", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>



                                 <option value="">--- Select Class ----</option>

                                 @foreach($classes as $c)
                                     <option value="{{$c->class_name}}">{{$c->class_name}}</option>
                                 @endforeach


                             </select>
                        </div>
                        @if(School::count())
                        @if(HelperX::getSchoolInfo()->isStreamEnable == 1)

                      <div class="col-md-3">
                          <div class="form-group">
                              <label>Section</label>

                            <select id="sectionS"  name="section" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required", "vePos"=>"bottomLeft"])}}>



                            </select>
                          </div>

                      </div>

                      @endif

                      @endif

                <div class="col-md-3">
                          <div class="form-group">
                              <label>Subjects</label>

                            <select id="subjects"  name="subject" {{HelperX::ve(["veName"=>"Subject", "veVs"=>"required", "vePos"=>"bottomLeft"])}}>



                            </select>
                          </div>

                      </div>

                        
                       

                        </div>
                        <hr/>
                        <center>
                            <button id="manage_marks" type="button" class="btn btn-primary"><i class="fa fa-list"></i> Manage Marks</button>
                        </center>
                        <hr/>
                        <div id="marks_area"></div>
                 
                  </div>
        </div>
	</div>
	

</div>

@stop


 @section('footerScripts')



<script type="text/javascript">
    $(function(){
            $('body').on('change', '#class_name', function(){
                  var sel = $(this).val();
                  if(sel!=""){
                      $('#sectionS').prop('disabled', true);
                      $('#sectionS').html('');
                      $.post('{{route('students.getSections')}}', {className:sel}, function(res){
                            $('#sectionS').html(res);
                            $('#sectionS').prop('disabled', false);
                      });
                  }
            });

            $('body').on('change', '#sectionS', function(){
                  var sel = $(this).val();
                  var class_name = $('#class_name').val();
                  if(sel!=""){
                      $('#subjects').prop('disabled', true);
                      $('#subjects').html('');
                      $.post('{{route('students.getSubjects')}}', {sectName:sel, class_name:class_name}, function(res){
                            $('#subjects').html(res);
                            $('#subjects').prop('disabled', false);
                      });
                  }
            });

           



           
    });
</script>

<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

<script src="{{url('ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{url('ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>
<script>
$(function(){
     $('#manage_marks').on('click', function(){
           var manageForm = $('#manageExamMarks').validationEngine('validate');
           if(manageForm){
                $('#manageExamMarks').css('opacity', 0.2);
                $('#manageExamMarks').css('cursor', 'wait');
                $('#manage_marks').css('cursor', 'wait');
                var data = $('#manageExamMarks').serializeArray();
                $('#marks_area').html('');
                $.post('{{route('exams.startManageMarks')}}', data, function(res){
                    $('#manageExamMarks').css('opacity', 1);
                    $('#manageExamMarks').css('cursor', '');
                    $('#manage_marks').css('cursor', '');
                    $('#marks_area').hide().html(res).fadeIn();
                });
           }
     });
});
</script>


@stop