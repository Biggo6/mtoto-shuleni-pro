


<?php 
$students = Student::where('section_name', $markmanager['section'] )->where('class_name', $markmanager['class_name'])->where('running_year', date('Y'))->orderBy('created_at', 'DESC')->get();

$i = 1;
?>

@if(count($students))


<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6" >
		<div class="tile-stats" style="background-color: #483747">
		<div class="icon"><i class="fa fa-check-square-o"></i>
		</div>
		<div class="count">Marks For {{Examlist::find($markmanager['exam_name'])->name}} Exam</div>

		<h3>Class	{{$markmanager['class_name']}} : Section	{{$markmanager['section']}}	</h3>
		<p>Subject : {{$markmanager['subject']}}</p>
		</div>	
	</div>
	<div class="col-md-3"></div>
</div>

<hr/>

<div class="row">
	<div class="col-md-3">
		<input id="searchStudent" section_name="{{$markmanager['section']}}" class_name="{{$markmanager['class_name']}}"  type="text" placeholder="Search Student Here ... " class="form-control" />
	</div>
</div>

<br/>


<form  method="POST" action="{{route('exams.saveMarks')}}">	

	<input name="examlist_id" value="{{Examlist::find($markmanager['exam_name'])->id}}" type="hidden"  />


<div id="markss_">



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
		           	<input name="students_ids[]" value="{{$s->id}}" type="hidden"  />
		           	
		          	<input class="form-control" name="students_marks[]" value="{{HelperX::getStudentMark($s->id)}}" style="width:100%" type="text" />
		          </td>
		          <td>
		          	<textarea style="width:100%" name="students_comment[]" class="form-control">{{HelperX::getStudentMarkComment($s->id)}}</textarea>	
		          </td>
		      </tr>
		      <?php $i++; ?>
  		@endforeach
  </tbody>
</table> 



</div>

<hr/>
<center>
    <button id="saveChanges" type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save Changes</button>
</center>

</form>



@else

<div class="alert alert-danger">
	<h5>No Students Found</h5>
</div>



@endif







