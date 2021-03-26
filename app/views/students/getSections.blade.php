<?php
	
	$sections = MsClass::where('class_name', $c)->where('status',1)->where('class_section', '!=', 0)->count();
	if($sections != 0){
      $real_sections = Section::all();
      $class_sections = MsClass::where('status', 1)->where('class_name', $c)->select('class_section')
            ->distinct()
            ->get();

           $css = []; 
          foreach ($class_sections as $cs) {
              $css[] = Section::find($cs->class_section)->name;
          }
  }
  

?>

@if($sections != 0)
	<option value="">--- Select Sections below ---</option>
	@foreach($css as $cs)
		<option value="{{$cs}}">{{$cs}}</option>
	@endforeach
@endif