<div >
	<h3 class="alert alert-info">
	    <i class="fa fa-clock-o"></i> User System Access History
	 </h3>
</div>
<hr/>


<table id="datatable" class="table  table-striped table-bordered">
  <thead>
      <tr>
         <th>#</th>

          <th>Login Time</th>
          <th>Logout Time</th>
      </tr>
  </thead>
  <tbody>

        <?php
            $histories = LoginHistory::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
            $i = 1;
        ?>

        @foreach($histories as $h)
             <tr>
                   <td >{{$i}}</td>

                  <td>{{$h->logintime}}</td>
                  <td>{{$h->logouttime}}</td>
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

        $('#datatable').dataTable({
            "bPaginate": false
        });
    });
</script>