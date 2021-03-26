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
            <div class="panel  panel-success">
                <div class="panel-heading"><i class="fa fa-refresh"></i> Check for updates <img style="display: none" id="checker" class="pull-right" src="{{url('images/ijax.gif')}}" /></div>
                <div class="panel-body"  id="updaterNow">
                    <div class="row">

                        <hr/>
                        <form id="updaterForm">
                        <input type="hidden" name="currentVersion" value="{{HelperX::getSystemVersion()}}" />   
                        <div class="col-md-8" id="uploder">
                            <input type="file" id="updateSoftware" name="updateSoftware" data-buttonName="btn-primary" class="filestyle" data-iconName="glyphicon glyphicon-refresh" data-input="false" data-buttonText="Upload New Software Updates Here" data-size="sm">
                        </div>
                        </form>
                        
                          
                       
                           
                    </div>
                    
                    <hr/>
                    <p>Powered By Izweb Technologies</p>
                </div>
            </div>
            
        </div>
    </div>
@endsection


@section('footerScripts')

 <script type="text/javascript" src="{{url('iztools/biggo.js')}}"></script>

<script type="text/javascript">


$(function(){
   $('#updateSoftware').on('change', function(){
        var fileInput = $('#updateSoftware');
        var file = (fileInput[0].files[0]);
        var arr  = Biggo.serializeData(updaterForm);
        var arr2 = ["updateSoftware"];
        var isFileUpload = true;
        var dataX = Biggo.prepareFormData(arr, arr2); 

        $('#checker').show();  
        $('#updaterNow').css('opacity', 0.2).css('cursor', 'wait');

        var biggo = Biggo.talkToServer('{{route('app.update')}}', dataX, isFileUpload,'post', 'text', null).then(function(res){
               

            $('#checker').hide();  
            $('#updaterNow').css('opacity', 1).css('cursor', 'pointer');

            var dt = JSON.parse(res);
            if(dt){
                Biggo.showFeedBack(updaterForm, dt.msg, dt.error);
            }else if(dt == false){
                Biggo.showFeedBack(updaterForm, dt.msg, dt.error);
                window.location = "{{route('app.refreshWith')}}";
            }
           


        });



        biggo.fail(function(err){
            Biggo.removeOpacity(updaterNow);
            Biggo.enableEl(updaterNow);
            var error = JSON.stringify(err);
            Biggo.errorBox(updaterNow, error);
        });
         


   });
});
</script>

@stop