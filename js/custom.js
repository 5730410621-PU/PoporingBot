
var ExampleClass = (function( $ ){

    var pubs = null,
        priv = null;
  
    var initial = function() {
      priv = {
        
      };
  
      pubs = {
  
      };
    };
  
    (function(){
      $(document).ready(function() {
        $('#news-owlcarousel').owlCarousel({
        items:3,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true
        });
        initial();
    });
  
  }());
  
      return pubs;
    }( jQuery ));
    