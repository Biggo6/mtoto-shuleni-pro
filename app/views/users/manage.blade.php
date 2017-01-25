@extends('layout')

@section('title', 'Manage Users')

@section('main')

<div class="row">

	<div class="col-md-12">
		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-list"></i> Manage Users</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                   <table id="datatable" class="table  table-striped table-bordered">
                                                 <thead>
                                                     <tr>
                                                         <th>#</th>
                                                         <th>Firstname</th>
                                                         <th>Lastname</th>
                                                         <th>Username</th>
                                                         <th>Role</th>
                                                         <th>Status</th>
                                                         <th>Logout Time</th>
                                                         <th>Login Time</th>
                                                         <th>Actions</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>


                                              <?php
                                                  $users = User::orderBy('created_at', 'DESC')->get();

                                                  $i = 1;
                                              ?>

                                             @foreach($users as $u)
                                             <tr>
                                                  <td>{{$i}}</td>
                                                  <td>{{$u->firstname}}</td>
                                                  <td>{{$u->lastname}}</td>
                                                  <td>{{$u->username}}</td>
                                                  <td><label class="label label-warning">{{Role::find($u->role_id)->name}}</label></td>
                                                  <td>{{HelperX::getStatus($u->active)}}</td>
                                                  <td>{{HelperX::getLogoutTime($u->id)}}</td>
                                                  <td>{{HelperX::getLoginTime($u->id)}}</td>
                                                  <td>

                                                   <a href="#"  data-toggle="modal" data-target="#myModal"><label class="label label-info" title="View User Login Histories" style="cursor: pointer"> <i class="fa fa-list"></i> Login Histories</label></a>


                                                  </td>
                                              </tr>
                                             @endforeach



                                                 </tbody>
                                               </table>
                  </div>
        </div>
	</div>

</div>

@stop