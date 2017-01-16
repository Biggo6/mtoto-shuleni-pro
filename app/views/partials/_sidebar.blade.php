<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3></h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('app.dashboard')}}">Dashboard</a></li>
        </ul>
      </li>
      
      <li><a><i class="fa fa-bank"></i> Classes <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('classes.manage')}}"><i class="fa fa-pencil"></i> Manage Classes</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-book"></i> Subjects <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Subjects</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-graduation-cap"></i> Students <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Subjects</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-heart"></i> Parents <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Subjects</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-edit"></i> Teachers <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Subjects</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Users</a></li>
          <li><a href="form.html"><i class="fa fa-lock"></i> Manage Roles</a></li>
          <li><a href="{{route('users.permissions')}}"><i class="fa fa-key"></i> Manage Permissions</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-pencil"></i> Exams <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Subjects</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="menu_section">
                <h3>Settings</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-cogs"></i> General Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">System Backup/Restore</a></li>
                      <li><a href="#">Trash Bin</a></li>
                      <li><a href="{{route('settings.school')}}">School Information</a></li>
                      @if(School::count())
                      @if(HelperX::getSchoolInfo()->isStreamEnable == 1)
                      <li><a href="{{route('sections.manage')}}">Sections/Streams</a></li>
                      @endif
                      @endif
                      <li><a href="#">SMS settings</a></li>
                      <li><a href="#">Licence</a></li>
                      
                    </ul>
                  </li>
                </ul>
              </div>

</div>