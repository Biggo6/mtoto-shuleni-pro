<footer>
	@if(Route::currentRouteName() == "sms.settings")
  <div class="pull-right">
    Powered By <a href="http://izweb.co.tz">Izweb Technologies</a> | {{HelperX::getVersionLabelx()}}
  </div>
  @else
  	<div class="pull-right">
    Powered By <a href="http://izweb.co.tz">Izweb Technologies</a> | {{HelperX::getVersionLabel()}}
  </div>
  @endif
  <div class="clearfix"></div>
</footer>