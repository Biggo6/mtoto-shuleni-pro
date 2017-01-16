@include('partials._buttonSave', ['btnId'=>'', 'title'=>'']);

@section('footerScripts')
	@include('partials._saveFunc', ["btnID" => "", "formID"=>"", "route"=>"", "routeWith"=>""])
@stop

@include('partials._datatable', ["columns"=>[], "data"=>Model::orderBy('created_at', 'DESC')->get(), "mapEls"=>[]])