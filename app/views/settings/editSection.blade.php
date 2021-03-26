<form id="sectionFormEdit" class="form-horizontal form-label-left">
      <input type="hidden" value="{{$s->id}}" name="row_id" />

      <div class="form-group">
        <label>Name</label>
        <input name="section_name" value="{{$s->name}}" type="text" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required"])}} placeholder="Enter Section Name">
      </div><br/>
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" placeholder="Description">{{$s->description}}</textarea>
      </div><br/>
      <div class="form-group">
        <label>Status</label>
        <select name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
          @if($s->status == 1)
          <option value="1">Active</option>
          <option value="0">Blocked</option>
          @else
          <option value="0">Blocked</option>
          <option value="1">Active</option>
          @endif
        </select>
      </div><br/>

      @include('partials._buttonSave', ['btnId'=>'updateSection', 'btn'=> 'success', 'title'=>'Update Section']);

      
        @include('partials._saveFunc', ["btnID" => "updateSection", "formID"=>"sectionFormEdit", "route"=>"sections.update", "routeWith"=>"sections.refreshWith", "rowId"=>$s->id, "update"=>true])
      

    </form>