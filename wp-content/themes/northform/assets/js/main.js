/**
 * NORTH/FORM — Core Interactions & Motion Controller
 * 
 * Minimal vanilla JavaScript.
 * Strictly respects prefers-reduced-motion.
 */

(function () {
  'use strict';

  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  document.addEventListener('DOMContentLoaded', function () {
    initHeaderScroll();
    initScrollReveals();
    initStatsCountUp();
    initServiceAccordion();
    initBackToTop();
  });

  /**
   * 1. Header scroll state
   */
  function initHeaderScroll() {
    var header = document.querySelector('.site-header');
    if (!header) return;

    var ticking = false;
    var threshold = 40;

    function updateHeader() {
      if (window.scrollY > threshold) {
        if (!header.classList.contains('site-header--scrolled')) {
          header.classList.add('site-header--scrolled');
        }
      } else {
        if (header.classList.contains('site-header--scrolled')) {
          header.classList.remove('site-header--scrolled');
        }
      }
      ticking = false;
    }

    window.addEventListener('scroll', function () {
      if (!ticking) {
        window.requestAnimationFrame(updateHeader);
        ticking = true;
      }
    }, { passive: true });

    // Initial check
    updateHeader();
  }

  /**
   * 2. IntersectionObserver for scroll reveals
   */
  function initScrollReveals() {
    var revealElements = document.querySelectorAll('.reveal');
    if (revealElements.length === 0) return;

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
      revealElements.forEach(function (el) {
        el.classList.add('is-revealed');
      });
      return;
    }

    var observer = new IntersectionObserver(function (entries, observerInstance) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-revealed');
          observerInstance.unobserve(entry.target);
        }
      });
    }, {
      rootMargin: '0px 0px -60px 0px',
      threshold: 0.1
    });

    revealElements.forEach(function (el) {
      observer.observe(el);
    });
  }

  /**
   * 3. Statistics reveal animation
   */
  function initStatsCountUp() {
    var statNumbers = document.querySelectorAll('.stat-item__number[data-stat-target]');
    if (statNumbers.length === 0) return;

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
      statNumbers.forEach(function (el) {
        var target = el.getAttribute('data-stat-target');
        var prefix = el.getAttribute('data-stat-prefix') || '';
        var suffix = el.getAttribute('data-stat-suffix') || '';
        el.textContent = prefix + target + suffix;
      });
      return;
    }

    var observer = new IntersectionObserver(function (entries, observerInstance) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var targetEl = entry.target;
          var targetVal = parseInt(targetEl.getAttribute('data-stat-target'), 10);
          var prefix = targetEl.getAttribute('data-stat-prefix') || '';
          var suffix = targetEl.getAttribute('data-stat-suffix') || '';
          var padZeros = targetEl.getAttribute('data-stat-pad') === 'true';

          animateCounter(targetEl, targetVal, prefix, suffix, padZeros);
          observerInstance.unobserve(targetEl);
        }
      });
    }, { threshold: 0.3 });

    statNumbers.forEach(function (el) {
      observer.observe(el);
    });
  }

  function animateCounter(element, target, prefix, suffix, padZeros) {
    var duration = 1200;
    var startTime = null;

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);
      // Ease out cubic
      var easeProgress = 1 - Math.pow(1 - progress, 3);
      var current = Math.floor(easeProgress * target);

      var formattedNum = current.toString();
      if (padZeros && current < 10) {
        formattedNum = '0' + formattedNum;
      }

      element.textContent = prefix + formattedNum + suffix;

      if (progress < 1) {
        window.requestAnimationFrame(step);
      } else {
        var finalFormatted = target.toString();
        if (padZeros && target < 10) {
          finalFormatted = '0' + finalFormatted;
        }
        element.textContent = prefix + finalFormatted + suffix;
      }
    }

    window.requestAnimationFrame(step);
  }

  /**
   * 4. Service list row keyboard interaction
   */
  function initServiceAccordion() {
    var rows = document.querySelectorAll('.service-row');
    rows.forEach(function (row) {
      var header = row.querySelector('.service-row__header');
      if (!header) return;

      header.setAttribute('tabindex', '0');
      header.setAttribute('role', 'button');
      header.setAttribute('aria-expanded', 'false');

      var details = row.querySelector('.service-row__details');
      if (details) {
        var id = 'service-details-' + Math.random().toString(36).substr(2, 9);
        details.id = id;
        header.setAttribute('aria-controls', id);
      }

      function toggle() {
        var expanded = header.getAttribute('aria-expanded') === 'true';
        header.setAttribute('aria-expanded', String(!expanded));
      }

      header.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          toggle();
        }
      });
    });
  }

  /**
   * 5. Back to top button
   */
  function initBackToTop() {
    var backToTopBtn = document.querySelector('.back-to-top');
    if (!backToTopBtn) return;

    backToTopBtn.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: prefersReducedMotion ? 'auto' : 'smooth'
      });
    });
  }
})();
