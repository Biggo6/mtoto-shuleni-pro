@extends('layout')

@section('title', 'Add Notice')

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
                    <h2><i class="fa fa-plus"></i> Add New NoticeBoard</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" id="registerParent">
                      
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text"  name="title" {{HelperX::ve(["veName"=>"Title", "veVs"=>"required"])}} placeholder="Enter Title">
                      </div>

                       <div class="form-group">
                        <label>Notice</label>
                        <textarea rows="5" name="notice" {{HelperX::ve(["veName"=>"Notice", "veVs"=>"required"])}} placeholder="Enter Notice"></textarea>
                      </div>

                      <div class="form-group">
                        <label>Class</label>
                        <select style="width:100%" id="notice_class"  {{HelperX::ve(["veName"=>"Student Class", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>
                          <option value="all">All Classes (School)</option>
                          @foreach($classes as $c)
                              <option value="{{$c->class_name}}">{{$c->class_name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <br/>

                       <div class="form-group" id="parent_cate" style="display: none">
                        <label>Parents Category</label>
                        <select style="width:100%" id="select_2x"  {{HelperX::ve(["veName"=>"Parent Category", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>
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
                                <input type="text" id="publish_datetime" placeholder=""  name="birthday" class="form-control date-picker" />
                      </div>

                        
                        <br/>

                     

                        <hr/>

                      @include('partials._buttonSave', ['btnId'=>'saveNotice', 'title'=>'Save Notice']);

                      

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


