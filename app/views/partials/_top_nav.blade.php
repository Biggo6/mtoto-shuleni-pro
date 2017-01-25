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



                    @endif

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"><i class="fa fa-lock pull-right"></i> Change Password</a></li>

                    <li id="help"><a href="javascript:;"><i class="fa fa-info-circle pull-right"></i>About The Software</a></li>
                    <li><a href="{{route('app.logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
</div>

   <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
   <script type="text/javascript" src="{{url('sweetalert/dist/sweetalert.min.js')}}"></script>
   <script>
   $(function(){
        $('#help').on('click', function(){
             swal({
                 title: 'MtotoShuleni Pro',
                 text: 'Current Version: {{HelperX::getSystemVersion()}} \n\n Powered By Izweb Technologies LTD',
                 type: 'info'
             }, function() {

             });
        });
   })
   </script>