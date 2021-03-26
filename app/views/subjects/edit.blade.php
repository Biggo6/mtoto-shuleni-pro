<form class="form-horizontal form-label-left" id="registerSubjectEdit">
                      
                      <input type="hidden" name="row_id" value="{{$subject->id}}" />
                      <div class="form-group">
                        <label>Subject Name</label>
                        <input type="text" value="{{$subject->name}}"  name="subject" {{HelperX::ve(["veName"=>"Subject", "veVs"=>"required"])}} placeholder="Enter Subject Name">
                      </div>

                      <div class="form-group">
                        <label>Class</label>
                        <select id="select_3" name="class_name" {{HelperX::ve(["veName"=>"Class Name", "veVs"=>"required"])}}>

                          <option  value="{{$subject->class_id}}">{{MsClass::find($subject->class_id)->class_name}}</option>

                          <option value="">--Select Class --</option>
                          <?php $classes = MsClass::where('status', 1)->get(); ?>
                          @foreach($classes as $c)
                              <option  value="{{$c->id}}">{{$c->class_name}}</option>
                          @endforeach
                        </select>  
                      </div>

                       @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                      <div class="form-group">
                        <label>Section/Stream</label>
                        <select name="class_section" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required"])}}>
                          <option value="{{$subject->section_id}}">{{Section::find($subject->section_id)->name}}</option>
                          <option value="">-- Select Sections/Streams --</option>
                          <?php $sections = Section::where('status', 1)->get(); ?>
                          @foreach($sections as $section)
                              <option value="{{$section->id}}">{{$section->name}}</option>
                          @endforeach
                        </select>  
                      </div>
                       @endif
                      @endif



                      <div class="form-group">
                        <label>Teacher</label>
                        <select id="select_2_edit" name="subject_teacher" {{HelperX::ve(["veName"=>"Teacher", "veVs"=>"required"])}}>

                          <option url="{{Teacher::find($subject->teacher_id)->profile_photo}}" value="{{$subject->teacher_id}}">{{Teacher::find($subject->teacher_id)->firstname}} {{Teacher::find($subject->teacher_id)->lastname}}</option>

                          <option url="" value="">--Select Teacher --</option>
                          <?php $teachers = Teacher::where('status', 1)->get(); ?>
                          @foreach($teachers as $teacher)
                              <option url="{{$teacher->profile_photo}}" value="{{$teacher->id}}">{{$teacher->firstname}} {{$teacher->lastname}}</option>
                          @endforeach
                        </select>  
                      </div>

                      <div class="form-group">
                        <label>Status</label>
                        <select  name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
                          @if($subject->status == 1)
                          <option value="1">Active</option>
                          <option value="0">Blocked</option>
                          @else
                          <option value="0">Blocked</option>
                          <option value="1">Active</option>
                          @endif
                        </select>
                      </div><br/>

                       @include('partials._buttonSave', ['btnId'=>'saveSubjectEdit', 'btn'=>'success','title'=>'Update Subject']);



                  </form>


   <!-- jQuery -->
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

 @include('partials._saveFunc', ["btnID" => "saveSubjectEdit", "formID"=>"registerSubjectEdit", "route"=>"subjects.update", "routeWith"=>"subjects.refreshWith"])

<script type="text/javascript" src="{{url('select2/dist/js/select2.min.js')}}"></script>

    <script type="text/javascript">
    function formatState (state) {
      if (!state.id) { return state.text; }
      var img = "";
      Array.prototype.slice.call(state.element.attributes).forEach(function(item) {
          if(item.name == "url"){
            img = item.value;
          }
      });
      if(img == ""){
        var $state = $(
          '<span><img style="width:40px" src="{{url("images/img.jpg")}}" class="img-flag" /> ' + state.text + '</span>'
        );
      }else{
         var $state = $(
          '<span><img style="width:40px" src="'+img+'" class="img-flag" /> ' + state.text + '</span>'
        );
       
      }

       return $state;
     
    };
    $(document).ready(function() {
      $("#select_2_edit").select2({
        templateResult: formatState
      });
    });
    </script>               