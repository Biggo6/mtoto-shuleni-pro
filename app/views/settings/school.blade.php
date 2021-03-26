@extends('layout')

@section('title', 'School Information')

@section('main')

<div class="row">

	<div class="col-md-5">

		<form id="registerForm_School">

		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-pencil"></i> Update School Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>

                    @if(!School::count())

                    <div class="row">
						<div class="col-md-6">
							<div>
								<label for="school_name">Name</label>
								<input type="text" value="" class="form-control  validate[required]" data-errormessage-value-missing="School name is required!" data-prompt-position="bottomRight" required="" id="name" name="school_name" placeholder="name">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="slogan">Slogan</label>
								<textarea type="text"  class="form-control validate[required]" data-errormessage-value-missing="School slogan is required!" data-prompt-position="bottomRight"  required="" id="slogan" name="slogan" placeholder="Slogan"></textarea>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="address">Address</label>
								<input type="text" value="" class="form-control validate[required]" data-errormessage-value-missing="School Address is required!" data-prompt-position="bottomRight"  required="" id="address" name="address" placeholder="Address">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="phone">Phone</label>
								<input type="text" value="" class="form-control validate[required]" data-errormessage-value-missing="School Phone is required!" data-prompt-position="bottomRight"  required="" id="phone" name="phone" placeholder="Phone">
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="fax">Fax</label>
								<input type="text" value="" class="form-control" required="" id="fax" name="fax" placeholder="Fax">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="email">Email</label>
								<input type="text" value="" class="form-control" required="" id="email" name="email" placeholder="Email">
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="website">Website</label>
								<input type="text" value="" class="form-control" required="" id="website" name="website" placeholder="Website">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="phyaddress">Physical Address</label>
								<input type="text" value="" class="form-control validate[required]" data-errormessage-value-missing="Physical address is required!" data-prompt-position="bottomRight"  required="" id="phyaddress" name="phyaddress" placeholder="Physical Address">
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="region">Region</label>
								<input type="text" value="" class="form-control  validate[required]" data-errormessage-value-missing="Region is required!" data-prompt-position="bottomRight"  required="" id="region" name="region" placeholder="Region">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="district">District</label>
								<input type="text" value="" class="form-control validate[required]" data-errormessage-value-missing="District is required!" data-prompt-position="bottomRight"  required="" id="district" name="district" placeholder="District">
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="stream">Streams</label>
								<br/><br/>
								<div class="">
		                            <label>
		                              <input type="checkbox" name="stream" class="js-switch" checked /> School have streams
		                            </label>
		                        </div>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="logo">Logo</label>
								<br/><br/>
								<input type="file" id="schoolLogo" name="schoolLogo" class="filestyle" data-input="false" data-buttonName="btn-success">
							</div>
						</div>
						<div class="col-md-6">
							<div id="logo-placeholder">
							</div>
						</div>
					</div>

					@else

					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="school_name">Name</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->name}}" class="form-control  validate[required]" data-errormessage-value-missing="School name is required!" data-prompt-position="bottomRight" required="" id="name" name="school_name" placeholder="name">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="slogan">Slogan</label>
								<textarea type="text"  class="form-control validate[required]" data-errormessage-value-missing="School slogan is required!" data-prompt-position="bottomRight"  required="" id="slogan" name="slogan" placeholder="Slogan">{{HelperX::getSchoolInfo()->slogan}}</textarea>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="address">Address</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->address}}" class="form-control validate[required]" data-errormessage-value-missing="School Address is required!" data-prompt-position="bottomRight"  required="" id="address" name="address" placeholder="Address">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="phone">Phone</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->phone}}" class="form-control validate[required]" data-errormessage-value-missing="School Phone is required!" data-prompt-position="bottomRight"  required="" id="phone" name="phone" placeholder="Phone">
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="fax">Fax</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->fax}}" class="form-control" required="" id="fax" name="fax" placeholder="Fax">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="email">Email</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->email}}" class="form-control" required="" id="email" name="email" placeholder="Email">
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="website">Website</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->website}}" class="form-control" required="" id="website" name="website" placeholder="Website">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="phyaddress">Physical Address</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->physical_address}}" class="form-control validate[required]" data-errormessage-value-missing="Physical address is required!" data-prompt-position="bottomRight"  required="" id="phyaddress" name="phyaddress" placeholder="Physical Address">
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="region">Region</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->region}}" class="form-control  validate[required]" data-errormessage-value-missing="Region is required!" data-prompt-position="bottomRight"  required="" id="region" name="region" placeholder="Region">
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="district">District</label>
								<input type="text" value="{{HelperX::getSchoolInfo()->district}}" class="form-control validate[required]" data-errormessage-value-missing="District is required!" data-prompt-position="bottomRight"  required="" id="district" name="district" placeholder="District">
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="stream">Streams</label>
								<br/><br/>
								<div class="">
		                            <label>
		                              <input type="checkbox" name="stream" class="js-switch" {{HelperX::getSchoolInfo()->isStreamEnable == 1 ? 'checked' : ''}} /> School have streams
		                            </label>
		                        </div>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="logo">Logo</label>
								<br/><br/>
								<input type="file" id="schoolLogo" name="schoolLogo" class="filestyle" data-input="false" data-buttonName="btn-success">
							</div>
						</div>
						<div class="col-md-6">
							<div class="show-image">
							<div id="logo-placeholder">
								<img style="width:92px;height: 92px" src="{{HelperX::getSchoolInfo()->logo}}" />
							</div>
							<span class="delete label label-danger logoToRemove" type="button" value=""><i class="fa fa-trash"></i> Remove Photo</span> 
						</div>
						</div>
					</div>

					@endif

					<hr/>

					<button type="button" id="updateSchool" class="btn btn-primary"><i class="fa fa-save"></i> Update Information</button>

                  </div>


        </div>

    	</form>
	</div>
	<div class="col-md-7">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bank"></i> School Information</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    @include('partials._success')
                    
                	@if(School::count())
                		<div class="row">
						<div class="col-md-6">
							<div>
								<label for="school_name">Name</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->name}}</i>
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="slogan">Slogan</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->slogan}}</i>
							</div>
						</div>
					</div>
					<br/><br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="address">Address</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->address}}</i>
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="phone">Phone</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->phone}}</i>
							</div>
						</div>
					</div>
					<br/><br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="fax">Fax</label>
								<br><hr/>
								<b><i>{{HelperX::getSchoolInfo()->fax}}"</b></i>
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="email">Email</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->email}}</i>
							</div>
						</div>
					</div>
					<br/><br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="website">Website</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->website}}</i>
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="phyaddress">Physical Address</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->physical_address}}</i>
							</div>
						</div>
					</div>
					<br/><br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="region">Region</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->region}}</i>
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="district">District</label>
								<hr/>
								<i>{{HelperX::getSchoolInfo()->district}}</i>
							</div>
						</div>
					</div>
					<br/><br/>
					<div class="row">
						<div class="col-md-6">
							<div>
								<label for="stream">Streams</label>
								<br/><br/>
								<div class="">
		                            <label>
		                              <input type="checkbox" disabled name="stream" class="js-switch" {{HelperX::getSchoolInfo()->isStreamEnable == 1 ? 'checked' : ''}} /> School have streams
		                            </label>
		                        </div>
							</div>
						</div>
						<div class="col-md-6">
							<div>
								<label for="logo">Logo</label>
								<br/><br/>
								<div id="logo-placeholder">
										
									<img style="width:92px;height: 92px" src="{{HelperX::getSchoolInfo()->logo}}" />
									
								
							</div>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						
						<div class="col-md-6">
							
						</div>
					</div>
                	@else
                		<div class="alert alert-danger"> <i class="fa fa-warning"></i> Please Update School Information</div>
                	@endif


                  </div>
        </div>
	</div>

</div>

@stop