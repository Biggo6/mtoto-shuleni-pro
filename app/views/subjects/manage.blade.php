@extends('layout')

@section('title', 'Manage Subjects')

@section('main')

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New Subject</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                    <form class="form-horizontal form-label-left" id="registerSubject">
                      
                      <div class="form-group">
                        <label>Subject Name</label>
                        <input type="text"  name="subject" {{HelperX::ve(["veName"=>"Subject", "veVs"=>"required"])}} placeholder="Enter Subject Name">
                      </div>

                      <div class="form-group">
                        <label>Class</label>
                        <select id="select_3" name="class_name" {{HelperX::ve(["veName"=>"Class Name", "veVs"=>"required"])}}>
                          <option value="">--Select Class --</option>
                          <?php $classes = MsClass::where('status', 1)->get(); ?>
                          @foreach($classes as $c)
                              <option  value="{{$c->id}}">{{$c->class_name}}</option>
                          @endforeach
                        </select>  
                      </div>

                       @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                      <div class="form-group">
                        <label>Section/Stream</label>
                        <select name="class_section" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required"])}}>
                          <option value="">-- Select Sections/Streams --</option>
                          <?php $sections = Section::where('status', 1)->get(); ?>
                          @foreach($sections as $section)
                              <option value="{{$section->id}}">{{$section->name}}</option>
                          @endforeach
                        </select>  
                      </div>
                       @endif
                      @endif



                      <div class="form-group">
                        <label>Teacher</label>
                        <select id="select_2" name="subject_teacher" {{HelperX::ve(["veName"=>"Teacher", "veVs"=>"required"])}}>
                          <option url="" value="">--Select Teacher --</option>
                          <?php $teachers = Teacher::where('status', 1)->get(); ?>
                          @foreach($teachers as $teacher)
                              <option url="{{$teacher->profile_photo}}" value="{{$teacher->id}}">{{$teacher->firstname}} {{$teacher->lastname}}</option>
                          @endforeach
                        </select>  
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select  name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
                          <option value="1">Active</option>
                          <option value="0">Blocked</option>
                        </select>
                      </div><br/>

                       @include('partials._buttonSave', ['btnId'=>'saveSubject', 'title'=>'Save New Subject']);

                       @section('footerScripts')
                        @include('partials._saveFunc', ["btnID" => "saveSubject", "formID"=>"registerSubject", "route"=>"subjects.store", "routeWith"=>"subjects.refreshWith"])
                      @stop


                  </form>
                    
                  </div>
        </div>
	</div>
	<div class="col-md-8">
		<div class="x_panel">
		<div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage Subject</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
		 				@include('partials._success')
		 				@if(School::count())
                      		@if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                      			<!-- -->
                      			<?php
                      				$data = DB::table('subjects')->join('msclasses', 'msclasses.id', '=', 'subjects.class_id')->join('teachers', 'teachers.id', '=', 'subjects.teacher_id')->join('sections', 'sections.id', '=', 'subjects.section_id')
                      				->select('subjects.name as subject', 'msclasses.class_name as classname', DB::raw('CONCAT(teachers.firstname, " ", teachers.lastname) AS teacher'), 'sections.name as section', 'subjects.status', 'subjects.id')->where('subjects.deleted_at', NULL)->orderBy('subjects.created_at', 'DESC')->get();
                      				
                      			?>
                      			@include('partials._datatable', ["columns"=>["Subject", "Class Name", "Section", "Teacher", "Status", "Actions"], "data"=>$data, "mapEls"=>["subject", "classname", "section", "teacher", "status"], "modal"=>"",
                      				"url_edit"=>"subjects/edit", "url_delete"=>"subjects/destroy", "refreshWix"=>"subjects.refreshWith"
                      			  ])
                      		@else

                      		<?php
                      				$data = DB::table('subjects')->join('msclasses', 'msclasses.id', '=', 'subjects.class_id')->join('teachers', 'teachers.id', '=', 'subjects.teacher_id')->join('sections', 'sections.id', '=', 'subjects.section_id')
                      				->select('subjects.name as subject', 'msclasses.class_name as classname', DB::raw('CONCAT(teachers.firstname, " ", teachers.lastname) AS teacher'), 'subjects.status', 'subjects.id')->where('subjects.deleted_at', NULL)->orderBy('subjects.created_at', 'DESC')->get();
                      				
                      			?>
                      			@include('partials._datatable', ["columns"=>["Subject", "Class Name", "Teacher", "Status", "Actions"], "data"=>$data, "mapEls"=>["subject", "classname", "teacher", "status"], "modal"=>"",
                      				"url_edit"=>"subjects/edit", "url_delete"=>"subjects/destroy", "refreshWix"=>"subjects.refreshWith"
                      			  ])

                      		@endif
                      	@else
                      		<!-- -->
                      		<?php
                      				$data = DB::table('subjects')->join('msclasses', 'msclasses.id', '=', 'subjects.class_id')->join('teachers', 'teachers.id', '=', 'subjects.teacher_id')->join('sections', 'sections.id', '=', 'subjects.section_id')
                      				->select('subjects.name as subject', 'msclasses.class_name as classname', DB::raw('CONCAT(teachers.firstname, " ", teachers.lastname) AS teacher'), 'subjects.status', 'subjects.id')->where('subjects.deleted_at', NULL)->orderBy('subjects.created_at', 'DESC')->get();
                      				
                      			?>
                      			@include('partials._datatable', ["columns"=>["Subject", "Class Name", "Teacher", "Status", "Actions"], "data"=>$data, "mapEls"=>["subject", "classname", "teacher", "status"], "modal"=>"lg",
                      				"url_edit"=>"subjects/edit", "url_delete"=>"subjects/destroy", "refreshWix"=>"subjects.refreshWith"
                      			  ])
                      	@endif	

		</div></div></div>

	</div>

</div>

@stop