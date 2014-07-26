 /*
        @function: getForecast() - looks up free.worldweatheronline.com and gets weather data
        @param: i - this is the localstorage id
        @query: this is the parameters the user has entered e.g. 'Dublin, Ireland'
    */
    var getForecast = function( i , query){
      var apiKey = "84c7b64156180731130701";
      var url = "http://free.worldweatheronline.com/feed/weather.ashx?q=" + query + "&format=json&num_of_days=2&key="+apiKey;
      return $.ajax({
         type: 'GET',
          url: url,
          async: false,
          cache: false,
          contentType: "application/json",
          dataType: 'jsonp',
          success: function(weatherForecast) {
              // Should setup map here
          },
          error: function(weatherForecast) {
            // lookup has failed
             // console.log(e.message);
          },
          complete: function(weatherForecast){

             //console.log(localStorage.getItem( "location-forecast-"+i));
         //    createWeatherForecastContainer(i ,localStorage.getItem( "location-forecast-"+i) );
          }
      });
}

var createWeatherForecastContainer = function(i, weatherForecast_data){
    var data = JSON.parse(weatherForecast_data);
    var json = new JsonUtil();
    $(".weatherForecastWell").append('<div id="weatherForecastWell"></div>');
    $('#weatherForecastWell').append(json.tableifyObject(data));
                  }