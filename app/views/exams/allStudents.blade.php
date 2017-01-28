<?php 



$students = Student::where('section_name', $data['section_name'] )->where('class_name', $data['class_name'])->where('running_year', date('Y'))->orderBy('created_at', 'DESC')->get();


?>



<table id="datatable-mark" class="table  table-striped table-bordered">
  <thead>
      <tr>
          <th>#</th>
          <th>Admit Number</th>
          <th>Full Name</th>
          <th>Marks Obtained</th>
          <th>Comment</th>
      </tr>
  </thead>
  <tbody>
  		<?php $i=1; ?>
  		@foreach($students as $s)
  			   <tr>
		          <td>{{$i}}</td>
		          <td>{{$s->admit_number}}</td>
		          <td>{{$s->firstname}} {{$s->lastname}}</td>
		           <td>
                <input name="students_ids[]" value="{{$s->id}}" type="hidden"  />
                <input class="form-control" name="students_marks[]" value="{{HelperX::getStudentMark($s->id)}}" style="width:100%" type="text" />
              </td>
              <td>
                <textarea style="width:100%" name="students_comment[]" class="form-control">{{HelperX::getStudentMarkComment($s->id)}}</textarea> 
              </td>
		      </tr>
		      <?php $i++; ?>
  		@endforeach
  </tbody>
</table> 

<hr/>









