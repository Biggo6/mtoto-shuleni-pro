<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3></h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{route('app.dashboard')}}">Dashboard</a></li>
        </ul>
      </li>

    @if(Role::where('id', Auth::user()->role_id)->first()->name == "custom_admin")  


    @if(HelperX::canAccess(Auth::user()->id, "manage_teachers"))
    <li><a><i class="fa fa-edit"></i> Teachers <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('teachers.manage')}}"><i class="fa fa-pencil"></i> Manage Teachers</a></li>
        </ul>
    </li>
    @endif

    @if(HelperX::canAccess(Auth::user()->id, "manage_classes"))
    <li><a><i class="fa fa-bank"></i> Classes <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('classes.manage')}}"><i class="fa fa-pencil"></i> Manage Classes</a></li>
        </ul>
    </li>
    @endif

    @if(HelperX::canAccess(Auth::user()->id, "manage_subjects"))
    <li><a><i class="fa fa-book"></i> Subjects <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('subjects.manage')}}"><i class="fa fa-pencil"></i> Manage Subjects</a></li>
        </ul>
    </li>
    @endif

    @if(HelperX::canAccess(Auth::user()->id, "manage_students"))
    <li id="student"><a ><i class="fa fa-graduation-cap"></i> Students <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" id="student_menu">
        <li><a href="{{route('students.manage')}}"><i class="fa fa-pencil"></i> Manage Students</a></li>
        <li><a href="{{route('students.promotion')}}"><i class="fa fa-refresh"></i> Student Promotion</a></li>
        </ul>
    </li>
    @endif

    @if(HelperX::canAccess(Auth::user()->id, "manage_parents"))
    <li><a><i class="fa fa-heart"></i> Parents <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('parents.manage')}}"><i class="fa fa-pencil"></i> Manage Parents</a></li>
        </ul>
    </li>
    @endif

    @if(HelperX::canAccess(Auth::user()->id, "manage_users"))
    <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('users.manage')}}"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <!--<li><a href="{{route('users.roles')}}"><i class="fa fa-lock"></i> Manage Roles</a></li>-->
        </ul>
    </li>
    @endif

    @if(HelperX::canAccess(Auth::user()->id, "manage_exams"))
    <li><a><i class="fa fa-pencil"></i> Exams <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('exams.list')}}"><i class="fa fa-circle-o"></i> Exam List</a></li>
        <li><a href="{{route('exams.grade')}}"><i class="fa fa-circle-o"></i> Exam Grades</a></li>
        <li><a href="{{route('exams.marks')}}"><i class="fa fa-circle-o"></i> Exam Manage Marks</a></li>
        
        <li><a href="{{route('exams.tubulationSheet')}}"><i class="fa fa-circle-o"></i> Tabulation Sheet</a></li>
        <li><a href="form.html"><i class="fa fa-circle-o"></i> Send Marks By SMS</a></li>
        </ul>
    </li>
    @endif
    <!--<li><a><i class="fa fa-line-chart"></i>  Attendance <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <!--<li><a href="form.html"><i class="fa fa-lock"></i> Manage Roles</a></li>-->
        <!--<li><a href="{{route('users.permissions')}}"><i class="fa fa-key"></i> Manage Permissions</a></li>
        </ul>
    </li>-->

    @if(HelperX::canAccess(Auth::user()->id, "manage_noticeboard"))
    <li><a><i class="fa fa-bullhorn"></i>  NoticeBoard <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('noticeboard.add')}}"><i class="fa fa-pencil"></i> Add NoticeBoard</a></li>
        <li><a href="{{route('noticeboard.manage')}}"><i class="fa fa-list"></i> Manage NoticeBoards</a></li>
        
        </ul>
    </li>
    @endif


    @if(HelperX::canAccess(Auth::user()->id, "manage_reports"))
    <li><a><i class="fa fa-bar-chart-o"></i>  Reports <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <li><a href="form.html"><i class="fa fa-lock"></i> Manage Roles</a></li>
        <li><a href="{{route('users.permissions')}}"><i class="fa fa-key"></i> Manage Permissions</a></li>
      </ul>
    </li>
    @endif

    @endif

    @if(Role::where('id', Auth::user()->role_id)->first()->name == "admin")
    <li><a><i class="fa fa-edit"></i> Teachers <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('teachers.manage')}}"><i class="fa fa-pencil"></i> Manage Teachers</a></li>
        </ul>
    </li>

    <li><a><i class="fa fa-bank"></i> Classes <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('classes.manage')}}"><i class="fa fa-pencil"></i> Manage Classes</a></li>
        </ul>
    </li>
    <li><a><i class="fa fa-book"></i> Subjects <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('subjects.manage')}}"><i class="fa fa-pencil"></i> Manage Subjects</a></li>
        </ul>
    </li>
    <li id="student"><a ><i class="fa fa-graduation-cap"></i> Students <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" id="student_menu">
        <li><a href="{{route('students.manage')}}"><i class="fa fa-pencil"></i> Manage Students</a></li>
        <li><a href="{{route('students.promotion')}}"><i class="fa fa-refresh"></i> Student Promotion</a></li>
        </ul>
    </li>
    <li><a><i class="fa fa-heart"></i> Parents <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('parents.manage')}}"><i class="fa fa-pencil"></i> Manage Parents</a></li>
        </ul>
    </li>

    <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('users.manage')}}"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <!--<li><a href="{{route('users.roles')}}"><i class="fa fa-lock"></i> Manage Roles</a></li>-->
        </ul>
    </li>
    <li><a><i class="fa fa-pencil"></i> Exams <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('exams.list')}}"><i class="fa fa-circle-o"></i> Exam List</a></li>
        <li><a href="{{route('exams.grade')}}"><i class="fa fa-circle-o"></i> Exam Grades</a></li>
        <li><a href="{{route('exams.marks')}}"><i class="fa fa-circle-o"></i> Exam Manage Marks</a></li>
        
        <li><a href="{{route('exams.tubulationSheet')}}"><i class="fa fa-circle-o"></i> Tabulation Sheet</a></li>
        <li><a href="form.html"><i class="fa fa-circle-o"></i> Send Marks By SMS</a></li>
        </ul>
    </li>
    <!--<li><a><i class="fa fa-line-chart"></i>  Attendance <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <!--<li><a href="form.html"><i class="fa fa-lock"></i> Manage Roles</a></li>-->
        <!--<li><a href="{{route('users.permissions')}}"><i class="fa fa-key"></i> Manage Permissions</a></li>
        </ul>
    </li>-->


    <li><a><i class="fa fa-bullhorn"></i>  NoticeBoard <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="{{route('noticeboard.add')}}"><i class="fa fa-pencil"></i> Add NoticeBoard</a></li>
        <li><a href="{{route('noticeboard.manage')}}"><i class="fa fa-list"></i> Manage NoticeBoards</a></li>
        
        </ul>
    </li>

    <li><a><i class="fa fa-bar-chart-o"></i>  Reports <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <li><a href="form.html"><i class="fa fa-lock"></i> Manage Roles</a></li>
        <li><a href="{{route('users.permissions')}}"><i class="fa fa-key"></i> Manage Permissions</a></li>
      </ul>
    </li>

    <!--<li><a><i class="fa fa-dollar"></i>  Accounting <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <li><a href="form.html"><i class="fa fa-lock"></i> Manage Roles</a></li>
        <li><a href="{{route('users.permissions')}}"><i class="fa fa-key"></i> Manage Permissions</a></li>
        </ul>
    </li>-
    <li><a><i class="fa fa-calendar"></i>  Timetable <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <li><a href="form.html"><i class="fa fa-lock"></i> Manage Roles</a></li>
        <li><a href="{{route('users.permissions')}}"><i class="fa fa-key"></i> Manage Permissions</a></li>
        </ul>
    </li>
    <li><a><i class="fa fa-smile-o"></i>  Behaviors   <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
        <li><a href="form.html"><i class="fa fa-pencil"></i> Manage Users</a></li>
        <li><a href="form.html"><i class="fa fa-lock"></i> Manage Roles</a></li>
        <li><a href="{{route('users.permissions')}}"><i class="fa fa-key"></i> Manage Permissions</a></li>
        </ul>
    </li>-->
     @endif



    </ul>
  </div>


@if(Role::where('id', Auth::user()->role_id)->first()->name == "admin")
<div class="menu_section">
<h3>Settings</h3>
<ul class="nav side-menu">
<li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="{{url('selfupdater/check')}}">Software Updates  </a></li>
<li><a href="#">System Settings</a></li>
<li><a href="#">Trash Bin</a></li>
<li><a href="{{route('settings.school')}}">School Information</a></li>
@if(School::count())
@if(HelperX::getSchoolInfo()->isStreamEnable == 1)
<li><a href="{{route('sections.manage')}}">Sections/Streams</a></li>
@endif
@endif
<li><a href="{{route('sms.settings')}}">SMS settings</a></li>
<li><a href="#">Licence</a></li>

</ul>
</li>
</ul>

</div>
@endif

@if(Role::where('id', Auth::user()->role_id)->first()->name == "custom_admin")

@if(HelperX::canAccess(Auth::user()->id, "manage_settings"))
<div class="menu_section">
<h3>Settings</h3>
<ul class="nav side-menu">
<li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="{{url('selfupdater/check')}}">Software Updates  </a></li>
<li><a href="#">System Settings</a></li>
<li><a href="#">Trash Bin</a></li>
<li><a href="{{route('settings.school')}}">School Information</a></li>
@if(School::count())
@if(HelperX::getSchoolInfo()->isStreamEnable == 1)
<li><a href="{{route('sections.manage')}}">Sections/Streams</a></li>
@endif
@endif
<li><a href="{{route('sms.settings')}}">SMS settings</a></li>
<li><a href="#">Licence</a></li>

</ul>
</li>
</ul>

</div>
@endif

@endif


</div>

