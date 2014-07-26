/*
*  @function hideWeatherContainers 
*    @param: sectionContainer 
* if not provided all are hidden
*/
function hideWeatherContainers(sectionContainer){      
        if(!sectionContainer){
            var sectionContainer = ".weather-container-parent";
        }
            $(sectionContainer).hide();        
}

/*
*  @function setupWeatherContainers
*   show first container in each well
*/
function setupWeatherContainers(){
    // count total container elements. there are 3 per section 
    var containerCount= $(".weather-container-parent").size();
    for(var i = 0; i < containerCount;){
        $($(".weather-container-parent")[i]).show();
        // i is incremented by 3 as there are 3 elements per container
        // by adding 3 we ony show the first of each on inital load
        i = i + 3;
    }
}
