<div class="profile clearfix">
  <div class="profile_pic">
    <img src="{{url('images/img.jpg')}}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Welcome,</span>
    <h2>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h2>
  </div>
</div>