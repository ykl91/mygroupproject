
                $(document).ready(function() {

// Member Dashboard 'suggested events' carousel slide
          $("#myCarousel").on("slide.bs.carousel", function(e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 3;
            var totalItems = $(".carousel-item").length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
              var it = itemsPerSlide - (totalItems - idx);
              for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                  $(".carousel-item")
                    .eq(i)
                    .appendTo(".carousel-inner");
                } else {
                  $(".carousel-item")
                    .eq(0)
                    .appendTo($(this).find(".carousel-inner"));
                }
              }
            }
          });



// Header background color on scroll
          $(function() {
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 200) {
                    $(".navbar-scroll").addClass("active-header");
                    //$(".nav-link").attr("style","color: black");
                

                } else {
                    //remove the background property so it comes transparent again 
                   $(".navbar-scroll").removeClass("active-header");
                   //$(".nav-link").attr("style","color: white");
                }
            });
        });

        // NAV search bar animation

        $("#magnGlass").click(function(){
          if ($("#searchNav").css('visibility', 'hidden')){
            $("#searchNav").css('visibility', 'visible');   
            $("#searchNav").css('width', '300px');
          } else if ($("#searchNav").css('visibility', 'visible')) {
            $("#searchNav").css('visibility', 'hidden');   

          }
              
        });



    });
      

 