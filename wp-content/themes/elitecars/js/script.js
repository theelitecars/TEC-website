(function($) {
	
	$(window).on("scroll", function() {
		if($(window).scrollTop() > 50) {
			$("header#masthead").addClass("active");
		} else {
			$("header#masthead").removeClass("active");
		}
	});

	var checkMod = function() {  

		$("header#masthead .container .mobile-view").removeClass("show");
        $("#menu-bg").removeClass("active");

        if (Modernizr.mq('(max-width: 992px)')) {   
            if (!$("header#masthead .container .menu").hasClass("mobile-view")) {
            	$("header#masthead .container .menu").addClass("mobile-view");
            }
            
        } else {
			if ($("header#masthead .container .menu").hasClass("mobile-view")) {
            	$("header#masthead .container .menu").removeClass("mobile-view");
            }
        }
    }

    $(window).resize(checkMod);
    checkMod();


    $("#show-menu").on("click", function(){
    	if (!$("header#masthead .container .mobile-view").hasClass("show")) {
        	$("header#masthead .container .mobile-view").addClass("show");
        	$("#menu-bg").addClass("active");
        } else {
        	$("header#masthead .container .mobile-view").removeClass("show");
        	$("#menu-bg").removeClass("active");
        }
    });

    $(".close-menu").on("click", function(){
        if ($("header#masthead .container .mobile-view").hasClass("show")) {
            $("header#masthead .container .mobile-view").removeClass("show");
            $("#menu-bg").removeClass("active");
        }
    });


    if($(".menu ul li a").next(".sub-menu").length !== 0) {
    	$(".menu ul li .sub-menu").prev().append("<div class=\"down\"><i class=\"fa fa-angle-down\" aria-hidden=\"true\"></i></div>");
    
    	$(".mobile-view ul li .sub-menu").prev().on("click", function() {
    		if(!$(this).next().hasClass("expand")) {
    			$(".mobile-view ul li .sub-menu").not($(this)).removeClass("expand");
				$(this).next().addClass("expand");
    		} else {
    			$(".mobile-view ul li .sub-menu").removeClass("expand");
    		}
    		
    	});

    }

    $(".mobile-view ul li .sub-menu").removeClass("expand");

    $('.clampThis').each(function(index, element) {
        $clamp(element, { clamp: 1});
    });

    $('.clampThis2').each(function(index, element) {
        $clamp(element, { clamp: 2});
    });
    $('.clampThis3').each(function(index, element) {
        $clamp(element, { clamp: 3});
    });

	
})( jQuery );