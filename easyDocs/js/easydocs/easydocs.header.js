$.fn.header = function(footer_data) {

      var source =  '<span class="rays"></span>'+
                    '<span class="dots2"></span>'+       
                    '<span class="dots-middle"></span> '+                  
                     ' <div class="span2 offset2">'+
                     '    <a href="" title="Nova" class="logo"><img src="images/logo.png" alt="Nova" /></a>'+
                     ' </div>'+
                      '  <div id="menu"  class="span2 offset9">'+                     
                    '  </div>  ';

        var template = Handlebars.compile(source); 

        var data = footer_data ; 

        var return_html = template(data);
        
        return this.html(return_html);

};