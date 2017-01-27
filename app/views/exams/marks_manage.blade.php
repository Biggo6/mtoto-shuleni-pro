


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

<table id="datatable" class="table  table-striped table-bordered">
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
		          	<input class="form-control" style="width:100%" type="text" />
		          </td>
		          <td>
		          	<textarea class="form-control"></textarea>	
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

<div class="alert alert-danger">
	<h5>No Students Found</h5>
</div>

@endif

<!-- jQuery -->
    <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Datatables -->
    <script src="{{url('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{url('vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>

    <script type="text/javascript">
    $(function(){
        $('#datatable').dataTable({
            "bPaginate": false
        });
    });
    </script>  




