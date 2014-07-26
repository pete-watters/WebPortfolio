var carouselTimeout = function(){
	/* Carousels auto cycle */
  			setTimeout(function(){
							$('.carousel').carousel({
									        interval: 7000
									    });
						    $('.carousel').carousel('cycle');
					},3000);
}

var bettingOfferTableRedirects = function(){
	/* Betting offer table redirects */
	$(".bet365-offer").on("click" , function(){ console.log("dadad"); window.open('http://www.bet365.com/home/?affiliate=365_193285', 'window name', 'window settings'); return false;});
	$(".willHill-offer").on("click" , function(){window.open('http://www.williamhill.com/', 'window name', 'window settings'); return false;});
	$(".betFred-offer").on("click" , function(){window.open('http://www.betfred.com/', 'window name', 'window settings'); return false; });
	$(".paddyPower-offer").on("click" , function(){window.open('http://www.paddypower.com/?btag=10077722_20130630153412840840000&AFF_ID=10077722', 'window name', 'window settings'); return false;});
	$(".skyBet-offer").on("click" , function(){window.open('http://www.skybet.com/', 'window name', 'window settings'); return false; });
	$(".stanJames-offer").on("click" , function(){window.open('http://www.stanjames.com/', 'window name', 'window settings'); return false;});
} 	



  			