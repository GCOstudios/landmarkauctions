jQuery(function ($) {
  "use strict";

  var ENHANCEMENTS;
  var FETCHAPI;

  // ================================
  // Enhancements
  // ================================
  FETCHAPI = {
    init: function () {
      this.slider();
    },

    slider: function () {
      $('.property-main').slick({
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.property-thumb'
      });
      $('.property-thumb').slick({
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.property-main',
        arrows: false,
        dots: false,
        focusOnSelect: true,
        centerMode: true
      });
    }
  };

  // ================================
  // Enhancements
  // ================================

  ENHANCEMENTS = {
    init: function () {
      this.animations();
    },

    // AOS animations
    // ==============================================
    animations: function () {
      // media query event handler
      if (matchMedia) {
        var mq = window.matchMedia("(min-width: 600px)");

        mq.addListener(WidthChange);
        WidthChange(mq);
      }

      // media query change
      function WidthChange(mq) {
        if (mq.matches) {
          // window width is at least 600px
          $(".fade-up").attr("data-aos", "fade-up");
          $(".fade-right").attr("data-aos", "fade-right");
          $(".fade-down").attr("data-aos", "fade-down");
          $(".fade-left").attr("data-aos", "fade-left");
          $(".fade-in").attr("data-aos", "fade-in");

          $(".box-item").each(function (index) {
            var $this = $(this);
            $this
              .attr("data-aos", "fade-up")
              .attr("data-aos-delay", (index + 1) * 4 + "00");
          });

          $(".box-item-up").each(function (index) {
            var $this = $(this);
            $this
              .attr("data-aos", "fade-up")
              .attr("data-aos-delay", (index + 1) * 4 + "00");
          });
        } else {
          // window width is less than 600px
        }
      }

      setTimeout(function () {
        AOS.init({
          offset: 200,
          duration: 800,
          delay: 100,
        });
      }, 300);
    },
  };

  FETCHAPI.init();
  ENHANCEMENTS.init();
}); //jQuery
