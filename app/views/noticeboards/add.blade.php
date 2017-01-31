@extends('layout')

@section('title', 'Add Notice')

@section('main')

<div class="row">

	<div class="col-md-6">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-plus"></i> Add New NoticeBoard</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" id="registerParent">
                      
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text"  name="title" {{HelperX::ve(["veName"=>"Title", "veVs"=>"required"])}} placeholder="Enter Title">
                      </div>

                       <div class="form-group">
                        <label>Notice</label>
                        <textarea  name="notice" {{HelperX::ve(["veName"=>"Notice", "veVs"=>"required"])}} placeholder="Enter Notice"></textarea>
                      </div>

                       <div class="form-group">
                        <label>Parent Category</label>
                        <select id="select_2" class="form-control">
                          <option value="">-- Select Parent Category----</option>
                          <option value="">Singe Student Parent</option>
                          <option value="">Multiple Students Parent</option>
                        </select>
                      </div>

                     

                        <hr/>

                      @include('partials._buttonSave', ['btnId'=>'saveNotice', 'title'=>'Save Notice']);

                      

                  </form>
                  </div>
        </div>
	</div>
	<div class="col-md-8"></div>

</div>

@stop