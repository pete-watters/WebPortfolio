$.fn.welcomeMessage = function(welcomeMessage_Data) {
 
        var source =  'Hi {{name}}, welcome to Nova! <br /> <span id="underwelcome">{{welcomeMessage}}</span>';
        var template = Handlebars.compile(source); 

        var data = welcomeMessage_Data ; 

        var return_html = template(data);

        return this.html(return_html);

};
						