$.fn.workbenchNavigation = function(workbenchNavigation_data) {

      var source =  '<ul class="workbench-tabs nav nav-tabs span8 offset1">'+ 
                      '  <li id="homeTabHead" class="active"><a href=""><i class="icon-home"></i><span>Home</span></a></li>'+ 
                      '  <li id="dashboardTabHead"><a href="#/dashboard"><i class="icon-list-alt"></i><span>Dashboard</span></a></li>'+
                      '  <li id="clientTemplatesTabHead"><a href="#/clientTemplates"><i class="icon-file"></i><span>Templates</span></a></li>'+
                      '  <li id="adminTabHead"><a href="#/admin"><i class="icon-wrench"></i><span>Admin</span></a></li>'+
                         '<li id="breadcrumb" class="breadcrumb"><span>You are here:</span><i class="icon-home"></i><span>Home</span><span id="breadcrumb-location"></span></li>'+
                      '  </ul>';

        var template = Handlebars.compile(source); 

        var data = workbenchNavigation_data ; 

        var return_html = template(data);
        
        return this.html(return_html);

};



                      
         