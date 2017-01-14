@if(Session::has('error'))
	<div class="alert alert-danger flush">
		{{Session::get('error')}}
	</div>
@endif	

<!-- jQuery -->
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript">
	$('.flush').delay(2000).fadeOut();
</script>