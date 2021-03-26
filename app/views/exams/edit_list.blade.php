<?php

$rowId = $examlist->id;

?>

<form class="form-horizontal form-label-left" id="registerExamEdit">

        <input type="hidden" name="row_id" value="{{$rowId}}" />

       <div class="form-group">
          <label>Exam Name</label>
          <input type="text" value="{{$examlist->name}}"  name="examname" {{HelperX::ve(["veName"=>"Exam Name", "veVs"=>"required"])}} placeholder="Enter Exam Name">
        </div><br/>
        <div class="form-group">
        <label>Comment</label>
        <textarea name="comment" class="form-control" placeholder="Description">{{$examlist->comment}}</textarea>
      </div><br/>
      <div class="form-group">
          <label>Date</label>
          <input type="text" value="{{$examlist->exam_date}}" id="birthday_edit" placeholder="Enter Exam Date"  name="examdate" {{HelperX::ve(["veName"=>"Exam Date", "veVs"=>"required"])}} />
       </div><br/>
        <div class="form-group">
            <label>Status</label>
            <select  name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
              @if($examlist->status == 1)
              <option value="1">Active</option>
              <option value="0">Blocked</option>
              @else
              <option value="0">Blocked</option>
              <option value="1">Active</option>
              @endif
            </select>
          </div><br/>
          <hr/>
          @include('partials._buttonSave', ['btnId'=>'saveExamEdit', 'btn'=>'primary', 'title'=>'Update Exam']);
      

</form>


<!-- jQuery -->
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

@include('partials._saveFunc', ["btnID" => "saveExamEdit", "formID"=>"registerExamEdit", "route"=>"exams.update_list", "routeWith"=>"app.refreshWith", "rowId"=>$rowId, "update"=>true])

<script src="{{url('vendors/moment/min/moment.min.js')}}"></script>
<script src="{{url('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script type="text/javascript">

$('#birthday_edit').daterangepicker({
  autoUpdateInput: false,
  singleDatePicker: true,
  calender_style: "picker_4"
}, function(start, end, label) {
  console.log(start.toISOString(), end.toISOString(), label);
});
$('#birthday').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY'));
});
</script>
