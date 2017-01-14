@include('incs.header')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('app.dashboard')}}" class="site_title"><span>MtotoShuleni Pro</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('partials._nav_profile')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('partials._sidebar')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('partials._menu_footer_buttons')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('partials._top_nav')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('main')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('partials._footer_content')
        <!-- /footer content -->
      </div>
    </div>

@include('incs.footer')