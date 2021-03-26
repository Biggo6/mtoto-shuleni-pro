<?php



$class_id = Msclass::where('class_name', $c)->first()->id;
$section_id = Section::where('name', $s)->first()->id;

$subjects = Subject::where('class_id', $class_id)->where('section_id', $section_id)->count();

?>

@if(($subjects))

<option value="">---Select Subject ----</option>

@foreach(Subject::where('class_id', $class_id)->where('section_id', $section_id)->get() as $s)
  <option value="{{$s->id}}">{{$s->name}}</option>
@endforeach

@endif