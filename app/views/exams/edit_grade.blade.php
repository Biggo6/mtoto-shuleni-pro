<form class="form-horizontal form-label-left" id="registerExamGradeEdit">
  <input type="hidden" name="row_id" value="{{$examgrade->id}}" />
<div class="form-group">
  <label>Grade Name</label>
  <input type="text" value="{{$examgrade->name}}" name="gradename" {{HelperX::ve(["veName"=>"Exam Grade Name", "veVs"=>"required"])}} placeholder="Enter Exam Grade Name">
</div><br/>
<div class="form-group">
  <label>Grade Point</label>
  <input type="text" value="{{$examgrade->grade_point}}"  name="gradepoint" {{HelperX::ve(["veName"=>"Exam Grade Point", "veVs"=>"required,custom[number]"])}} placeholder="Enter Exam Grade Point">
</div><br/>

<div class="form-group">
  <label>Mark From</label>
  <input type="text" value="{{$examgrade->mark_from}}" name="markfrom" {{HelperX::ve(["veName"=>"Exam Mark From", "veVs"=>"required,custom[number]"])}} placeholder="Enter Exam Grade Point">
</div><br/>

<div class="form-group">
  <label>Mark Upto</label>
  <input type="text" value="{{$examgrade->mark_upto}}" name="markupto" {{HelperX::ve(["veName"=>"Exam Mark Upto", "veVs"=>"required,custom[number]"])}} placeholder="Enter Exam Grade Point">
</div><br/>

<div class="form-group">
<label>Comment</label>
<textarea name="comment" class="form-control" placeholder="Description">{{$examgrade->comment}}</textarea>
</div><br/>

<div class="form-group">
    <label>Status</label>
    <select  name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
      @if($examgrade->status == 1)
      <option value="1">Active</option>
      <option value="0">Blocked</option>
      @else
      <option value="0">Blocked</option>
      <option value="1">Active</option>
      @endif
    </select>
  </div><br/>
  <hr/>
  @include('partials._buttonSave', ['btnId'=>'saveExamGradeEdit', 'btn'=>'success', 'title'=>'Update Grade']);
  
</form>

<!-- jQuery -->
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

@include('partials._saveFunc', ["btnID" => "saveExamGradeEdit", "formID"=>"registerExamGradeEdit", "route"=>"exams.update_grade", "routeWith"=>"app.refreshWith", "rowId"=>$examgrade->id, "update"=>true])