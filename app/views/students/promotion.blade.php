@extends('layout')

@section('title', 'Students Promotion')

@section('main')



		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-line-chart"></i> Student Promotion</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="promoteForm">
                        <div class="row">
                        <div class="col-md-2">

                                <label>Current Session</label><br/>
                                <select class="form-control" name="currentYear">
                                    <option value="{{date('Y')}}">{{date('Y')}} - {{HelperX::getNextYear()}}</option>
                                </select>
                        </div>
                        <div class="col-md-2">
                                <label>Promote To Session</label><br/>
                                <select class="form-control" name="promotedYear">
                                    <option value="{{date('Y')}}">{{date('Y')}} - {{HelperX::getNextYear()}}</option>
                                    <option value="{{HelperX::getNextYear()}}">{{HelperX::getNextYear()}} - {{HelperX::getNextOfNextYear()}}</option>
                                </select>
                        </div>
                        <div class="col-md-2">
                                <label>Promotion From Class</label><br/>
                               <?php $classes = MsClass::where('status', 1)->select('class_name')
                                           ->distinct()
                                           ->get();  ?>
                                                           <select id="student_class_select_from"  name="class_name_from" style="width:100%"   {{HelperX::ve(["veName"=>"Student Class", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>



                                                               <option value="">--- Select Class ----</option>

                                                               @foreach($classes as $c)
                                                                   <option value="{{$c->class_name}}">{{$c->class_name}}</option>
                                                               @endforeach


                                                           </select>
                        </div>
                        @if(School::count())
                                                                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label>Section</label>

                                                                          <select id="sectionS"  name="section_from" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required", "vePos"=>"bottomLeft"])}}>



                                                                          </select>
                                                                        </div>

                                                                    </div>

                                                                    @endif

                                                                    @endif

                        <div class="col-md-2">
                                <label>Promotion To Class</label><br/>
                                <?php $classes = MsClass::where('status', 1)->select('class_name')
                                            ->distinct()
                                            ->get();  ?>
                                                            <select id="student_class_select_to"  name="class_name_to" style="width:100%"   {{HelperX::ve(["veName"=>"Student Class", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>



                                                                <option value="">--- Select Class ----</option>

                                                                @foreach($classes as $c)
                                                                    <option value="{{$c->class_name}}">{{$c->class_name}}</option>
                                                                @endforeach


                                                            </select>
                        </div>
                        @if(School::count())
                                              @if(HelperX::getSchoolInfo()->isStreamEnable == 1)

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Section</label>

                                                  <select id="sectionS_to"  name="section_to" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required", "vePos"=>"bottomLeft"])}}>



                                                  </select>
                                                </div>

                                            </div>

                                            @endif

                                            @endif

                        </div>
                        <hr/>
                        <center>
                            <button id="manage_promotion" type="button" class="btn btn-primary"><i class="fa fa-list"></i> Manage Promotion</button>
                        </center>
                        <hr/>
                        <div id="promotion_area"></div>
                  </div>
        </div>



        </div>

</form>


@stop


 @section('footerScripts')

                        <script type="text/javascript">
                            $(function(){
                                    $('body').on('change', '#student_class_select_from', function(){
                                          var sel = $(this).val();
                                          if(sel!=""){
                                              $('#sectionS').prop('disabled', true);
                                              $('#sectionS').html('');
                                              $.post('{{route('students.getSections')}}', {className:sel}, function(res){
                                                    $('#sectionS').html(res);
                                                    $('#sectionS').prop('disabled', false);
                                              });
                                          }
                                    });

                                    $('body').on('change', '#student_class_select_to', function(){
                                          var sel = $(this).val();
                                          if(sel!=""){
                                              $('#sectionS_to').prop('disabled', true);
                                              $('#sectionS_to').html('');
                                              $.post('{{route('students.getSections')}}', {className:sel}, function(res){
                                                    $('#sectionS_to').html(res);
                                                    $('#sectionS_to').prop('disabled', false);
                                              });
                                          }
                                    });



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

                  <script src="{{url('ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
                  <script src="{{url('ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>
                  <script>
                        $(function(){
                             $('#manage_promotion').on('click', function(){
                                   var manageForm = $('#promoteForm').validationEngine('validate');
                                   if(manageForm){
                                        $('#promoteForm').css('opacity', 0.2);
                                        $('#promoteForm').css('cursor', 'wait');
                                        $('#manage_promotion').css('cursor', 'wait');
                                        var data = $('#promoteForm').serializeArray();
                                        $('#promotion_area').html('');
                                        $.post('{{route('students.promotionx')}}', data, function(res){
                                            $('#promoteForm').css('opacity', 1);
                                            $('#promoteForm').css('cursor', 'pointer');
                                            $('#manage_promotion').css('cursor', 'pointer');
                                            $('#promotion_area').hide().html(res).fadeIn();
                                        });
                                   }
                             });
                        });
                  </script>


@stop