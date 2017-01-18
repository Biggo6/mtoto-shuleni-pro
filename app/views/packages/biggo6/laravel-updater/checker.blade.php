@extends('layout')

@section('title', 'Software Update Check')

@section('main')
    
    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-refresh"></i> Software Update Now</h4>
                </div>
                <div class="modal-body">
                    <h2 class="">
                        <i class="fa fa-info-circle"></i> Access Token is required!
                    </h2>
                    <hr/>
                    <form  class="form-horizontal" role="form">
                            <div class="form-group">
                                <label>Enter Token</label>
                                 <input type="text"  name="access_token" {{HelperX::ve(["veName"=>"Access Token", "veVs"=>"required"])}} placeholder="Enter Access Token">
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> Update Now</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-5">
            <div class="panel {{$newVersion ? 'panel-danger' : 'panel-success'}}">
                <div class="panel-heading">Check for updates</div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-8">Your Version: {{$localVersion}}</div>
                        @if($newVersion)
                            <div class="col-md-4 pull-right"><a data-toggle="modal" href='#modal-id'
                                                                class="btn btn-success">Update</a></div>
                            <div class="col-md-8">There is a new version available: {{$remoteVersion}}</div>
                        @else
                            <div class="col-md-4 pull-right"><a href="{{url("self-updater/check")}}"
                                                                class="btn btn-default">Check again</a></div>
                            <div class="col-md-8">Your Application is up-to-date.</div>
                        @endif
                    </div>
                    <hr/>
                    <p>Powered By Izweb Technologies</p>
                </div>
            </div>
        </div>
    </div>
@endsection