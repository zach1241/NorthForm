/**
 * NORTH/FORM — mobile navigation.
 * Uses the native dialog top layer for focus management and background isolation.
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.querySelector('.menu-toggle');
    var dialog = document.querySelector('.mobile-nav-drawer');
    var dialogClose = dialog ? dialog.querySelector('.menu-toggle--dialog-close') : null;
    var previouslyFocused = null;

    if (!toggle || !dialog || typeof dialog.showModal !== 'function') {
      document.documentElement.classList.add('dialog-unsupported');
      return;
    }

    function setToggleState(isOpen) {
      toggle.setAttribute('aria-expanded', String(isOpen));
      toggle.setAttribute('aria-label', isOpen ? toggle.dataset.closeLabel : toggle.dataset.openLabel);
      document.body.classList.toggle('menu-open', isOpen);
    }

    function closeMenu() {
      if (dialog.open) dialog.close();
    }

    function openMenu() {
      previouslyFocused = document.activeElement;
      dialog.showModal();
      setToggleState(true);
      var firstLink = dialog.querySelector('a[href]');
      if (firstLink) firstLink.focus();
    }

    toggle.addEventListener('click', function () {
      if (dialog.open) closeMenu();
      else openMenu();
    });

    if (dialogClose) dialogClose.addEventListener('click', closeMenu);

    dialog.addEventListener('close', function () {
      setToggleState(false);
      if (previouslyFocused && typeof previouslyFocused.focus === 'function') {
        previouslyFocused.focus();
      }
      previouslyFocused = null;
    });

    dialog.addEventListener('click', function (event) {
      if (event.target === dialog) closeMenu();
    });

    dialog.querySelectorAll('a[href]').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth > 860 && dialog.open) closeMenu();
    }, { passive: true });
  });
})();
