  var i18nSetup =  function(){
        // load I18N bundles and convert viewable JSON tags to i18n text
            jQuery.i18n.properties({
                name:'Weather', 
                path:'i18n/', 
                language:'en', 
                callback: function() {
                        /*
                            Text is changed here referencing the span class- this should definately be improved to a loop 
                            That was proving difficult as the i18n syntax required the tag name to be printed without quotes 
                            that proved harder than it sounds as its like converting a string to a callable JS var                             
                        */
                                    $('.current_condition').text(current_condition + ":");
                                    $('.cloudcover').text(cloudcover+ ":");
                                    $('.humidity').text(humidity+ ":");
                                    $('.observation_time').text(observation_time+ ":");
                                    $('.precipMM').text(precipMM + ":");
                                    $('.pressure').text(pressure + ":");
                                    $('.temp_C').text(temp_C + ":");
                                    $('.temp_F').text(temp_F+ ":");
                                    $('.visibility').text(visibility+ ":");
                                    $('.weatherCode').text(weatherCode+ ":");
                                    $('.weatherDesc').text(weatherDesc+ ":");
                                    $('.weatherIconUrl').text(weatherIconUrl);
                                    $('.winddir16Point').text(winddir16Point+ ":");
                                    $('.winddirDegree').text(winddirDegree+ ":");
                                    $('.windspeedKmph').text(windspeedKmph+ ":");
                                    $('.windspeedMiles').text(windspeedMiles+ ":");
                                    $('.winddirection').text(winddirection+ ":");
                                    $('.request').text(request+ ":");
                                    $('.query').text(query+ ":");
                                    $('.type').text(type+ ":");
                                    $('.weather').text(weather+ ":");
                                    $('.date').text(date+ ":");
                                    $('.precipMM').text(precipMM+ ":");
                                    $('.tempMaxC').text(tempMaxC+ ":");
                                    $('.tempMaxF').text(tempMaxF+ ":");
                                    $('.tempMinC').text(tempMinC+ ":");
                                    $('.tempMinF').text(tempMinF+ ":");
                                    $('.value').text(value);                    
                }
            });    
    }     