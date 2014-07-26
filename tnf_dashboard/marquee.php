<html>  
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="js/jquery.marquee.js" type="text/javascript"></script>

    <script type="text/javascript">
    <!--
    $(function () {
        // basic version is: $('div.demo marquee').marquee() - but we're doing some sexy extras
        
        $('div.demo marquee').marquee('pointer').mouseover(function () {
            $(this).trigger('stop');
        }).mouseout(function () {
            $(this).trigger('start');
        }).mousemove(function (event) {
            if ($(this).data('drag') == true) {
                this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
            }
        }).mousedown(function (event) {
            $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
        }).mouseup(function () {
            $(this).data('drag', false);
        });
    });
    //-->
    </script>
  </head>
  <body> 
      <div id="page">
      <marquee behavior="scroll" direction="left" scrollamount="4" width="100%">
      <p>
         <img src="siren.gif" style="height:40px;width:70px;"/>

         <font size="10" color="red">
         TMUSA - Phoenix: File production has stopped! 
         </font>
         <img src="siren.gif" style="height:40px;width:70px;"/>
      </p></marquee>
     </div>
  </body>
</html>
