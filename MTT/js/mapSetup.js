  /*
    manipulate local storage data
  */

  // Populate location data minus one for returning user and divide by 3 as 3 entries per city
  var cityCount = ((localStorage.length-1) / 3);
  var cityArray = [];
  var weatherArray = [];
    // Initial loading of 4 default locations
      for( i = 0; i < cityCount; i++){        
    //  var forecast = JSON.parse(localStorage.getItem("location-forecast-" + i));
        // pass values to be added to location list
        cityArray.push(localStorage.getItem('location-city-'+i) +  "," + localStorage.getItem('location-country-'+i));

      }



    var IMAGES = [ "sun", "rain", "snow", "storm" ];
    var ICONS = [];
    var map = null;
    var mgr = null;
    // Create a base icon for all of our markers that specifies icon dimensions, etc.
    var baseIcon = new GIcon(G_DEFAULT_ICON);
    baseIcon.iconSize = new GSize(20, 34);
    baseIcon.iconAnchor = new GPoint(9, 34);
    baseIcon.infoWindowAnchor = new GPoint(9, 2);


    function setupMap() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.setCenter(new GLatLng(48.25, 11.00), 4);
         /*Geocoder */
        geocoder = new GClientGeocoder();
        map.enableDoubleClickZoom();
        window.setTimeout(setupWeatherMarkers, 0);

        // add points to map
        if (geocoder) {
          $.each(cityArray, function(index, value) {
            geocoder.getLatLng(
              value, // the value in array
              function(point) {
                if (!point) {
                  alert(address + " not found");
                } else {
                  map.addOverlay(createMarker(value , point, 4)); // dublin
                }
              }
            );
          });
          }
          
       
      }

    }


    /* Geocoder */
 function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 15);
              var marker = new GMarker(point, {draggable: true});
              map.addOverlay(marker);
              GEvent.addListener(marker, "dragend", function() {
                marker.openInfoWindowHtml(marker.getLatLng().toUrlValue(6));
              });
              GEvent.addListener(marker, "click", function() {
                var HTMLstring = 'Your Search: <br/><b>' + address + '</b><br/>'+ '<br/>' + marker.getLatLng().toUrlValue(6);
                marker.openInfoWindowHtml(HTMLstring);                
                // over-ride some of googles css to improve marker
                $("img[src$='iw3.png']").parent().css("height", "25px");
                $("img[src$='iw3.png']").parent().css("width", "25px");
              });
        GEvent.trigger(marker, "click");
            }
          }
        );
      }
    }

    /* END Geocoder */


// Creates a marker whose info window displays the letter corresponding to the given index.
function createMarker(value , point, index) {
  // Create a lettered icon for this point using our icon class
  var letter = String.fromCharCode("A".charCodeAt(0) + index);
  var letteredIcon = new GIcon(baseIcon);   
  // Set up our GMarkerOptions object
  markerOptions = { icon:letteredIcon };
  var marker = new GMarker(point, markerOptions);    
  GEvent.addListener(marker, "click", function() {

  var HTMLstring = "<div><b>" + value + "</b></div>";
  marker.openInfoWindowHtml(HTMLstring);

  $("img[src$='iw3.png']").parent().css("height", "25px");
  $("img[src$='iw3.png']").parent().css("width", "25px");
  });
  return marker;
}
    
function getWeatherIcon() {
  var weatherType ="storm";
  var i = 0;
  if (!ICONS[i]) {
    var icon = new GIcon();
    icon.image = "http://gmaps-utility-library.googlecode.com/svn/trunk/markermanager/release/examples/images/"
        + weatherType + ".png";
    icon.iconAnchor = new GPoint(16, 16);
    icon.infoWindowAnchor = new GPoint(16, 0);
    icon.iconSize = new GSize(32, 32);
    ICONS[i] = icon;
  }
  return ICONS[i];
}


function getWeatherMarkers(n) {
  var batch = [];
    batch.push(new GMarker(new GLatLng(53.349443,-6.260082), { icon: getWeatherIcon() })); // dublin
    batch.push(new GMarker(new GLatLng(41.385064,2.173404), { icon: getWeatherIcon() })); // barcelona
    batch.push(new GMarker(new GLatLng(51.507335,-0.127683), { icon: getWeatherIcon() })); // london
    batch.push(new GMarker(new GLatLng(48.856614,2.352222), { icon: getWeatherIcon() })); // paris        
  return batch;
}

function setupWeatherMarkers() {
  mgr = new MarkerManager(map);
  mgr.addMarkers(getWeatherMarkers(1), 4);
$.each(cityArray, function(index, value) {
            geocoder.getLatLng(
              value, // the value in array
              function(point) {
                if (!point) {
                  alert(address + " not found");
                } else {
 // mgr.addMarkers(new GMarker(point, { icon: getWeatherIcon("storm") }), 1);
                }
              }
            )});

  mgr.refresh();
}

