/*
  @function setupLocationList - generates <li> and buttons for location entry
  @param localStorageID
  @param city
  @param country
*/
function setupLocationList(localStorageID, city, country){
     $("#locations").append("<li id='location-forecast-"+ localStorageID +"' class='location-entry'>"+
                  "<a href='#'>" + city + ", " + country + "</a>"+   
                  "<span class='locationControls'>"+
                  "<button class='WeatherInfo btn btn-info' title='Info'>Weather</button>" +
                  "<button class='RemoveLocation btn btn-danger' title='Remove'>Delete <i class='icon-remove icon-white'></i></button>"+
                  "</span></li>"+
                  "<li class='divider'></li>");
          }
