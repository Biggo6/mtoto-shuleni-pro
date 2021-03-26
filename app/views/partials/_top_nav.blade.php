   <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

 @if(HelperX::getRoleName() != "admin")
<div class="modal fade" id="modal-id-changepass">
  <div class="modal-dialog">
    <form id="changepassFormXs">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-lock"></i> Change Password</h4>
      </div>
      <div class="modal-body">

       
        
        <div class="form-group">
          <label>Password</label>
          <input type="password"  name="password" id="password_" {{HelperX::ve(["veName"=>" Password ", "veVs"=>"required,funcCall[checkPassMatch[cpassword_]]"])}} placeholder="Enter Password">
        </div>

        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password"  name="cpassword" id="cpassword_" {{HelperX::ve(["veName"=>"Confirm Password ", "veVs"=>"required,funcCall[checkPassMatch[password_]]"])}} placeholder="Enter Confirm Password">
        </div>

      </div>
      <div class="modal-footer">
        
        <button type="button" id="savePasswordx" class="btn btn-primary">Save changes</button>

        @include('partials._saveFunc', ["btnID" => "savePasswordx", "formID"=>"changepassFormXs", "route"=>"users.changePasswordx", "routeWith"=>"app.refreshWith"])
      
      </div>
    </div>
    </form>
  </div>
</div>

@endif




<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div>





              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    @if(HelperX::getRoleName() == "admin")
                    <img src="{{url('images/img.jpg')}}" alt="">{{Auth::user()->firstname}} {{Auth::user()->lastname}}
                    @elseif(HelperX::getRoleName() == "teacher")
                        @if(Teacher::where('user_id', Auth::user()->id)->first()->profile_photo == "")
                            <img src="{{url('images/img.jpg')}}" alt="">{{Auth::user()->firstname}} {{Auth::user()->lastname}}
                        @else
                            <img src="{{Teacher::where('user_id', Auth::user()->id)->first()->profile_photo}}" alt="">{{Auth::user()->firstname}} {{Auth::user()->lastname}}
                        @endif

                    @elseif(HelperX::getRoleName() == "student")

                        @if(Student::where('user_id', Auth::user()->id)->where('running_year', date('Y'))->first()->profile_photo == "")
                            <img src="{{url('images/img.jpg')}}" alt="">{{Auth::user()->firstname}} {{Auth::user()->lastname}}
                        @else
                            <img src="{{Student::where('user_id', Auth::user()->id)->where('running_year', date('Y'))->first()->profile_photo}}" alt="">{{Auth::user()->firstname}} {{Auth::user()->lastname}}
                        @endif


                    @else    

                    <img src="{{url('images/img.jpg')}}" alt="">{{Auth::user()->firstname}} {{Auth::user()->lastname}}


                    @endif

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    @if(HelperX::getRoleName() != "admin")
                    <li><a data-toggle="modal" href='#modal-id-changepass'><i class="fa fa-lock pull-right"></i> Change Password</a></li>
                    @endif
                    <li id="help"><a href="javascript:;"><i class="fa fa-info-circle pull-right"></i>About The Software</a></li>
                    <li><a href="{{route('app.logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
</div>


