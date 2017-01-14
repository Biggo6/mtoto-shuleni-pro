@if(Session::has('success'))
	<div class="alert alert-success flush">
		{{Session::get('success')}}
	</div>
@endif	

<!-- jQuery -->
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
	$('.flush').delay(2000).fadeOut();
</script>