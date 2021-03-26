@extends('layout')

@section('title', 'Manage Sections')

@section('main')



<div class="row">

	<div class="col-md-4">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New Section / Stream</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="sectionForm" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label>Name</label>
                        <input name="section_name" type="text" {{HelperX::ve(["veName"=>"Section", "veVs"=>"required"])}} placeholder="Enter Section Name">
                      </div><br/>
                      <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                      </div><br/>
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" {{HelperX::ve(["veName"=>"Status", "veVs"=>"required"])}}>
                          <option value="1">Active</option>
                          <option value="0">Blocked</option>
                        </select>
                      </div><br/>

                      @include('partials._buttonSave', ['btnId'=>'saveSection', 'title'=>'Save Section']);

                      @section('footerScripts')
                        @include('partials._saveFunc', ["btnID" => "saveSection", "formID"=>"sectionForm", "route"=>"sections.store", "routeWith"=>"sections.refreshWith"])
                      @stop

                    </form>
                  </div>
        </div>
	</div>
	<div class="col-md-8">
    <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage Sections</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    @include('partials._success')



                    @include('partials._datatable', ["columns"=>["Section Name", "Description", "Status", "Actions"], "data"=>Section::orderBy('created_at', 'DESC')->get(), "mapEls"=>["name", "description", "status"], "modal"=>"sm", "url_edit"=>"sections/edit", "url_delete"=>"sections/delete", "refreshWix"=>"sections.refreshWith"])


                  </div>
        </div>


  </div>

</div>

@stop




