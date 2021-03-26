 <form id="userEditForm">

  <input type="hidden" name="row_id" value="{{$user->id}}" />

 <div class="form-group">
  <label>Firstname</label>
  <input type="text" value="{{$user->firstname}}" name="firstname" {{HelperX::ve(["veName"=>"Firstname", "veVs"=>"required"])}} placeholder="Enter Firstname">
</div>

<div class="form-group">
  <label>Lastname</label>
  <input type="text" value="{{$user->lastname}}"  name="lastname" {{HelperX::ve(["veName"=>"Lastname", "veVs"=>"required"])}} placeholder="Enter Lastname">
</div>



<div class="form-group">
  <label>Username</label>
  <input type="text" value="{{$user->username}}"  name="username" {{HelperX::ve(["veName"=>"  Username", "veVs"=>"required"])}} placeholder="Enter UserName">
</div>


 <div class="form-group">
  <label>Status</label>
  <select name="status" class="form-control">
    @if($user->active == 1)
    <option value="1">Active</option>
    <option value="0">Blocked</option>
    @else
    <option value="0">Blocked</option>
    <option value="1">Active</option>
    @endif
  </select>
</div><br/>


 @include('partials._buttonSave', ['btnId'=>'saveUserEdit', 'title'=>'Save Change']);


</form>
  @include('partials._saveFunc', ["btnID" => "saveUserEdit", "formID"=>"userEditForm", "route"=>"users.updateUser", "routeWith"=>"app.refreshWith", "rowId"=>$user->id, "update"=>true])