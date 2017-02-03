@extends('layout')

@section('title', 'Send Result SMS ')

@section('main')

<?php 

$classes = MsClass::where('status', 1)->select('class_name')
                                           ->distinct()
                                           ->get();  
?>

<div class="row">

	<div class="col-md-8">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-envelope"></i> Send Results To Parents</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" id="registerNotice">


                      <div class="form-group">

                        <label>Exam</label><br/>
                               
                         <select id="exam_name"  name="exam_name" style="width:100%"   {{HelperX::ve(["veName"=>"Exam Name", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>



                             <option value="">--- Select Exam Name----</option>

                             <?php
                              $exams = Examlist::whereStatus(1)->get();
                             ?>

                             @foreach($exams as $e)
                                 <option value="{{$e->id}}">{{$e->name}}</option>
                             @endforeach


                         </select>
                      </div>
                      
                      

                      <div class="form-group">
                        <label>Class</label>
                        <select style="width:100%" id="notice_class" name="notice_class"  {{HelperX::ve(["veName"=>"Student Class", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>
                          <option value="all">All Classes (School)</option>
                          @foreach($classes as $c)
                              <option value="{{$c->class_name}}">{{$c->class_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <br/>

                       <div class="form-group" id="parent_cate" style="display: none">
                        <label>Parents Category</label>
                        <select style="width:100%" id="select_2x" name="parent_cat" {{HelperX::ve(["veName"=>"Parent Category", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>
                          <option value="">-- Select Parent Category----</option>
                          <option value="1">Singe Student </option>
                          <option value="0">Multiple Students </option>
                          <option value="2">All Students </option>
                          
                        </select>
                      </div>
                      <br/>

                      
                      <img style="display: none" id="jax" src="{{url('images/ijax.gif')}}" />

                      <div id="student_areas"></div>

                      <div class="form-group">
                        <label>Send As</label>
                        <select style="width:100%" name="send_as" class="form-control">
                              <option value="sms">SMS</option>
                              <option value="email">E-Mail</option>
                              <option value="both">Both Email & SMS </option>
                        </select>
                      </div>


                      <div class="form-group">
                        <br/><br/><hr/>
                        <div class="">
                                        <label>
                                          <input type="checkbox" id="publish_now" name="publish_now" class="js-switch" checked /> Publish Now
                                        </label>
                                    </div>
                      </div>

                      <br/>

                      <div class="form-group" id="schudor" style="display: none">
                                <label>Schedule Time For Publishing</label>
                                <input type="text" id="publish_datetime" placeholder=""  name="schudor_datetime" class="form-control date-picker" />
                      </div>

                        
                        <br/>

                     

                        <hr/>

                      <p>@include('partials._buttonSave', ['btnId'=>'saveNotice', 'title'=>'Save']);
                      <button class="btn btn-success"><i class="fa fa-list"></i> Manage Results Messages</button></p>

                       @section('footerScripts')
                        @include('partials._saveFunc', [ "btnID" => "saveNotice", "formID"=>"registerNotice", "route"=>"notice.store", "routeWith"=>"noticeboard.manage"])
                      @stop

                      

                  </form>
                  </div>
        </div>
	</div>
	<div class="col-md-8"></div>

</div>


<script type="text/javascript">
$(function(){
    $('#notice_class').on('change', function(){
        var sel = $(this).val();
        
        if(sel == "all"){
            $('#parent_cate').hide();
        }else{
            $('#parent_cate').show();
        }
    });

    $('#publish_now').on('change', function(){
       

        if($(this).is(":checked")){
            $('#schudor').hide();
        }else{
            $('#schudor').show();
        }


    
    });


    $('#select_2x').on('change', function(){
        var sel = $(this).val();
        if(sel != 2){
            $('#saveNotice').prop('disabled', true);
            $('#jax').show();
            $('#student_areas').html('');
            $.get('{{route('notice.getStudents')}}', {parent_cat:sel, class_name: $('#notice_class').val()}, function(res){
               $('#jax').hide(); 
               $('#student_areas').html(res);
               $('#saveNotice').prop('disabled', false);
            });
        }else{
            $('#jax').hide();
            $('#student_areas').html('');
            $('#saveNotice').prop('disabled', false);
        }

    });

});
</script>

@stop


