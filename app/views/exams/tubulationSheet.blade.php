@extends('layout')

@section('title', 'Tabulation Sheet')

@section('main')

<div class="row">

	<div class="col-md-12">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Tabulation Sheet</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                    <form id="viewTabulationSheet">
                        <div class="row">
                        
                        <div class="col-md-6">
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
                        
                        <div class="col-md-6">
                                <label>Class</label><br/>
                               <?php $classes = MsClass::where('status', 1)->select('class_name')
                                           ->distinct()
                                           ->get();  ?>
                             <select id="class_name"  name="class_name" style="width:100%"   {{HelperX::ve(["veName"=>"Class", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>



                                 <option value="">--- Select Class ----</option>

                                 @foreach($classes as $c)
                                     <option value="{{$c->class_name}}">{{$c->class_name}}</option>
                                 @endforeach


                             </select>
                        </div>
                        
                    

                        
                       

                        </div>
                        <hr/>
                        <center>
                            <button id="view_sheet" type="button" class="btn btn-primary"><i class="fa fa-eye"></i> View Tabulation Sheet</button>
                        </center>

                      </form>

                      <hr/>

                      <div id="tabulation_sheet_area"></div>

                    
                  </div>
        </div>
	</div>
	

</div>

@stop


