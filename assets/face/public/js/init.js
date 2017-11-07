( function( window ) {
  'use strict';

  //
  // Preloader
  //____________________________________________________________________________________
  jQuery(window).load(function() {
    jQuery(".loader").fadeOut();
    jQuery(".pre-loader").delay(1000).fadeOut("slow");
  });

  //
  // On Scroll Sticky Header
  //____________________________________________________________________________________
  function init() {
    window.addEventListener('scroll', function(){
      var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        shrinkOn = 100,
        header = document.querySelector(".navbar");
      if (distanceY > shrinkOn) {
        classie.add(header,"smaller");
      } else {
        if (classie.has(header,"smaller")) {
          classie.remove(header,"smaller");
        }
      }
    });
  }
  window.onload = init();

  //
  // On Scroll Animation
  //____________________________________________________________________________________
  var wow = new WOW(
    {
      boxClass:     'kefim',       // distance to the element when triggering the animation (default is 0)
      mobile:       false       // trigger animations on mobile devices (default is true)
    }
  );
  wow.init();

  //
  // Menu Triggr
  //____________________________________________________________________________________
  var body        = $('body'),
    menuTrigger = $('.menu-trigger-btn');

  menuTrigger.on( 'click', function( e ) {
    e.preventDefault();
    body.toggleClass('xf-show');
  });

  //
  // ScrollSpy
  //____________________________________________________________________________________
  body.scrollspy({
    target  : '.menu-wrapper',
    offset  : 70
  });

  //
  // Smooth Scroller
  //____________________________________________________________________________________
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 500);
        return false;
      }
    }
  });

  //
  // Screenshots
  //____________________________________________________________________________________
  var screenshots = $('.screenshot');

  screenshots.owlCarousel({
    loop            : true,
    margin          : 30,
    responsiveClass : true,
    navText         : ['<i class="ion-ios-arrow-left"></i>','<i class="ion-ios-arrow-right"></i>'],
    responsive:{
      0:{
        items:1,
        nav:true,
        margin: 0
      },
      600:{
        items:3,
        nav:false
      },
      1000:{
        items:4,
        nav:true,
        loop:false
      }
    }
  });

  //
  // MagnificPopup;
  //____________________________________________________________________________________
  screenshots.magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1]
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return item.el.attr('title');
      }
    }
  });

  //
  // Testimonial
  //____________________________________________________________________________________
  $('.testimonial').owlCarousel({
    loop          : true,
    items         : 1,
    margin        : 10,
    nav           : false
  });

  //
  // Play Button
  //____________________________________________________________________________________
  $('.play-btn').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });

  //
  // Subscribe (mailchimp)
  //____________________________________________________________________________________
  var mailSubscribe   = $('.subscribe');

  mailSubscribe.ajaxChimp({
    callback: mailchimpCallback,
    url: "http://frontpixels.us11.list-manage.com/subscribe/post?u=8ed724b6f4db710960cbc2439&amp;id=26648b74c9" // Just paste your mailchimp list url inside the "".

  });

  function mailchimpCallback(resp) {

    var successMessage    = $('.subscribe-success'),
      errorMessage      = $('.subscribe-error'),
      successIcon       = '<i class="ion-ios-checkmark"></i>',
      errorIcon         = '<i class="ion-ios-close"></i>';

    if (resp.result === 'success') {
      successMessage.html(successIcon + resp.msg).fadeIn(1000);
      errorMessage.fadeOut(300);

    } else if(resp.result === 'error') {
      errorMessage.html(errorIcon + resp.msg).fadeIn(1000);
    }

  }

  //
  // Fan Fact
  //____________________________________________________________________________________
  $('.fact-count').counterUp({
    delay : 10,
    time  : 1000
  });

  //
  // Contact
  //____________________________________________________________________________________
  var contact       = $('.contact-form'),
    successMessage  = $('.contact-success'),
    errorMessage    = $('.contact-error');

  contact.validate({

    rules: {
      name: {
        required: true,
        minlength: 2
      },
      email: {
        required: true,
        email: true
      },
      message: {
        required: true
      }
    },

    messages: {
      name: {
        required: "Come on! Enter your name",
        minlength: "your name must consist of at least 2 characters"
      },
      email: {
        required: "no email, no message"
      },
      message: {
        required: "You have to write something to send this form.",
        minlength: "thats all? really?"
      }
    },

    submitHandler: function(form) {
      $(form).ajaxSubmit({
        type:"POST",
        data: $(form).serialize(),
        url:"php/contact.php",
        success: function() {
          successMessage.fadeIn();
        },
        error: function() {
          contact.fadeTo( "slow", 0.15, function() {
            errorMessage.fadeIn();
          });
        }
      });
    }
  });

})( window );