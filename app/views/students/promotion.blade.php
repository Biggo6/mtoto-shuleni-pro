@extends('layout')

@section('title', 'Students Promotion')

@section('main')



		<div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-line-chart"></i> Student Promotion</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                        <div class="row">
                        <div class="col-md-2">

                                <label>Current Session</label><br/>
                                <select class="form-control">
                                    <option value="{{date('Y')}}">{{date('Y')}} - {{HelperX::getNextYear()}}</option>
                                </select>
                        </div>
                        <div class="col-md-2">
                                <label>Promote To Session</label><br/>
                                <select class="form-control">
                                    <option value="{{HelperX::getNextYear()}}">{{HelperX::getNextYear()}} - {{HelperX::getNextOfNextYear()}}</option>
                                </select>
                        </div>
                        <div class="col-md-2">
                                <label>Promotion From Class</label><br/>
                                <select class="form-control">
                                
                                </select>
                        </div>
                        <div class="col-md-2">
                                <label>Section </label><br/>
                                <select class="form-control"></select>
                        </div>

                        <div class="col-md-2">
                                <label>Promotion To Class</label><br/>
                                <select class="form-control"></select>
                        </div>
                        <div class="col-md-2">
                                                        <label>Section</label><br/>
                                                        <select class="form-control"></select>
                                                </div>

                        </div>
                        <hr/>
                        <center>
                            <button class="btn btn-primary"><i class="fa fa-list"></i> Manage Promotion</button>
                        </center>
                  </div>
        </div>



</div>


@stop