@extends('layout')

@section('title', 'Exam Grades')

@section('main')

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New Grade</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                    <form class="form-horizontal form-label-left" id="registerExamGrade">
                             <div class="form-group">
                                <label>Grade Name</label>
                                <input type="text"  name="gradename" {{HelperX::ve(["veName"=>"Exam Grade Name", "veVs"=>"required"])}} placeholder="Enter Exam Grade Name">
                              </div><br/>
                              <div class="form-group">
                                <label>Grade Point</label>
                                <input type="text"  name="gradepoint" {{HelperX::ve(["veName"=>"Exam Grade Point", "veVs"=>"required,custom[number]"])}} placeholder="Enter Exam Grade Point">
                              </div><br/>

                              <div class="form-group">
                                <label>Mark From</label>
                                <input type="text"  name="markfrom" {{HelperX::ve(["veName"=>"Exam Mark From", "veVs"=>"required,custom[number]"])}} placeholder="Enter Exam Grade Point">
                              </div><br/>

                              <div class="form-group">
                                <label>Mark Upto</label>
                                <input type="text"  name="markupto" {{HelperX::ve(["veName"=>"Exam Mark Upto", "veVs"=>"required,custom[number]"])}} placeholder="Enter Exam Grade Point">
                              </div><br/>

                              <div class="form-group">
                              <label>Comment</label>
                              <textarea name="comment" class="form-control" placeholder="Description"></textarea>
                            </div><br/>
                            
                              <div class="form-group">
                                  <label>Status</label>
                                  <select  name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
                                    <option value="1">Active</option>
                                    <option value="0">Blocked</option>
                                  </select>
                                </div><br/>
                                <hr/>
                                @include('partials._buttonSave', ['btnId'=>'saveExamGrade', 'btn'=>'success', 'title'=>'Add Exam Grade']);
                                @include('partials._saveFunc', ["btnID" => "saveExamGrade", "formID"=>"registerExamGrade", "route"=>"exams.gradex", "routeWith"=>"app.refreshWith"])

                     </form>
                    
                  </div>
        </div>
	</div>
	<div class="col-md-8">

<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage Exam Grades</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    @include('partials._success')

                    <?php
                      $data = Examgrade::orderBy('created_at', 'DESC')->get();
                    ?>

                    @include('partials._datatable', ["columns"=>["Grade Name", "Grade Point", "Mark From", "Mark Upto", "Comment", "Status", "Actions"], "mapEls"=>["name", "grade_point", "mark_from", "mark_upto",  "comment", "status"], "data"=>$data, "modal"=>"", "url_edit"=>"exams/edit_grade", "url_delete"=>"exams/destroy_grade", "refreshWix"=>"app.refreshWith"])


                  </div>
        </div>


  </div>

</div>

@stop