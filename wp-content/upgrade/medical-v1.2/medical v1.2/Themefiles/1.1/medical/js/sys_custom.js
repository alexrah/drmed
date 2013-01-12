/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
	P R E T T Y P H O T O
-----------------------------
	F L E X   S L I D E R 
 -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */

jQuery(window).load(function(){
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({theme:'pp_default'}); /* light_square / dark_rounded /  dark_square / facebook */
	jQuery('.flexslider').flexslider({
		animation: "fade",				//String: Select your animation type, "fade" or "slide"
		controlsContainer: ".flex-container",
		slideshow: true,					//Boolean: Animate slider automatically
		slideshowSpeed: 3000,				//Integer: Set the speed of the slideshow cycling, in milliseconds
		animationDuration: 1000,			//Integer: Set the speed of animations, in milliseconds
		directionNav: false,				//Boolean: Create navigation for previous/next navigation? (true/false)
		controlNav: true,					//Boolean: Create navigation for paging control of each clide? Note: Leave true for	
		mousewheel: false,					//Boolean: Allow slider navigating via mousewheel				  
		start: function(slider) {
			jQuery('.total-slides').text(slider.count);
		},
		after: function(slider) {
			jQuery('.current-slide').text(slider.currentSlide);
		}
	});
});


	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		B U T T O N   D A T A   A T T R I B U T E S
	 -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function buttondata(){
		jQuery(".button").hover(function(){
			var $hoverBg = jQuery(this).attr('btn-hoverBg');
			var $hoverColor = jQuery(this).attr('btn-hoverColor');
			if($hoverBg!=undefined){
				jQuery(this).css('background-color',$hoverBg);
			}else{
			}
			if($hoverColor!=undefined){
				jQuery('span',this).css('color',$hoverColor);
			}else{}
		},function(){
			var $btnbg = jQuery(this).attr('btn-bg');
			var $btncolor = jQuery(this).attr('btn-color');
			if($btnbg!=undefined){
				jQuery(this).css('background-color',$btnbg);
			}
			if($btncolor!=undefined){
				jQuery('span',this).css('color',$btncolor);
			}
		});
	}
	
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		P R I C I N G   T A B L E 
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function atp_pricingtable() {

		jQuery('.pricetable .block').hover(
			function(){
				jQuery(this).addClass('active');
				jQuery(this).animate({'top': '-20px'},{
						duration: 300,
						easing: 'easeOutBack'
				});
				jQuery(this).siblings().removeClass('active');
			}, function() {
				jQuery(this).animate({'top': '0px'},{
					duration: 300,
					easing: 'easeInBack'
				});
			}
		);
			
		jQuery('.pricetable .block').eq(0).addClass('first');
		jQuery('.pricetable .block').eq(1).addClass('second active');
		jQuery('.pricetable .block').eq(2).addClass('third');
		jQuery('.pricetable .block').eq(3).addClass('fourth');

	}
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		S O C I A B L E S 
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function atp_sociables() {
		jQuery('ul.atpsocials li').find("img").css({opacity:'0.8'});
		jQuery("ul.atpsocials li").hover(function(){
			jQuery(this).find("img").animate({top:"-4px", opacity:'1'}, "fast")
			},function(){
			jQuery(this).find("img").animate({top:"-2px",opacity:'0.8'}, "fast")
		});
	}
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		T O G G L E S 
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function sys_toggle() {
		jQuery(".toggle_content").append("<div class='arrow'></div>").hide();

		jQuery("span.toggle").toggle(function(){
			jQuery(this).addClass("active");
			}, function () {
			jQuery(this).removeClass("active");
		});
		jQuery("#trigger").toggle(function(){
		jQuery(this).animate({top:5},50).animate({top:-30},50).animate({top:-10},800).addClass("active");
		}, function () {
		jQuery(this).animate({top:5},50).animate({top:-30},50).animate({top:-10},800).removeClass("active");
	});
		// Sticy Bar		
		jQuery("#trigger").click(function(){
			jQuery(this).next("#sticky").slideToggle({ duration: 500, easing: 'easeOutQuart'});
		});
		jQuery("span.toggle").click(function(){
			jQuery(this).next(".toggle_content").slideToggle();
		});
	}
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		H O V E R   I M A G E 
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function hoverimage() {

			jQuery('.hover_type').animate({opacity: 0});

			jQuery(".port_img").hover(function() {
				jQuery(this).find('.hover_type').css({display:'block'}).animate({
					opacity: 1, 
					bottom: (jQuery('.port_img').height())/2 - 20+'px'}, 300, 'easeInSine');
				jQuery(this).find('img').animate({"opacity": "0.7"}, 200);
				
			},function() {
				jQuery(this).find('.hover_type').animate({
					opacity: 0,
					bottom: '100%'}, 300, 'easeInSine', function() {
					jQuery(this).css({'bottom':'0'});
					});
				jQuery(this).find('img').animate({"opacity": "1"}, 200);
			}
		);
	}
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		S U P E R F I S H 
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function k_menu() {
		 jQuery("ul.sf-menu").superfish({ 
			   animation: {height:'show'},   // slide-down effect without fade-in 
				delay:     1200               // 1.2 second delay on mouseout 
		 }); 
	}
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		B O X O V E R L A Y
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	function boxoverlay() {
		//if mouse over and mouse out
		jQuery('.port_overlay').hover(
		function () {

			value = jQuery(this).find('img').outerHeight() * -1;

			//for left/right if you have different width and height, 
			//commented out because we are using up/down in this example
			//value = $(this).find('img').outerWidth() * -1); 
			
			//animate the image
			// you can change the sliding direction by changing bottom to left, right or top
			// if you changed this, you will have to change the position of the hover out as well
			jQuery(this).find('img').stop().animate({bottom: value} ,{duration:500, easing: 'swing'});	
			
		},
		function () {
			
			//reset the image
			// the position property (bottom), it must be same with the on in the mouseover
			jQuery(this).find('img').stop().animate({bottom:0} ,{duration:500, easing: 'swing'});	
		
		});	
	}
	/* -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		C A L L B A C K
	-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- */
	jQuery(function(){
		k_menu();
		hoverimage();
		buttondata();
		sys_toggle();
		atp_sociables();
		atp_pricingtable();
		jQuery("ul.tabs").tabs(".panes > .tab_content", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
		jQuery("#tabs1").tabs();
		jQuery(".minithumb, .gallery, .gallery-item, .port_img, .postimg, .imgborder, .fancyimage, .lightbox,").preloadify({force_icon:"true", mode:"sequence" });
		
		//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
		//Vertical Sliding
		jQuery('.tsbox').hover(function(){
			jQuery(".plan_info", this).fadeOut(500);
		}, function() {
			jQuery(".plan_info", this).fadeIn(500);
		});

		// scroll body to 0px on click
		jQuery('.back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});

	});
