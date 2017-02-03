@extends('layout')

@section('title', 'Dashboard')

@section('main')



@include('partials._success')

@if( Role::where('id', Auth::user()->role_id)->first()->name == "teacher")

<br/><br/><br/>

<div class="alert alert-info"><i class="fa fa-info"></i> Welcome Teacher!</div>

<div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                  <div class="count">{{Student::where('running_year', date('Y'))->count()}}</div>
                  <h3>Students</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count">{{Teacher::count()}}</div>
                  <h3>Teachers</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">{{Parentx::count()}}</div>
                  <h3>Parents</h3>
                  
                </div>
              </div>
              
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Event Schedule </h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <div class="alert alert-warning"><i class="fa fa-info"></i> No Event Published</div>

                  

                  </div>
                </div>
              </div>
            </div>



            
          </div>

@endif

@if(Role::where('id', Auth::user()->role_id)->first()->name == "custom_admin" || Role::where('id', Auth::user()->role_id)->first()->name == "admin")
<div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                  <div class="count">{{Student::where('running_year', date('Y'))->count()}}</div>
                  <h3>Students</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book"></i></div>
                  <div class="count">{{Teacher::count()}}</div>
                  <h3>Teachers</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">{{Parentx::count()}}</div>
                  <h3>Parents</h3>
                  
                </div>
              </div>
              
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Event Schedule </h2>
                    <div class="filter">
                      <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <div class="alert alert-warning"><i class="fa fa-info"></i> No Event Published</div>

                  

                  </div>
                </div>
              </div>
            </div>



            
          </div>
@endif

@stop