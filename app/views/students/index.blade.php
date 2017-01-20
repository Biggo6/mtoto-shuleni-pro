@extends('layout')

@section('title', 'Manage Students')

@section('main')

<div class="modal fade" id="modal-add-student">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Add New Student</h4>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-student-bulk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Add Bulk Students</h4>
            </div>
            <div class="modal-body">
                
            </div>
        </div>
    </div>
</div

<div class="row">

	<div class="col-md-12">
		<div class="x_panel">
                  <div class="x_title">
                    <h2>
                    	<button data-toggle="modal" href='#modal-add-student' class="btn btn-success"><i class="fa fa-plus"></i> Admit Student</button>
                    	<!-- <button data-toggle="modal" href='#modal-add-student-bulk' class="btn btn-warning"><i class="fa fa-plus"></i> Admit Bulk Student</button> -->
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                    <div class="row">
                    	
                    	<div class="col-md-3">
                    			<div class="form-group" id="sxl">
			                        <h3>Select Class</h3>
			                        <select id="sel" name="class_name" class="form-control">
			                          <option>--Select Class --</option>
			                          <?php $classes =  MsClass::where('status', 1)->select('class_name')
            ->distinct()
            ->get(); ?>
			                          @foreach($classes as $c)
			                              <option  value="{{$c->class_name}}">{{$c->class_name}}</option>
			                          @endforeach
			                        </select>  
			                      </div>
                    	</div>
                    	<div class="col-md-3"></div>
                    </div>

                    <hr/>

                    <div class="row">
                    	<div class="col-md-12">
                    		<img id="ijax" style="display:none" src="{{url('images/ijax.gif')}}" />
                    	</div>
                    </div>
                    
                    <div id="students_area"></div>	
                    
                    
                  </div>
        </div>
	</div>
	

</div>

@stop

@section('footerScripts')

<script type="text/javascript">
$(function(){
	$('body').on('change', '#sel', function(){
		var sel = $(this).val();
		if(sel!=""){
			$('#ijax').show();
			$('#sel').prop('disabled', true);
			$('#students_area').html('');
			$.post('{{route('students.fetch')}}', {class_name:sel}, function(res){
				$('#ijax').hide();
				$('#sel').prop('disabled', false);
				$('#students_area').hide().html(res).fadeIn();
			});
		}
	});
});	
</script>

@stop