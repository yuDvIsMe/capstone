function factCounter() {
    if($('.fact-counter').length){
     $('.fact-counter .count.animated').each(function() {
    
      var $t = $(this),
       n = $t.find(".count-num").attr("data-stop"),
       r = parseInt($t.find(".count-num").attr("data-speed"), 10);
       
      if (!$t.hasClass("counted")) {
       $t.addClass("counted");
       $({
        countNum: $t.find(".count-text").text()
       }).animate({
        countNum: n
       }, {
        duration: r,
        easing: "linear",
        step: function() {
         $t.find(".count-num").text(Math.floor(this.countNum));
        },
        complete: function() {
         $t.find(".count-num").text(this.countNum);
        }
       });
      }
      
      //set skill building height
       var size = $(this).children('.progress-bar').attr('aria-valuenow');
       $(this).children('.progress-bar').css('width', size+'%');

      
     });
    }
  }

  var $window   			= $(window);

  if($('.wow').length){
    var wow = new WOW(
      {
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true       // act on asynchronously loaded content (default is true)
      }
    );
    wow.init();
    }

    $(document).ready(() => setTimeout(factCounter, 500));

