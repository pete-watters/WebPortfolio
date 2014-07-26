'use strict';

/* Controllers */

angular.module('myApp.controllers', []).
  controller('GeneralCtrl', [function() {
   	carouselTimeout();   	
 	$(".freebet_span").hide();
  }])
  .controller('HomeCtrl', [function() {
	   	carouselTimeout();
	 	bettingOfferTableRedirects();
 		/* Show the free bet thumbnails */
 		$(".freebet_span").show();
  }])   
.controller('BetCalculatorCtrl', [function() {
	$(".freebet_span").hide();
			/*Bet Calculator */
			$("#betCalculatorForm").submit(function() {

			  	/*
			  	Psuedo Logic:
					- if there is a stake
					- if at least one odds is filled in
					- check win / lose flag
					- get value of odds, if fraction divide
					- multiply stake by this to get result
					- display result


					TODO =>
						- change fraction / decimal radio to tabs - easier to manage
						- add + symbol to add more best? 
						- make select change amount of odds rows 

			  	*/
			  			var stake = $("#betCalculatorStake").val();
			  			var betType = $("#betCalculatorBetType").val();
			  			var oddsFormat = $("#bettingTab").find(".active").find("a").text();

			  			if(stake.length){
			  				console.log("stake: " + stake + " betType:" + betType + " oddsFormat: " + oddsFormat); 
			  				/* Declare and set defaults */
			  				var betReturn = "0"; 
			  				var betProfit = "0";
			  				/* total winnings for multiple bets */
			  				var OverAllResult = 0;

			  				if(oddsFormat == "Fraction"){

			  					var oddsRowCount = $("#Fraction .row").length;

			  					for(var i=0; i <= oddsRowCount-1; i++){
			  						console.log("i: " + i + "fraction row: " + $("#Fraction .row")[i]);


			  						console.log("fractionNumerator: " + $("#Fraction .row .fractionNumerator")[i] 
			  									+ "fractionDenominator: " +  $("#Fraction .row .fractionDenominator")[i]);
			  					
			  						var fractionNumerator = parseInt($(".fractionNumerator-" + i).val());
			  						var fractionDenominator = parseInt($(".fractionDenominator-" + i).val());
			  						var betOutcome = $(".fractionBetOutcome-" + i).find(":selected").text();

			  						stake = parseInt(stake);
			  						if ( fractionNumerator && fractionDenominator && stake && betOutcome == "Win"){			  							
					  						var decimalOdds = fractionNumerator/fractionDenominator;
					  						var result = stake * decimalOdds;
			  								console.log( "decimalOdds: " + decimalOdds + " Result: " +  result);
			  								OverAllResult = OverAllResult + result;
			  						}
			  					}
			  					console.log("OverAllResult: " + OverAllResult);
			  					var OverallProfit = OverAllResult - stake;

			  					var ShowResultPanel = function(stake , betReturn , betProfit){
					  				/* Show Result */
					  				$(".betCalculator-resultContainer").show();
					  				$("#betCalculator-resultText-Stake").text("Stake: £" + stake);
					  				$("#betCalculator-resultText-Return").text("Return: £" + betReturn);
					  				$("#betCalculator-resultText-Profit").text("Profit: £" + betProfit);
			  				}


			  					ShowResultPanel(stake, OverAllResult, OverallProfit);

			  				/*	fractionDenominator
			  					fractionNumerator
							*/

			  					console.log("fraction");
			  				}else if(oddsFormat == "Decimal"){
			  					console.log("decimal");
			  				}

			  				
			  			}else{
			  				console.log("please give a stake"); 
			  			}
			  /*
					  if ($("input:last").val() == "correct") {

					   		 $("span").text("Validated...").show();
					    return true;
					  }
					  $("span").text("Not valid!").show().fadeOut(1000);
					  return false;
					  */
					});
  }])
  .controller('MyCtrl2', [function() {

  		/* Sample RSS AJAX */
		/* function parseRSS(url, callback) {
		  $.ajax({
		    url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(url),
		    dataType: 'json',
		    success: function(data) {
		      callback(data.responseData.feed);
		    }
		  });
		} */
  }]);