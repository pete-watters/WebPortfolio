$.fn.loginMenu = function() {
  //  return this.append('<p>pete is Go!</p>');



var easyDocs_setup = {
							"pages": {"home": "partials/home.html", 
									  "register": "partials/register.html",
									  "myProfile": "partials/my-profile.html",
         							  "myFolder": "partials/my-folder.html", 
		    					      "myDocuments": "partials/my-documents.html",
									  "myQuestions": "partials/questions-flow.html",
								      "partnerEditor": "partials/partner-editor.html", 
								      "partnerQuestions": "partials/partner-questions.html", 
								      "partnerActivity": "partials/partner-templates-activity.html", 
								      "partnerOverview": "partials/partner-templates-overview.html"
									   }
								};


	
				return this.html( easyDocs_setup.pages["home"] );

};