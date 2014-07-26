// JavaScript Document
<script type="text/javascript">			
			window.onload = function() {
				var drawingCanvas = document.getElementById('myDrawing');
				
				// Check the element is in the DOM and the browser supports canvas
				if(drawingCanvas && drawingCanvas.getContext) {
					// Initaliase a 2-dimensional drawing context
					var context = drawingCanvas.getContext('2d');
										
					// Added to draw Grid
					for (var x = 0.5; x < 500; x += 10) {
				   context.moveTo(x, 0);
               context.lineTo(x, 375);
              }
              for (var y = 0.5; y < 375; y += 10) {
              context.moveTo(0, y);
              context.lineTo(500, y);
              }
              context.strokeStyle = "#eee";
              context.stroke();
              // End of Grid
                            				
					
					//draw X axis: 
					context.beginPath();
					context.moveTo(0, 360);
					context.lineTo(500, 360);
					
					//draw arrow at end of line on x axis
					context.moveTo(495, 365);
					context.lineTo(500, 360);
					context.lineTo(495, 355);		
					
					//draw scale on x axis
					for (var x = 35; x < 500; x += 10) {
				   context.moveTo(x, 365);
					context.lineTo(x, 360);
               context.lineTo(x, 355);
               
              }
					//context.moveTo(490, 365);
					//context.lineTo(490, 360);
					//context.lineTo(490, 355);					
					
					
					// draw Y axis
					context.moveTo(25, 0);
					context.lineTo(25, 375);
					
					//context.moveTo(inFromLeft,)
					//draw arrow at end of line on y axis
					context.moveTo(25, 0);
					context.lineTo(15, 10);
					context.moveTo(25, 0);
					context.lineTo(35, 10);
					
											
				   context.strokeStyle = "#000";
					context.stroke();
					
					//draw scale on y axis
					for (var y = 35; y < 370; y += 10) {
				   context.moveTo(20, y);
					context.lineTo(25, y);
               context.lineTo(30, y);					
					context.strokeStyle = "#000";
					context.stroke();					
					} 
					
					
					context.font = "bold 12px sans-serif";
					context.fillText("x", 248, 395);
					context.fillText("y", 5, 165);		
										
					context.closePath();
					//end Axis
					
					// for loop to draw points 
					
					for (var p = 80; p < 300; p += 10)
					{						
					for (var q = 100; q < 400; q += 20){

					context.fillStyle = "#009966";
					context.beginPath();
					context.arc(q,p,3,0,Math.PI*2,true);
					context.closePath();
					context.fill();
					}
					}
					
					context.fillStyle = "#009966";
					context.beginPath();
					//context.arc(x,y,diameter,?,Math, true);
					context.arc(120,80,3,0,Math.PI*2,true);
					context.closePath();
					context.fill();
					
					// more points
					context.fillStyle = "#009966";
					context.beginPath();
					context.arc(300,80,3,0,Math.PI*2,true);
					context.closePath();
					context.fill();

					context.fillStyle = "#009966";
					context.beginPath();
					context.arc(300,175,3,0,Math.PI*2,true);
					context.closePath();
					context.fill();					
																			
					
					// Draw a line: 
					context.beginPath();
					context.moveTo(350,100);
					context.lineTo(100, 270);
					context.closePath();	
					context.strokeStyle = "#CC0033"
					context.stroke();
				}
				
				
				
			}
		</script>