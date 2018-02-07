@extends('layouts.main')
@section('content')

<div class="container">



    		<div class="row">
    			<div class="col-sm-12">
    				<h2 class="text-center">Contacts</h2><br>
    			</div>
    		</div>

    		<div class="row">
    			<div class="col-md-8 col-md-offset-2">

    					<div class="row">
    						<div class="col-sm-5">
    							<h5>Restaurant</h5>
    							<p>Tel: +370 686 552547</p>

    							<p>Hours of Operation:</p>
    							<p>Daily 11 AM - 1 AM</p><br />
    							<a href="/reservations"><i class="fa fa-chevron-right red"></i> Make a Reservation</a>
    						</div>

    						<div class="col-sm-7">
    							<div style="overflow:hidden;height:400px;width:470px;">
    							<div id="gmap_canvas" style="height:400px;width:470px;">
    								<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
    								<a class="google-map-code" href="http://www.embedgooglemap.net" id="get-map-data">embedgooglemap.net</a>
    							</div>
    							</div>

    						</div><!--End Inner Row-->
    				</div><!--Col 8-->
    		</div><!--End Row-->

    	</div>
    </div>

    @endsection

    @section('javascript')
    	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    	<script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(54.679664,25.284075799999982),mapTypeId: google.maps.MapTypeId.TERRAIN};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(54.679664, 25.284075799999982)});infowindow = new google.maps.InfoWindow({content:"<b>SPOT restaurant</b><br/>Vokieciu 11<br/> Vilnius" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
    @endsection
