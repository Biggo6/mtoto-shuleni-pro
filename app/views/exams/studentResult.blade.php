<?php

$student   = Input::get('student');
$examlist  = Input::get('examlist');
$className = Input::get('className');


$exammarks = Exammark::where('examlist_id', $examlist)->where('student_id', $student)->where('class_name', $className)->where('running_year', date('Y'))->get();


$subjects = DB::table('subjects')->join('msclasses', 'msclasses.id', '=', 'subjects.class_id')->select('subjects.name')->where('msclasses.class_name', $className)
							->where('subjects.status', 1)->where('subjects.deleted_at', NULL)->distinct()->get();

?>


@if(count($exammarks))

<div class="alert alert-info"><i class="fa fa-file"></i> Student Exam Result</div>

<table class="table table-bordered table-striped table-condensed mb-none">
	<thead>
		<tr>
			<td style="text-align: center;">
			Subjects 
			</td>
			<td style="text-align: center;">Marks</td>
			<td style="text-align: center;">Grade</td>		
		</tr>
	</thead>
	<tbody>
		@foreach($subjects as $s)
			<tr>
				<td style="text-align: center;">{{$s->name}}</td>
				<td style="text-align: center;">{{HelperX::getStudentMarkX($student, $s->name, $className)}}</td>
				<td style="text-align: center;">{{HelperX::getGrade(HelperX::getStudentMarkX($student, $s->name, $className))}}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@else


<div class="alert alert-danger">
	<h5>No Data Found</h5>
</div>

@endif