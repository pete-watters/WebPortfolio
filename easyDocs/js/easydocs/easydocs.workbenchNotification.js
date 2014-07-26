$.fn.workbenchNotification = function(workbenchNotification_data) {

      var source =  '<button type="button" class="close" data-dismiss="alert"></button>' +
                    '<strong>Warning!</strong> Best check yo self, you\'re not looking too good.';  

        var template = Handlebars.compile(source); 

        var data = workbenchNotification_data ; 

        var return_html = template(data);
        
        return this.html(return_html);

};



                      
         