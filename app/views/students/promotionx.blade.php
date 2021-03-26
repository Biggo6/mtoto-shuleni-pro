<style>
.pull-left{
float: left !important;
}
</style>

<div >
	<h3 class="alert alert-info">
	Promote From
	<label class="label label-danger">
	<i>{{$promo['class_name_from']}}{{$promo['section_from']}}</i>
	</label> &nbsp; to
	 <label class="label label-danger"><i>
	 {{$promo['class_name_to']}}{{$promo['section_to']}}</i>
	 </label> &nbsp; For Academic Year <label class="label label-warning">
	 {{$promo['promotedYear']}}</label>

	 <button type="button" id="promoteSelected" class="pull-right btn btn-danger"><i class="fa fa-line-chart"></i> Promote Selected Students</button>

	 </h3>
</div>
<hr/>

<table id="datatable" class="table  table-striped table-bordered">
  <thead>
      <tr>
          <th>
            <input student_id="" class="check_box" id="check_all" type="checkbox" />
          </th>
          <th>#</th>
          <th>Admit Number</th>
          <th>Photo</th>
          <th>Full Name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Promoted</th>
      </tr>
  </thead>
  <tbody>

 <?php
                                      $students = Student::where('class_name', $promo['class_name_from'])->where('section_name',$promo['section_from'] )->orderBy('created_at', 'DESC')->get();

                                      $i = 1;
                                  ?>

                                 @foreach($students as $s)
                                  <tr>
                                    <td><input student_id="{{$s->id}}" class="check_box" type="checkbox" /></td>
                                    <td>{{$i}}</td>
                                    <td>{{$s->admit_number}}</td>
                                    <td>
                                        @if($s->profile_photo == "")
                                            <img src="{{url('images/img.jpg')}}" style="width:52px" />
                                        @else
                                             <img src="{{$s->profile_photo}}" style="width:52px" />
                                        @endif
                                    </td>
                                    <td>{{$s->firstname}} {{$s->lastname}}</td>
                                    <td>{{$s->address}}</td>
                                    <td>{{$s->email}}</td>
                                    <td>
                                        <?php
                                            $student_id = $s->id;
                                            $check = Studentpromotion::where('student_id', $student_id)->where('running_year', date('Y'))->count();
                                        ?>
                                        @if($check)
                                            <label class="label label-success"><i class="fa fa-check-circle"></i> Promoted</label>
                                        @else
                                             <label class="label label-danger"><i class="fa fa-ban"></i> Not Promoted yet</label>
                                        @endif
                                    </td>
                                  </tr>
                                  <?php $i++; ?>
                                  @endforeach

  </tbody>
</table>

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
                var students = [];
                $('.check_box').each(function(i,k){
                    var sel = $(this).prop('checked');
                    if(sel){
                        students.push($(this).attr('student_id'));
                    }
                });
                $('#promotion_area').css('opacity', 0.2).css('cursor', 'wait');
                $(this).css('cursor', 'wait');
                $.post('{{route('students.doPromo')}}', {students:students, promo:'{{json_encode($promo)}}' }, function(res){
                    $('#promotion_area').css('opacity', 1).css('cursor', 'pointer');
                    $('#promoteSelected').css('cursor', 'pointer');
                    swal({
                        title: 'Students Promotion',
                        text: 'Successfully promoted!',
                        type: 'success'
                    }, function() {
                            window.location = "";
                    });
                });
            }
        });



        $('.dataTables_filter').addClass('pull-left');
        $('#datatable').dataTable({
            "bPaginate": false
        });
    });
</script>