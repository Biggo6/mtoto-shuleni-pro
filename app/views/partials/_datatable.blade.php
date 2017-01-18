@if((count($mapEls)) != (count($columns)-1))

<div class="alert alert-danger">
  <i class="fa fa-warning"></i> Please <i>"data"</i> count should be equal to <i>"mapEls"</i> count
</div>

@else

<?php $md = (($modal) == "large") ? "modal-lg" : '';   ?>



<table id="datatable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>#</th>
        @foreach($columns as $column)
        <th>{{$column}}</th>
        @endforeach
      </tr>

    </thead>
    
    <tbody> 

      <?php $i=1; ?>
      @if(isset($data))
      @foreach($data as $d)



        <tr>
            <td>{{$i}}</td>
            @foreach($mapEls as $mapEl)



              @if($mapEl == "status")
              <td>{{HelperX::getStatus($d->$mapEl)}}</td>
              @else

               @if(isset($photos))
                  @foreach($photos as $photo)
                      @if($photo == $mapEl)
                          @if($d->$mapEl == "")
                            <td><img src="{{url('images/img.jpg')}}" style="width:50px" /></td>
                          @else
                            <td><img src="{{($d->$mapEl)}}" style="width:50px" /></td>
                          @endif
                      @else
                          <td>{{($d->$mapEl)}}</td>
                      @endif
                  @endforeach
              @else
                  <td>{{($d->$mapEl)}}</td>
              @endif

              @endif
            @endforeach
            <td>{{View::make("actions.tools")->withRowid($d->id)->withModal($md)}}</td>
        </tr>
        <?php $i++; ?>
      @endforeach
      @endif
    </tbody> 
</table>

<div class="modal fade" id="modal-id">
  <div class="modal-dialog modal-{{($modal)}}">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Information</h4>
      </div>
      <div class="modal-body">
        <center>
          <img class="loader" style="display:none" src="{{url('images/loader.gif')}}" />
        </center>
        <div id="edit_area"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $('.edit_row').on('click', function(){
    var row_id = $(this).attr('rowid');
    
    $('.loader').show();
    $('#edit_area').html('');
    var url = '{{url($url_edit)}}' + "/" + row_id;
   
    var biggo = Biggo.talkToServer(url, {row_id:row_id}).then(function(res){
        $('.loader').hide();
        $('#edit_area').hide().html(res).fadeIn();
    });

    @if(Config::get('app.debug'))
            biggo.fail(function(err){
            var error = JSON.stringify(err);
            $('.loader').hide();
            Biggo.errorBox(edit_area, error);
        });
    @endif


  });
  $('.delete_row').on('click', function(){
    var row_id = $(this).attr('rowid');
    
    var url = '{{url($url_delete)}}' + "/" + row_id;
   
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: true
    },
    function(isConfirm){
      if (isConfirm) {
        var biggo = Biggo.talkToServer(url, {row_id:row_id}).then(function(res){
            swal({
                title: 'Deleted',
                text: 'Successfully deleted!',
                type: 'success'
            }, function() {
                window.location = '{{route($refreshWix)}}';
            });
            
        });
        @if(Config::get('app.debug'))
            biggo.fail(function(err){
            var error = JSON.stringify(err);
            alert(error)
        });
        @endif
      }
    });
    
  });  
});
</script>

@endif
