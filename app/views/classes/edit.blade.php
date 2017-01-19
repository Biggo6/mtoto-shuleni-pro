<form class="form-horizontal form-label-left" id="registerClassEdit">
                      
                      <input type="hidden" name="row_id" value="{{$ms->id}}" />

                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{$ms->class_name}}"  name="class_name" {{HelperX::ve(["veName"=>"Class Name", "veVs"=>"required"])}} placeholder="Enter Class Name">
                      </div><br/>

                      @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                      <div class="form-group">
                        <label>Section/Stream</label>
                        <select name="class_section" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required"])}}>
                          <option value="">--Select Section / Stream --</option>
                          <?php $sections = Section::where('status', 1)->get(); ?>
                          @foreach($sections as $section)
                              <option value="{{$section->id}}">{{$section->name}}</option>
                          @endforeach
                        </select>  
                      </div>
                       @endif
                      @endif

                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="Description">{{$ms->description}}</textarea>
                      </div><br/>
                      <div class="form-group">
                        <label>Status</label>
                        <select  name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
                          @if($ms->status)
                          <option value="1">Active</option>
                          <option value="0">Blocked</option>
                          @else
                          <option value="0">Blocked</option>
                          <option value="1">Active</option>
                          
                          @endif
                        </select>
                      </div><br/>

                      <div class="form-group">
                        <label>Teacher</label>
                        <select id="select_2_edit" name="class_teacher" {{HelperX::ve(["veName"=>"Teacher", "veVs"=>"required"])}}>

                          <option url="{{Teacher::find($ms->teacher_id)->profile_photo}}" value="{{$ms->teacher_id}}">{{Teacher::find($ms->teacher_id)->firstname}} {{Teacher::find($ms->teacher_id)->lastname}}</option>

                          <option url="" value="">--Select Teacher --</option>
                          <?php $teachers = Teacher::where('status', 1)->get(); ?>
                          @foreach($teachers as $teacher)
                              <option url="{{$teacher->profile_photo}}" value="{{$teacher->id}}">{{$teacher->firstname}} {{$teacher->lastname}}</option>
                          @endforeach
                        </select>  
                      </div>
                      <hr/>

                      @include('partials._buttonSave', ['btnId'=>'saveClassEdit', 'btn'=>'success', 'title'=>'Update Class']);

                      
                       
                     

                    </form>

<!-- jQuery -->
<script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

 @include('partials._saveFunc', ["btnID" => "saveClassEdit", "formID"=>"registerClassEdit", "route"=>"msclasses.update", "routeWith"=>"msclasses.refreshWith"])

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