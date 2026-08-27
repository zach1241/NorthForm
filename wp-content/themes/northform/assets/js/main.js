/** NORTH/FORM — coordinated progressive motion and interactions. */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var header = document.querySelector('.site-header');
    var revealItems = Array.prototype.slice.call(document.querySelectorAll('.reveal'));
    var motionSections = Array.prototype.slice.call(document.querySelectorAll('.nf-hero, .nf-opener, .nf-portrait-study, .nf-datum, .nf-manifesto'));
    var activeSections = new Set();
    var frameRequested = false;

    initBackToTop(reducedMotion);

    if (reducedMotion || !('IntersectionObserver' in window)) {
      revealItems.forEach(function (item) { item.classList.add('is-revealed'); });
      if (header) header.classList.toggle('site-header--scrolled', window.scrollY > 40);
      return;
    }

    document.documentElement.classList.add('motion-ready');
    initRevealObserver(revealItems);
    initActivityObserver(motionSections, activeSections, requestFrame);
    window.addEventListener('scroll', requestFrame, { passive: true });
    window.addEventListener('resize', requestFrame, { passive: true });
    requestFrame();

    function requestFrame() {
      if (frameRequested) return;
      frameRequested = true;
      window.requestAnimationFrame(updateMotion);
    }

    function updateMotion() {
      var viewportHeight = window.innerHeight || 1;
      if (header) header.classList.toggle('site-header--scrolled', window.scrollY > 40);

      activeSections.forEach(function (section) {
        var rect = section.getBoundingClientRect();
        var progress = clamp((viewportHeight - rect.top) / (viewportHeight + rect.height), 0, 1);
        var centered = progress - 0.5;

        if (section.classList.contains('nf-hero')) {
          var heroProgress = clamp(-rect.top / Math.max(rect.height, 1), 0, 1);
          section.style.setProperty('--hero-photo-y', heroProgress * 2.8 + '%');
          section.style.setProperty('--hero-mass-y', heroProgress * -2.2 + '%');
          section.style.setProperty('--hero-plane-y', heroProgress * -1.4 + 'vh');
          section.style.setProperty('--hero-title-a', heroProgress * -1.1 + 'vh');
          section.style.setProperty('--hero-title-b', heroProgress * -1.8 + 'vh');
          section.style.setProperty('--hero-title-c', heroProgress * -2.5 + 'vh');
          section.style.setProperty('--hero-meta-y', heroProgress * -0.7 + 'vh');
          window.dispatchEvent(new CustomEvent('northform:motionframe', { detail: { heroProgress: heroProgress } }));
        } else {
          section.style.setProperty('--section-depth', centered.toFixed(4));
          section.style.setProperty('--media-shift', centered * 6 + '%');
          section.style.setProperty('--detail-shift', centered * -3.9 + '%');
          section.style.setProperty('--datum-x', centered * -2.5 + '%');
          section.style.setProperty('--type-depth-y', centered * -1.5 + 'rem');
          section.style.setProperty('--image-depth-y', centered * 2.5 + 'rem');
        }
      });

      frameRequested = false;
    }
  });

  function initRevealObserver(items) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-revealed');
          var opener = entry.target.closest('.nf-opener');
          if (opener) opener.classList.add('has-entered');
          observer.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
    items.forEach(function (item) { observer.observe(item); });
  }

  function initActivityObserver(sections, activeSections, requestFrame) {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) activeSections.add(entry.target);
        else activeSections.delete(entry.target);
      });
      requestFrame();
    }, { rootMargin: '35% 0px 35% 0px', threshold: 0 });
    sections.forEach(function (section) { observer.observe(section); });
  }

  function initBackToTop(reducedMotion) {
    var button = document.querySelector('.back-to-top');
    if (!button) return;
    button.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: reducedMotion ? 'auto' : 'smooth' });
    });
  }

  function clamp(value, min, max) {
    return Math.min(Math.max(value, min), max);
  }
})();
