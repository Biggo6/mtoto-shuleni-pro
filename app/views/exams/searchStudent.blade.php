<?php 

$tag = $data['student'];

$students = Student::where('section_name', $data['section_name'] )->where('class_name', $data['class_name'])->where('running_year', date('Y'))->orderBy('created_at', 'DESC')->where('firstname', 'LIKE', '%'.$tag.'%')->orWhere('lastname', 'LIKE', '%'.$tag.'%')->get();




?>

@if(count($students))

<table id="datatable-mark" class="table  table-striped table-bordered">
  <thead>
      <tr>
          <th>#</th>
          <th>Admit Number</th>
          <th>Full Name</th>
          <th>Marks Obtained</th>
          <th>Comment</th>
      </tr>
  </thead>
  <tbody>
  		<?php $i=1; ?>
  		@foreach($students as $s)
  			   <tr>
		          <td>{{$i}}</td>
		          <td>{{$s->admit_number}}</td>
		          <td>{{$s->firstname}} {{$s->lastname}}</td>
		          <td>
		          	<input class="form-control" value="{{HelperX::getStudentMark($s->id)}}" style="width:100%" type="text" />
		          </td>
		          <td>
		          	<textarea style="width:100%"  class="form-control">{{HelperX::getStudentMarkComment($s->id)}}</textarea>	
		          </td>
		      </tr>
		      <?php $i++; ?>
  		@endforeach
  </tbody>
</table> 

<hr/>
<center>
    <button id="saveChanges" type="button" class="btn btn-success"><i class="fa fa-check"></i> Save Changes</button>
</center>

@else

<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function(){
	$('#saveChanges').hide();
});
</script>

<div class="alert alert-danger">No Data found here ...</div>

@endif

