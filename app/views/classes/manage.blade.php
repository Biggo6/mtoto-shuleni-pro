@extends('layout')

@section('title', 'Manage Classes')

@section('main')



<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New Class</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <form class="form-horizontal form-label-left" id="registerClass">
                      

                      <div class="form-group">
                        <label>Class</label>
                        <select id="editable-select" name="class_name" {{HelperX::ve(["veName"=>"Class Name", "veVs"=>"required"])}}>
                          
                          

                          <?php ?>
                          @foreach($classes as $c)
                              <option  value="{{$c->id}}">{{$c->class_name}}</option>
                          @endforeach
                        </select>  
                      </div>

                      <!-- <div class="form-group">
                        <label>Name</label>



                        <input type="text"  name="class_name" {{HelperX::ve(["veName"=>"Class Name", "veVs"=>"required"])}} placeholder="Enter Class Name">
                      </div> --><br/>

                      @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                      <div class="form-group">
                        <label>Section/Stream</label>
                        <select name="class_section" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required"])}}>
                          <option value="">--Select Section / Stream --</option>
                          <?php $sections = Section::where('status', 1)->get(); ?>
                          @foreach($sections as $section)
                              <option value="{{$section->id}}">{{$section->name}}</option>
                          @endforeach
                        </select>  
                      </div>
                       @endif
                      @endif

                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                      </div><br/>
                      <div class="form-group">
                        <label>Status</label>
                        <select  name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
                          <option value="1">Active</option>
                          <option value="0">Blocked</option>
                        </select>
                      </div><br/>

                      <div class="form-group">
                        <label>Teacher</label>
                        <select id="select_2" name="class_teacher" {{HelperX::ve(["veName"=>"Teacher", "veVs"=>"required"])}}>
                          <option url="" value="">--Select Teacher --</option>
                          <?php $teachers = Teacher::where('status', 1)->get(); ?>
                          @foreach($teachers as $teacher)
                              <option url="{{$teacher->profile_photo}}" value="{{$teacher->id}}">{{$teacher->firstname}} {{$teacher->lastname}}</option>
                          @endforeach
                        </select>  
                      </div>
                      <hr/>

                      @include('partials._buttonSave', ['btnId'=>'saveClass', 'title'=>'Save New Class']);

                      @section('footerScripts')
                        @include('partials._saveFunc', ["btnID" => "saveClass", "formID"=>"registerClass", "route"=>"msclasses.store", "routeWith"=>"msclasses.refreshWith"])
                      @stop

                    </form>
                    
                  </div>
        </div>
	</div>
	<div class="col-md-8">
    <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage all Classes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    @include('partials._success')


                    @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                  @include('partials._datatable', [

                  "columns"=>["Class Name", "Section/Stream", "Description", "Status", "Teacher", "Actions"], 

                  "mapEls"=>["className", "classSection", "description", "status", "fullname"], "data"=>


                  DB::table('msclasses')
                  ->join('teachers', 'teachers.id', '=', 'msclasses.teacher_id')
                  ->join('sections', 'sections.id', '=', 'msclasses.class_section')
                  ->select('msclasses.id', 'msclasses.class_name as className', 'sections.name as classSection', 'msclasses.description', 'msclasses.status', DB::raw('CONCAT(teachers.firstname, " ", teachers.lastname) AS fullname'))
                  ->where('msclasses.deleted_at', NULL)->orderBy('msclasses.created_at', 'DESC')->get()


                  , "modal"=>"lg", "url_edit"=>"msclasses/edit", "url_delete" =>"msclasses/destroy", "refreshWix"=>"msclasses.refreshWith"  ])

                      @else


                  @include('partials._datatable', [

                  "columns"=>["Class Name", "Description", "Status", "Teacher", "Actions"], 

                  "mapEls"=>["className", "description", "status", "fullname"], "data"=>


                  DB::table('msclasses')
                  ->join('teachers', 'teachers.id', '=', 'msclasses.teacher_id')
                  ->join('sections', 'sections.id', '=', 'msclasses.class_section')
                  ->select('msclasses.id', 'msclasses.class_name as className', 'msclasses.description', 'msclasses.status', DB::raw('CONCAT(teachers.firstname, " ", teachers.lastname) AS fullname'))
                  ->where('msclasses.deleted_at', NULL)->orderBy('msclasses.created_at', 'DESC')->get()


                  , "modal"=>"", "url_edit"=>"msclasses/edit", "url_delete" =>"msclasses/destroy", "refreshWix"=>"msclasses.refreshWith"  ])




                      @endif
                    @endif



                  </div>
        </div>
  </div>

</div>

@stop