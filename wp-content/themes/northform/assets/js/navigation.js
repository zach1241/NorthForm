/**
 * NORTH/FORM — Accessible Navigation Controller
 * 
 * Handles:
 * - Mobile navigation drawer toggle
 * - ARIA state synchronization (aria-expanded, aria-hidden)
 * - Keyboard accessibility (ESC to close, focus trapping)
 * - Body scroll lock
 */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', initNavigation);

  function initNavigation() {
    var toggleBtn = document.querySelector('.menu-toggle');
    var drawer = document.querySelector('.mobile-nav-drawer');

    if (!toggleBtn || !drawer) {
      return;
    }

    var focusableSelectors = 'a[href], button:not([disabled]), input:not([disabled]), [tabindex]:not([tabindex="-1"])';
    var focusableElements = [];
    var firstFocusable = null;
    var lastFocusable = null;

    function updateFocusables() {
      focusableElements = Array.prototype.slice.call(drawer.querySelectorAll(focusableSelectors));
      firstFocusable = focusableElements[0];
      lastFocusable = focusableElements[focusableElements.length - 1];
    }

    function openMenu() {
      toggleBtn.setAttribute('aria-expanded', 'true');
      toggleBtn.setAttribute('aria-label', 'Close menu');
      drawer.classList.add('is-open');
      drawer.setAttribute('aria-hidden', 'false');
      document.body.classList.add('menu-open');

      updateFocusables();
      if (firstFocusable) {
        setTimeout(function () {
          firstFocusable.focus();
        }, 100);
      }

      document.addEventListener('keydown', handleKeyDown);
    }

    function closeMenu() {
      toggleBtn.setAttribute('aria-expanded', 'false');
      toggleBtn.setAttribute('aria-label', 'Open menu');
      drawer.classList.remove('is-open');
      drawer.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('menu-open');

      document.removeEventListener('keydown', handleKeyDown);
      toggleBtn.focus();
    }

    function toggleMenu() {
      var isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
      if (isExpanded) {
        closeMenu();
      } else {
        openMenu();
      }
    }

    function handleKeyDown(e) {
      // Escape key closes menu
      if (e.key === 'Escape' || e.keyCode === 27) {
        closeMenu();
        return;
      }

      // Trap Tab focus inside open drawer
      if (e.key === 'Tab' || e.keyCode === 9) {
        updateFocusables();
        if (focusableElements.length === 0) return;

        if (e.shiftKey) {
          // Shift + Tab: if on first element, wrap to last
          if (document.activeElement === firstFocusable) {
            e.preventDefault();
            lastFocusable.focus();
          }
        } else {
          // Tab: if on last element, wrap to first
          if (document.activeElement === lastFocusable) {
            e.preventDefault();
            firstFocusable.focus();
          }
        }
      }
    }

    toggleBtn.addEventListener('click', function (e) {
      e.preventDefault();
      toggleMenu();
    });

    // Close drawer when a nav link inside drawer is clicked
    var drawerLinks = drawer.querySelectorAll('a');
    for (var i = 0; i < drawerLinks.length; i++) {
      drawerLinks[i].addEventListener('click', function () {
        if (drawer.classList.contains('is-open')) {
          closeMenu();
        }
      });
    }

    // Reset when resizing past mobile breakpoint
    window.addEventListener('resize', function () {
      if (window.innerWidth > 860 && drawer.classList.contains('is-open')) {
        closeMenu();
      }
    }, { passive: true });
  }
})();
