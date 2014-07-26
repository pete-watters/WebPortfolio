var applicationSetup = function(){
	// build JSON object to return login information		
	var easyDocs_setup = {
							"build": "0.1",
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
	return	easyDocs_setup;
}




$(function(){
	$("#menulink-home").on("click", function(event){ 

					//event.preventDefault();
					//$(this).find(a);
					console.log("dwdw");

	});


var checkLoggedIn = function (loggedIn){

			if(!(loggedIn)){
				var TopUserMenu = '<ul class="login-menu"><li><a href="" title="">Home</a></li><li><a href="" title="">Apps</a></li>' +
				 				  '<li><a href="" title="">Team</a></li><li><a href="" title="">Services</a></li><li><a href="" title="">Contact</a></li>'+
								  '</ul>';


				$("#menu").html(TopUserMenu);
			//	$(".workbench").load('partials/register.html');
				

			}else{
				// Logged In
				$("#topNavigation").load("partials/topNavigation.html");


				var TopUserMenu = '<div id="loggedin">Logged in: <span id="username">Andy Smith</span><div class="middleline"></div>' +
								  '</div><a href="" title="Logout" class="logout">Logout <img src="images/logout.png" alt="Logout"></a>';


				$("#menu").html(TopUserMenu);
			//	$(".workbench").load('partials/home.html');

				

			}
	}

	//var loggedIn;

	checkLoggedIn(true);

	$(".register-btn").on("click", function(event){
					event.preventDefault();
					var loggedIn = true;
					checkLoggedIn(loggedIn);


				});

	$(".logout").on("click", function(event){
					event.preventDefault();
					var loggedIn = false;
					checkLoggedIn(loggedIn);

				});


})