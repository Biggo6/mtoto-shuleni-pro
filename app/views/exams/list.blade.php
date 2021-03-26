@extends('layout')

@section('title', 'Exams List')

@section('main')

<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New Exam</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                     <form class="form-horizontal form-label-left" id="registerExam">
                             <div class="form-group">
                                <label>Exam Name</label>
                                <input type="text"  name="examname" {{HelperX::ve(["veName"=>"Exam Name", "veVs"=>"required"])}} placeholder="Enter Exam Name">
                              </div><br/>
                              <div class="form-group">
                              <label>Comment</label>
                              <textarea name="comment" class="form-control" placeholder="Description"></textarea>
                            </div><br/>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" id="birthday" placeholder="Enter Exam Date"  name="examdate" {{HelperX::ve(["veName"=>"Exam Date", "veVs"=>"required"])}} />
                             </div><br/>
                              <div class="form-group">
                                  <label>Status</label>
                                  <select  name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
                                    <option value="1">Active</option>
                                    <option value="0">Blocked</option>
                                  </select>
                                </div><br/>
                                <hr/>
                                @include('partials._buttonSave', ['btnId'=>'saveExam', 'btn'=>'success', 'title'=>'Add Exam']);
                                @include('partials._saveFunc', ["btnID" => "saveExam", "formID"=>"registerExam", "route"=>"exams.list", "routeWith"=>"app.refreshWith"])

                     </form>
                  </div>
        </div>
	</div>
	 <div class="col-md-8">

<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage Examlists</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    @include('partials._success')

                    <?php
                      $data = Examlist::orderBy('created_at', 'DESC')->get();
                    ?>

                    @include('partials._datatable', ["columns"=>["Exam Name", "Comment", "Date", "Status", "Actions"], "mapEls"=>["name", "comment", "exam_date", "status"], "data"=>$data, "modal"=>"", "url_edit"=>"exams/edit_list", "url_delete"=>"exams/destroy_list", "refreshWix"=>"app.refreshWith"])


                  </div>
        </div>

  </div>

</div>

@stop