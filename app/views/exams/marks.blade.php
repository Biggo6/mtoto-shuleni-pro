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





@stop