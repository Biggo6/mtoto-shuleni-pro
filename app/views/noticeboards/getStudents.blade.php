<?php 

  $students = Student::where('class_name', $data['class_name'])->where('running_year', date('Y'))->orderBy('created_at', 'DESC')->get();

?>



@if($data['parent_cat'] == 1)

<div class="form-group"  >
    <label>Student's Parent</label>
    <select style="width:100%" id="select_2x" name="student_id"  {{HelperX::ve(["veName"=>"Parent Category", "veVs"=>"required",  "clx"=>"select_2", "vePos"=>"topRight"])}}>
      <option value="">-- Student's Parent ----</option>
      @foreach($students as $ss)
      <option value="{{$ss->parent_id}}">{{$ss->firstname}}  {{$ss->lastname}} ({{Parentx::find($ss->parent_id)->fullname}})</option>
      @endforeach	
      
    </select>
  </div>
  <br/>

@else


<table id="datatable" class="table  table-striped table-bordered">
  <thead>
      <tr>
          <th>
            <input student_id="" class="check_box" id="check_all" type="checkbox" />
          </th>
         
          <th>Photo</th>
          <th>Full Name</th>
          
      </tr>
  </thead>
  <tbody>

 <?php
                                      $students = Student::all();

                                      $i = 1;
                                  ?>

                                 @foreach($students as $s)
                                  <tr>
                                    <td><input student_id="{{$s->id}}" name="students_ids[]" value="{{$s->id}}" class="check_box" type="checkbox" /></td>
                                    
                                    <td>
                                        @if($s->profile_photo == "")
                                            <img src="{{url('images/img.jpg')}}" style="width:52px" />
                                        @else
                                             <img src="{{$s->profile_photo}}" style="width:52px" />
                                        @endif
                                    </td>
                                    <td>{{$s->firstname}} {{$s->lastname}}</td>
                                    
                                  </tr>
                                  <?php $i++; ?>
                                  @endforeach

  </tbody>
</table>

<br/>

 <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
 <script type="text/javascript" src="{{url('sweetalert/dist/sweetalert.min.js')}}"></script>

<script src="{{url('ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{url('ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>

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

        var c = 0;

        var selected = 0;

        $('.check_box').each(function(i, k){
            c++;
        });

        var ec = parseInt(c) - 1;

        $('#check_all').on('change', function(){
            var selected = $(this).prop('checked');
            if(selected){
                $('.check_box').each(function(i, k){
                    $(this).prop('checked', true);
                    selected++;
                });
            }else{
                 $('.check_box').each(function(i, k){
                    $(this).prop('checked', false);
                    selected = 0;
                });
            }
        });

        $('.check_box').on('change', function(){
            var seld = $(this).prop('checked');
            if(seld){
                selected++;
            }else{
                $('#check_all').prop('checked', false);
                selected--;
            }
        });

        $('#promoteSelected').on('click', function(){
            if(selected == 0){
                swal({
                    title: 'Students Promotion',
                    text: 'Please Select Students First!',
                    type: 'error'
                }, function() {

                });
            }else{
                
            }
        });



        $('.dataTables_filter').addClass('pull-left');
        $('#datatable').dataTable({
            "bPaginate": false
        });
    });
</script>

@endif  