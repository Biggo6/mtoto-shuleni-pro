<?php


$exam_name   = $examlist_id;
$class_name  = $class_name;


$students = Student::where('class_name', $class_name)->where('running_year', date('Y'))->orderBy('created_at', 'DESC')->get();



?>

<center>

<table class="table table-bordered table-striped table-condensed mb-none">
	<thead>
		<tr>
		<td style="text-align: center;">
			Students <i class="fa fa-hand-o-down"></i> | Subjects <i class="fa fa-hand-o-right"></i>
		</td>
			
			<?php 

				$subjects = DB::table('subjects')->join('msclasses', 'msclasses.id', '=', 'subjects.class_id')->select('subjects.name')->where('msclasses.class_name', $class_name)
							->where('subjects.status', 1)->where('subjects.deleted_at', NULL)->distinct()->get();



			?>

			@foreach($subjects as $s)

			<td style="text-align: center;">{{$s->name}}</td>

			

			@endforeach


			<td style="text-align: center;">Total</td>
			<td style="text-align: center;">Average</td>
			<td style="text-align: center;">Grade</td>
							
			
		</tr>
	</thead>
	<tbody>


		@foreach($students as $st)
			<tr>
			<td style="text-align: center;">
				{{$st->firstname}}
				 {{$st->lastname}}
			</td>
			<?php $c = 0; $total = 0; ?>
			@foreach($subjects as $s)
			<?php  $total =  $total +  HelperX::getStudentMarkX($st->id, $s->name, $class_name); ?> 
			<td style="text-align: center;">{{HelperX::getStudentMarkX($st->id, $s->name, $class_name)}}</td>
			<?php $c++; ?>
			@endforeach
			<td style="text-align: center;">{{$total}}</td>
			<td style="text-align: center;">{{$total/$c}}</td>
			<td style="text-align: center;">{{HelperX::getGrade(HelperX::getStudentMarkX($st->id, $s->name, $class_name))}}</td>
		</tr>
		@endforeach

	</tbody>
</table>

</center>