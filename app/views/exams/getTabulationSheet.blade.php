<?php


$exam_name   = $data['exam_name'];
$class_name  = $data['class_name'];


$students = Student::where('class_name', $class_name)->where('running_year', date('Y'))->orderBy('created_at', 'DESC')->get();



?>


@if(count($students))


<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6" >
		<div class="tile-stats" style="background-color: #483747">
		<div class="icon"><i class="fa fa-file"></i>
		</div>
		<div class="count">Tabulation Sheet</div>

		<h3>Class	{{$data['class_name']}} : {{Examlist::find($exam_name)->name}} </h3>
		<p></p>
		</div>	
	</div>
	<div class="col-md-3"></div>
</div>

<hr/>

<div class="row">

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

			<td style="text-align: center;">Total</td>
			<td style="text-align: center;">Average Grade Point</td>

			@endforeach
							
			
		</tr>
	</thead>
	<tbody>


		<?php $students_ids = []; ?>
		@foreach($students as $s)
			<td style="text-align: center;">
				{{$s->firstname}}
				 {{$s->firstname}}
			</td>
			<?php $students_ids[] = $s->id ?>
		@endforeach

		<?php 

				$subjects = DB::table('subjects')->join('msclasses', 'msclasses.id', '=', 'subjects.class_id')->select('subjects.name')->where('msclasses.class_name', $class_name)
							->where('subjects.status', 1)->where('subjects.deleted_at', NULL)->distinct()->get();



			?>

			<?php $c = 0; ?>
			@foreach($subjects as $s)

			<td style="text-align: center;"><input class="form-control"  value="{{HelperX::getStudentMarkX($students_ids[$c], $s->name, $class_name)}}" style="width:100%" type="text" /></td>
			<td style="text-align: center;"></td>
			<td style="text-align: center;"></td>

			<?php $c++; ?>

			@endforeach

	</tbody>
</table>	

</div>


@else

<div class="alert alert-danger">
	<h5>No Students Found</h5>
</div>


@endif