/** NORTH/FORM — lightweight progressive enhancements. */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    initHeaderScroll();
    initScrollReveals();
    initBackToTop();
  });

  function initHeaderScroll() {
    var header = document.querySelector('.site-header');
    var ticking = false;
    if (!header) return;

    function updateHeader() {
      header.classList.toggle('site-header--scrolled', window.scrollY > 40);
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(updateHeader);
        ticking = true;
      }
    }, { passive: true });
    updateHeader();
  }

  function initScrollReveals() {
    var elements = document.querySelectorAll('.reveal');
    if (!elements.length) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
      elements.forEach(function (element) {
        element.classList.add('is-revealed');
      });
      return;
    }

    document.documentElement.classList.add('reveal-ready');

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-revealed');
          observer.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -60px 0px', threshold: 0.1 });

    elements.forEach(function (element) {
      observer.observe(element);
    });
  }

  function initBackToTop() {
    var button = document.querySelector('.back-to-top');
    if (!button) return;

    button.addEventListener('click', function () {
      window.scrollTo({
        top: 0,
        behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'
      });
    });
  }
})();
