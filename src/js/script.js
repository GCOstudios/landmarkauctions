jQuery(function ($) {
  "use strict";

  var ENHANCEMENTS;
  var FETCHAPI;

  // ================================
  // Enhancements
  // ================================
  FETCHAPI = {
    init: function () {
      // this.fetchProperty();
      // this.fetchAll();
    },

    fetchProperty: async function () {
      // let propertyId = '181332';
      // const response = await fetch(`https://ams-services.eigroup.co.uk/data/lot/getlot/${propertyId}`, {
      //   headers: {
      //     'Authorization': 'Basic am9ubnlfZGlnaXRhbEBob3RtYWlsLmNvLnVrOlN1bnNoMW5lIQ==',
      //     'Content-Type': 'application/json',
      //   },
      //   mode: 'no-cors',
      // });
      // console.log(response);
    },

    fetchAll: async function () {
      const url = 'https://ams-services.eigroup.co.uk/data/auction/gettimedauctions';
      const credentials = btoa("jonny_digital@hotmail.co.uk:Sunsh1ne!")
      const auth = `Basic ${credentials}`;

      try {
        const response = await fetch(
          url,
          {
            method: "GET",
            headers: {
              "Content-Type": "application/json",
              Authorization: auth,
            },
            mode: "cors",
          }
        );

        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
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
