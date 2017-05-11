// Avoid `console` errors in browsers that lack a console.
(function($) {
  var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}(jQuery));

// Place any jQuery/helper plugins in here.
;(function($){

	/* -----------------------------------------------------------------*/
	/* Off Canvas Navigation
	/* -----------------------------------------------------------------*/
  var controller = new slidebars();
  controller.init();
  $( '.mobile-menu-toggle, .sb-close' ).on( 'click', function ( event ) {
    // Stop default action and bubbling
    event.stopPropagation();
    event.preventDefault();

    // Toggle the Slidebar with id 'id-1'
    controller.toggle( 'id-3' );
  } );

  if (window.matchMedia("(max-width: 1019px)").matches) {
    var main_header_height = $('#main-header').outerHeight();
    $('.sb-slidebar').css({ 'top': main_header_height + 25 + 'px' });
  }

  /* ------------------------------------------------------*/
	/* Adding fitvid
	/* ------------------------------------------------------*/
	$('.page-wrapper').fitVids();

	/* -----------------------------------------------------------------*/
	/* Mobile Submenu Toggle
	/* -----------------------------------------------------------------*/
    $('.mobile-menu').find('.menu-item-has-children').children('a').on('click',function(e){
    	console.log($(this).next());
    	e.preventDefault();
	    $(this).next().slideToggle(300);
    });

	/* -----------------------------------------------------------------*/
	/* Activate accessible superfish
	/* -----------------------------------------------------------------*/
	$('#main-header').find('.menu').superfish({
		smoothHeight	: true,
		delay			: 600,                        // one second delay on mouseout
		animation		: {
			opacity :'show',
			height  :'show'
		},  										  // fade-in and slide-down animation
		speed			: 'fast',                     // faster animation speed
		autoArrows		: false                       // disable generation of arrow mark-up
	});

	/* -----------------------------------------------------------------*/
	/* Remove width and height attributes from any image
	/* -----------------------------------------------------------------*/
	$('img').removeAttr('width').removeAttr('height');

  /* -----------------------------------------------------------------*/
	/* matchHeight
	/* -----------------------------------------------------------------*/
  $('.two-column-whistles .plain-whistle,.more-articles.type-1 .related-article-container').matchHeight();

  /* -----------------------------------------------------------------*/
	/* Slick Carousel
	/* -----------------------------------------------------------------*/
  $('.slick-carousel').slick();

  /* -----------------------------------------------------------------*/
  /* Waypoints
  /* -----------------------------------------------------------------*/
  if( $( "#main-header" ).hasClass( "logo-with-menu" ) ){
    var sticky = new Waypoint.Sticky({
      element: $('.logo-with-menu')[0]
    });
  }

})(jQuery);
