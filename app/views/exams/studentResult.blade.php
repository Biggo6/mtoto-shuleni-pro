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

<div id="axx">	
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
</div>

<hr/>

<button id="print_sheet_x" class="btn btn-primary"><i class="fa fa-print"></i> Print Student Result </button>	

<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

<script src="{{url('ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{url('ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>


<script type="text/javascript" src="{{url('printjs/jQuery.print.js')}}"></script>
<script type="text/javascript">

$(document).ready(function() {
      $("body").on('click', '#print_sheet_x',function(){
          $('#axx').print({
                    //Use Global styles
                    globalStyles : true,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Custom stylesheet
                    stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                    //Print in a hidden iframe
                    iframe : false,
                    //Don't print this
                    noPrintSelector : ".avoid-this",
                    //Add this at top
                    prepend : '<center>' + '{{HelperX::getSchoolInfo()->name}}' + '<br/>' + '{{HelperX::getSchoolInfo()->address}}' + ' <br/><br/> <img style="width:92px;height: 92px" src="' + '{{HelperX::getSchoolInfo()->logo}}' + '" /> </center><br/><hr/>',
                    //Add this on bottom
                    append : '<center>Powered By Izweb Technologies LTD (c) MtotoShuleni Pro {{HelperX::getSystemVersion()}}</center>',
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function() { window.location = ""; })
                });
      });
});


</script>


@else


<div class="alert alert-danger">
	<h5>No Data Found</h5>
</div>

@endif