<div class="profile clearfix">
  <div class="profile_pic">



    @if(HelperX::getRoleName() == "admin")
                        <img src="{{url('images/img.jpg')}}"  alt="..." class="img-circle profile_img">
                        @elseif(HelperX::getRoleName() == "teacher")
                            @if(Teacher::where('user_id', Auth::user()->id)->first()->profile_photo == "")
                                <img src="{{url('images/img.jpg')}}" alt="..." class="img-circle profile_img">
                            @else
                                <img src="{{Teacher::where('user_id', Auth::user()->id)->first()->profile_photo}}" alt="..." class="img-circle profile_img">
                            @endif

                        @elseif(HelperX::getRoleName() == "student")

                            @if(Student::where('user_id', Auth::user()->id)->where('running_year', date('Y'))->first()->profile_photo == "")
                                <img src="{{url('images/img.jpg')}}" alt="..." class="img-circle profile_img">
                            @else
                                <img src="{{Student::where('user_id', Auth::user()->id)->where('running_year', date('Y'))->first()->profile_photo}}" alt="..." class="img-circle profile_img">
                            @endif

                        @elseif(HelperX::getRoleName() == "parent")

                            @if(Student::where('user_id', Auth::user()->id)->where('running_year', date('Y'))->first()->profile_photo == "")
                                <img src="{{url('images/img.jpg')}}" alt="..." class="img-circle profile_img">
                            @else
                                <img src="{{Student::where('user_id', Auth::user()->id)->where('running_year', date('Y'))->first()->profile_photo}}" alt="..." class="img-circle profile_img">
                            @endif
                            
                        @else        

                            <img src="{{url('images/img.jpg')}}" alt="..." class="img-circle profile_img">

                        @endif



  </div>
  <div class="profile_info">
    <span>Welcome,</span>
    <h2>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h2>
    
    
<!--     <h5>Login as <i class="label label-primary"><b>{{--Role::where('id', Auth::user()->role_id)->first()->name--}}</b></i></h5>
 -->    

    <br/>
    <p>Current Session: <label class="label label-danger">{{date('Y')}} - {{HelperX::getNextYear()}}</label></p>
  </div>
</div>