//navbar




    
    function testimonialSlider(){
        if ( $('#testimonial_slider').length ){
            $('#testimonial_slider').owlCarousel({
                loop:true,
                margin: 30,
                items: 3,
                nav:false,
                autoplay: true,
                dots: true,
                pagination:true,
                smartSpeed: 1500,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },

                    978:{
                    	items:3,
                    }
                },
               
            })
        }
    }
    testimonialSlider();  


     
    function owlflowers(){
        if ( $('#owlflowers').length ){
            $('#owlflowers').owlCarousel({
                loop:true,
                margin: 10,
                items: 3,
                nav:false,
                autoplay: true,
                dots: true,
                pagination:true,
                smartSpeed: 1500,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },

                    978:{
                    	items:3,
                    }
                },
               
            })
        }
    }
    owlflowers();  



  // counter 
  $('.counter').counterUp({
    delay: 10,
    time: 10000
  });







