$.fn.footer = function(footer_data) {
 
        var source =  '<span class="footerleft span6 offset1">Copyright 2012 <strong>All rights reserved</strong></span>'+
				          '<ul class="footerright span3 offset1">'+
				          '<li>Home</li>'+
				          '<li class="dot">.</li>'+
				          '<li>About</li>'+
				          '<li class="dot">.</li>'+
				          '<li>Contact us</li>'+
				          '</ul>';

        var template = Handlebars.compile(source); 

        var data = footer_data ; 

        var return_html = template(data);
        
        return this.html(return_html);

};