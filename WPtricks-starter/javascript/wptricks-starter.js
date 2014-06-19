document.createElement('header');
document.createElement('footer');
document.createElement('section');
document.createElement('article');
document.createElement('aside');
document.createElement('nav');

jQuery(document).ready(function($) {
	
	/*
	 *	WE'RE ADDING A SCROLLTO FUNCTION WHICH,
	 *	SCROLLS TO AN INNER DIV CURRENTLY LOCATED IN THE DOM.
	 *	** NOTE: NOT ACTIVE ON ANY .LIGHTBOX ELEMENT!
	 */
	  $('a[href^=#]:not(.noscroll)').click(function() {
		  var target = $(this.hash);
		  if (target.length) {
				$('html,body').animate({
				  scrollTop: target.offset().top - 50
				}, 'slow');
			return false;
		  }
	  });
	  
	/*
	 *	JQUERY.MAGNIFIC-POPUP.JS,
	 *	USING A CALLBACK TO ADD A CLASS THAT'LL ANIMATE IN EACH POPUP WITH CSS.
	 */
	$("a[href$='.jpg'],a[href$='.png'],a[href$='.gif']").magnificPopup({
		type: 'image',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			midClick: true,
			removalDelay: 500, //delay removal by X to allow out-animation
			  callbacks: {
				beforeOpen: function() {
				   this.st.mainClass = 'mfp-3d-unfold';
				}
			  },
		});
		
	$('.main-search').hover(function(){
			$('.main-search .search-filters').toggleClass('show');
		});
		 
	$(window).load(function(){
		 //TOOLTIPS
		$('*[title*=" "]:not(h1 a, article footer a, #wp-toolbar a)').tooltipster({
		   animation: 'grow',
		   contentAsHTML: true,
		   maxWidth: 350,
		   delay: 200,
		   speed: 200
		});
	});
	
	
	
});


