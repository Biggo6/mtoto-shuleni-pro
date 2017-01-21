<?php
	
	$sections = MsClass::where('class_name', $c)->where('status',1)->where('class_section', '!=', 0)->count();
	if($sections != 0){
      $real_sections = Section::all();
      $class_sections = MsClass::where('status', 1)->where('class_name', $c)->select('class_section')
            ->distinct()
            ->get();

           $css = []; 
          foreach ($class_sections as $cs) {
              $css[] = Section::find($cs->class_section)->name;
          }
  }
  

?>

<div >
	<h3 class="alert alert-info">Students Information - Class : <label class="label label-danger"><i>{{$c}}</i></label></h3>
</div>
<hr/>



<div class="" role="tabpanel" data-example-id="togglable-tabs">
  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i> All Students</a>
    </li>
    @if($sections!=0)
      <?php $c=2; ?>
      @foreach($real_sections as $rs)
        @if(in_array($rs->name, $css))
      <li role="presentation" class=""><a href="#tab_content{{$c}}" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i> Section {{$rs->name}}</a>
      </li>
      @endif
      <?php $c++; ?>
      @endforeach
    @endif
    
  </ul>
  <div id="myTabContent" class="tab-content">
    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
        
        <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                            <table id="datatable" class="table  table-striped table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Admit Number</th>
                                      <th>Photo</th>
                                      <th>Full Name</th>
                                      <th>Address</th>
                                      <th>Email</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                              </tbody>
                            </table> 
                  </div>
      </div>

         
    </div>
    @if($sections!=0)
      <?php $c=2; ?>
      @foreach($real_sections as $rs)
        @if(in_array($rs->name, $css))
        <div role="tabpanel" class="tab-pane fade in" id="tab_content{{$c}}" aria-labelledby="home-tab">

          <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
<table id="datatable{{$c}}" class="table  table-striped table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Admit Number</th>
                                      <th>Photo</th>
                                      <th>Full Name</th>
                                      <th>Address</th>
                                      <th>Email</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                              </tbody>
                            </table> 
                  </div>
          </div>        
                           

    </div>
      @endif
      <?php $c++; ?>
      @endforeach
    @endif
    
  </div>
</div>

     <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>

       <script src="{{url('ve/js/languages/jquery.validationEngine-en.js')}}" type="text/javascript" charset="utf-8"></script>
                  <script src="{{url('ve/js/jquery.validationEngine.js')}}" type="text/javascript" charset="utf-8"></script>

<!-- Datatables -->
    <script src="{{url('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{url('vendors/datatables.net-scroller/js/datatables.scroller.min.js')}}"></script>

    <script type="text/javascript">
    $(function(){
        $('#datatable').dataTable();
        @if($sections!=0)
        <?php $cx=2; ?>
        @foreach($real_sections as $rs)
          @if(in_array($rs->name, $css))
            $('#datatable{{$cx}}').dataTable();
          @endif
          <?php $cx++; ?>
        @endforeach
        @endif  

    });
    </script>    

