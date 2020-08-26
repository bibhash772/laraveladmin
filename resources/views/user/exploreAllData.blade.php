@extends('layouts.user')
@section('content')
    <section class="db_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="hm_headng">EXPLORE ALL DATA</h3>
                </div>
                <div class="col-md-6">
                    <input type=text name="search" id="search" placeholder="Search" style="float: right;
                        width: 296px;padding: 10px;"/>
                </div>
            </div>


            <div class="db_content">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div  id="map" style="height:500px">
                       
                    </div>
                </div>
            </div>
        </div>
         <script type="text/javascript">
        var map;
        var markerCluster;
        function initMap() {

         map = new google.maps.Map(document.getElementById('map'), {
          zoom: 3,
          url: '/',
          center: {lat: 25.3626, lng: 77.23658}
        });

        // Create an array of alphabetical characters used to label the markers.
        //var labels = {!!json_encode($lable)!!}
        var sampledet = {!!json_encode($sampleid)!!}
        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        var markers=[];
        for(var i=0;i<locations.length;i++){
            var latLng = new google.maps.LatLng(locations[i].lat,locations[i].lng);
            if(markers.length != 0) {
                for (j=0; j < markers.length; j++) {
                    var existingMarker = markers[j];
                    var pos = existingMarker.getPosition();
                    if (latLng.equals(pos)) {
                        var a = 360.0 / markers.length;
                        var newLat = pos.lat() + -.00004 * Math.cos((+a*i) / 180 * Math.PI);  //x
                        var newLng = pos.lng() + -.00004 * Math.sin((+a*i) / 180 * Math.PI);  //Y
                        latLng = new google.maps.LatLng(newLat,newLng);
                    }
                }
            }
            marker = new google.maps.Marker({
            position: latLng,
            //label: {text: labels[i % labels.length], color: "white"},
            //icon:  "{!!asset('images/marker.png')!!}"
            });
            // Add info window to marker    
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                   /* infoWindow.setContent(service_des[i % service_des.length]);
                    infoWindow.open(map, marker);*/
                   location.href='/user/public-sample-detail/'+sampledet[i % sampledet.length]
                }
            })(marker, i));
            markers.push(marker);
        }

        // Add a marker clusterer to manage the markers.
        markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

      }
      var locations = {!!json_encode($sampledata)!!}
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5ZXiSvDuUSnE1rympSyyMxBVwJPaFRUE&callback=initMap">
    </script> -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuez0sjpQZGpO4HQ3WTA1QJsyE91c4Blk&callback=initMap">
    </script>
    </section>
  
@endsection
@section('footer-script')

@endsection