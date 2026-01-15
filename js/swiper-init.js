/**
 * @file
 * Global UniUD Swiper Formatter behaviors.
 */

(function (drupalSettings, once) {
  'use strict';

  /**
   * Behavior to initialize the Swiper slider.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.uniudSwiperInit = {
    attach: function (context) {
      // Find the swiper container using the once() library to ensure
      // it is initialized only once per page load.
      const elements = once('uniud-swiper-formatter-init', '.swiper', context);

      elements.forEach(function (el) {
        // Retrieve settings passed from the PHP formatter.
        const config = drupalSettings.uniud_swiper_formatter || {};

        // Initialize Swiper with combined default and custom settings.
        const swiper = new Swiper(el, {
          // Effect settings (slide, fade, cube, coverflow, flip).
          effect: config.effect || 'slide',

          // Transition speed in milliseconds.
          speed: config.speed || 300,

          // Loop behavior.
          loop: config.loop || false,

          // Autoplay settings.
          autoplay: config.autoplay ? {
            delay: config.autoplay.delay || 3000,
            disableOnInteraction: false,
          } : FALSE,

          // UI Elements.
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });
      });
    }
  };

})(drupalSettings, once);