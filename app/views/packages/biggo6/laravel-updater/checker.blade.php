@extends('layout')

@section('title', 'Software Update Check')

@section('main')
    



    <div class="row">
        <div class="col-md-5">
            <div class="panel {{$newVersion ? 'panel-danger' : 'panel-success'}}">
                <div class="panel-heading">Check for updates</div>
                <div class="panel-body">
                    <div class="row">

                        <div class="col-md-8">Your Version: {{$localVersion}}</div>
                        @if($newVersion)
                            <div class="col-md-4 pull-right"><a href="{{url("self-updater/update")}}"
                                                                class="btn btn-success">Update</a></div>
                            <div class="col-md-8">There is a new version available: {{$remoteVersion}}</div>
                        @else
                            <div class="col-md-4 pull-right"><a href="{{url("self-updater/check")}}"
                                                                class="btn btn-default">Check again</a></div>
                            <div class="col-md-8">Your Application is up-to-date.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection