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


<div class="col-md-4">
	Student<br/><br/>
	<select id="select_2" class="form-control sel">
		<option value="">---View Single Student Result---</option>
	</select>
</div>
<div class="col-md-4">

</div>



</div>

<br/>
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
			<td style="text-align: center;"></td>
		</tr>
		@endforeach

	</tbody>
</table>	

</div>


@else

<div class="alert alert-danger">
	<h5>No Students Found</h5>
</div>


@endif


<script type="text/javascript" src="{{url('select2/dist/js/select2.min.js')}}"></script>
<script type="text/javascript">

$(document).ready(function() {
      $("body#select_2").select2({
       
      });
});


</script>