// Author: Thomas Davis <thomasalwyndavis@gmail.com>
// Filename: main.js

// Require.js allows us to configure shortcut alias
// Their usage will become more apparent futher along in the tutorial.
require.config({
  paths: {
    jquery: 'libs/jquery/jquery-min',
    underscore: 'libs/underscore/underscore-min',
    backbone: 'libs/backbone/backbone-min',
    handlebars: 'libs/handlebars/handlebars',
    templates: '../templates',
    bootstrap: 'libs/bootstrap/bootstrap-min',
    pagination: 'easydocs/pagination',
    loginMenu: 'easydocs/easydocs.loginMenu',
    welcomeMessage: 'easydocs/easydocs.welcomeMessage',
    header: 'easydocs/easydocs.header',
    footer: 'easydocs/easydocs.footer',
    workbenchNavigation: 'easydocs/easydocs.workbenchNavigation',
    workbenchNotification: 'easydocs/easydocs.workbenchNotification'
    
 //   jqueryQtip: 'libs/jquery/jquery.qtip'


  },
    shim: {
        'pagination': {
            exports: 'pagination'
        }},
     urlArgs: "bust=v11"

});

require([
      // Load our app module and pass it to our definition function
     // "js/libs/jquery/jquery.qtip.js",      
     // "easydocs/easydocs.loginMenu",
     // "easydocs/easydocs.welcomeMessage",
      'app', 
      'handlebars' , 
       'pagination', 'loginMenu', 'welcomeMessage', 'header' , 'footer' ,
       'workbenchNavigation', 'workbenchNotification'

], function(App){
  // The "app" dependency is passed in as "App"
  // Again, the other dependencies passed in are not "AMD" therefore don't pass a parameter to this function
  App.initialize();

});
