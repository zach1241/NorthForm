/**
 * NORTH/FORM — Immersive Interactions & Progressive Enhancement
 *
 * Vanilla JavaScript implementation preserving accessibility, reduced-motion,
 * and semantic resilience. Uses a unified RAF scroll engine, IntersectionObserver
 * for progressive reveals, and lazy-loads the 3D architectural interlude.
 */
(function () {
  'use strict';

  var isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var isFinePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  var interlude3DController = null;

  document.addEventListener('DOMContentLoaded', function () {
    initHeaderScroll();
    initScrollReveals();
    initUnifiedScrollEngine();
    initProjectInteractions();
    initServiceHoverPreview();
    initContextualCursor();
    initLazyInterlude3D();
    initBackToTop();
  });

  /**
   * 1. Header scroll state management.
   */
  function initHeaderScroll() {
    var header = document.querySelector('.site-header');
    if (!header) return;

    var isScrolled = false;

    function updateHeader() {
      var scrolled = window.scrollY > 40;
      if (scrolled !== isScrolled) {
        isScrolled = scrolled;
        header.classList.toggle('site-header--scrolled', isScrolled);
      }
    }

    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader();
  }

  /**
   * 2. Progressive scroll reveals for content and masked image frames.
   */
  function initScrollReveals() {
    var revealElements = document.querySelectorAll('.reveal');
    var imageRevealElements = document.querySelectorAll('.image-reveal');
    var allElements = document.querySelectorAll('.reveal, .image-reveal');

    if (!allElements.length) return;

    // Reduced motion or missing IntersectionObserver fallback
    if (isReducedMotion || !('IntersectionObserver' in window)) {
      allElements.forEach(function (el) {
        el.classList.add('is-revealed');
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
    }, { rootMargin: '0px 0px -50px 0px', threshold: 0.08 });

    allElements.forEach(function (el) {
      observer.observe(el);
    });
  }

  /**
   * 3. Unified RAF Scroll Engine (Hero depth, Image Parallax, Statement Typography).
   */
  function initUnifiedScrollEngine() {
    if (isReducedMotion) return;

    // Elements
    var heroTitle = document.querySelector('#hero-title');
    var heroEyebrow = document.querySelector('.hero-eyebrow');
    var heroMeta = document.querySelector('.hero-meta-row');
    var featuredParallaxImg = document.querySelector('.featured-media__img.parallax-img');
    var featuredMediaSection = document.querySelector('.featured-image-section');
    var statementSection = document.querySelector('#studio');
    var statementLines = document.querySelectorAll('.statement-line');
    var interludeSection = document.querySelector('#interlude-3d');

    var isTicking = false;

    function onScrollFrame() {
      var scrollY = window.scrollY;
      var windowH = window.innerHeight;
      var isDesktop = window.innerWidth >= 768;

      // A. Hero Depth Separation (Initial scroll range)
      if (scrollY < windowH * 1.2) {
        if (isDesktop) {
          if (heroTitle) heroTitle.style.transform = 'translateY(' + (scrollY * 0.12).toFixed(2) + 'px)';
          if (heroEyebrow) heroEyebrow.style.transform = 'translateY(' + (scrollY * 0.05).toFixed(2) + 'px)';
          if (heroMeta) heroMeta.style.transform = 'translateY(' + (scrollY * 0.04).toFixed(2) + 'px)';
        }
      }

      // B. Primary Featured Image Controlled Parallax
      if (featuredMediaSection && featuredParallaxImg) {
        var rect = featuredMediaSection.getBoundingClientRect();
        if (rect.top < windowH && rect.bottom > 0) {
          var progress = (windowH - rect.top) / (windowH + rect.height);
          var shift = ((progress - 0.5) * 8).toFixed(2);
          featuredParallaxImg.style.transform = 'translateY(' + shift + '%)';
        }
      }

      // C. Studio Statement Typography Opposing Line Movement
      if (statementSection && statementLines.length && isDesktop) {
        var stmtRect = statementSection.getBoundingClientRect();
        if (stmtRect.top < windowH && stmtRect.bottom > 0) {
          var stmtProgress = (windowH - stmtRect.top) / (windowH + stmtRect.height);
          var offset = (stmtProgress - 0.5) * 36;

          statementLines.forEach(function (line) {
            if (line.classList.contains('statement-line--1') || line.classList.contains('statement-line--3')) {
              line.style.transform = 'translateX(' + (-offset).toFixed(2) + 'px)';
            } else if (line.classList.contains('statement-line--2') || line.classList.contains('statement-line--4')) {
              line.style.transform = 'translateX(' + (offset).toFixed(2) + 'px)';
            }
          });
        }
      }

      // D. 3D Interlude Scroll Progress Update
      if (interludeSection && interlude3DController) {
        var interludeRect = interludeSection.getBoundingClientRect();
        if (interludeRect.top < windowH && interludeRect.bottom > 0) {
          var interludeProgress = (windowH - interludeRect.top) / (windowH + interludeRect.height);
          interlude3DController.updateScrollProgress(interludeProgress);
        }
      }

      isTicking = false;
    }

    function requestScrollUpdate() {
      if (!isTicking) {
        window.requestAnimationFrame(onScrollFrame);
        isTicking = true;
      }
    }

    window.addEventListener('scroll', requestScrollUpdate, { passive: true });
    requestScrollUpdate();
  }

  /**
   * 4. Tactile Pointer Interactions for Selected Projects.
   */
  function initProjectInteractions() {
    if (!isFinePointer || isReducedMotion) return;

    var projectItems = document.querySelectorAll('.project-item');

    projectItems.forEach(function (card) {
      var media = card.querySelector('.project-item__media');
      var img = card.querySelector('.project-item__img');
      if (!media || !img) return;

      var targetX = 0;
      var targetY = 0;
      var isHovered = false;

      card.addEventListener('pointermove', function (e) {
        var rect = media.getBoundingClientRect();
        var normX = ((e.clientX - rect.left) / rect.width) - 0.5;
        var normY = ((e.clientY - rect.top) / rect.height) - 0.5;

        targetX = normX * 8;
        targetY = normY * 8;

        if (isHovered) {
          img.style.transform = 'scale(1.035) translate(' + targetX.toFixed(2) + 'px, ' + targetY.toFixed(2) + 'px)';
        }
      }, { passive: true });

      card.addEventListener('pointerenter', function () {
        isHovered = true;
      });

      card.addEventListener('pointerleave', function () {
        isHovered = false;
        img.style.transform = '';
      });
    });
  }

  /**
   * 5. Services Desktop Hover Feedback & Floating Decorative Preview.
   */
  function initServiceHoverPreview() {
    if (!isFinePointer || isReducedMotion) return;

    var floatingPreview = document.querySelector('.services-floating-preview');
    var previewImg = floatingPreview ? floatingPreview.querySelector('.services-floating-preview__img') : null;
    var serviceRows = document.querySelectorAll('.service-row');

    if (!floatingPreview || !previewImg || !serviceRows.length) return;

    var mouseX = 0;
    var mouseY = 0;
    var currentX = 0;
    var currentY = 0;
    var isPreviewActive = false;
    var animFrame = null;

    function lerpPreview() {
      if (isPreviewActive) {
        currentX += (mouseX - currentX) * 0.15;
        currentY += (mouseY - currentY) * 0.15;
        floatingPreview.style.left = currentX.toFixed(2) + 'px';
        floatingPreview.style.top = currentY.toFixed(2) + 'px';
        animFrame = requestAnimationFrame(lerpPreview);
      }
    }

    serviceRows.forEach(function (row) {
      var imgUrl = row.dataset.serviceImage;
      var imgAlt = row.dataset.serviceAlt || '';

      row.addEventListener('pointerenter', function (e) {
        if (imgUrl) {
          previewImg.src = imgUrl;
          previewImg.alt = imgAlt;
          mouseX = e.clientX + 24;
          mouseY = e.clientY + 16;
          currentX = mouseX;
          currentY = mouseY;
          floatingPreview.style.left = currentX + 'px';
          floatingPreview.style.top = currentY + 'px';
          floatingPreview.classList.add('is-active');
          isPreviewActive = true;
          if (!animFrame) animFrame = requestAnimationFrame(lerpPreview);
        }
      });

      row.addEventListener('pointermove', function (e) {
        mouseX = e.clientX + 24;
        mouseY = e.clientY + 16;
      }, { passive: true });

      row.addEventListener('pointerleave', function () {
        floatingPreview.classList.remove('is-active');
        isPreviewActive = false;
        if (animFrame) {
          cancelAnimationFrame(animFrame);
          animFrame = null;
        }
      });
    });
  }

  /**
   * 6. Contextual Project Cursor for Desktop Pointer Devices.
   */
  function initContextualCursor() {
    if (!isFinePointer || isReducedMotion) return;

    var cursor = document.querySelector('#project-cursor');
    var projectMediaElements = document.querySelectorAll('.project-item__media');

    if (!cursor || !projectMediaElements.length) return;

    var targetX = 0;
    var targetY = 0;
    var currentX = 0;
    var currentY = 0;
    var isCursorActive = false;
    var animId = null;

    function lerpCursor() {
      if (isCursorActive) {
        currentX += (targetX - currentX) * 0.2;
        currentY += (targetY - currentY) * 0.2;
        cursor.style.left = currentX.toFixed(2) + 'px';
        cursor.style.top = currentY.toFixed(2) + 'px';
        animId = requestAnimationFrame(lerpCursor);
      }
    }

    projectMediaElements.forEach(function (media) {
      media.addEventListener('pointerenter', function (e) {
        targetX = e.clientX;
        targetY = e.clientY;
        currentX = targetX;
        currentY = targetY;
        cursor.style.left = currentX + 'px';
        cursor.style.top = currentY + 'px';
        cursor.classList.add('is-active');
        isCursorActive = true;
        if (!animId) animId = requestAnimationFrame(lerpCursor);
      });

      media.addEventListener('pointermove', function (e) {
        targetX = e.clientX;
        targetY = e.clientY;
      }, { passive: true });

      media.addEventListener('pointerleave', function () {
        cursor.classList.remove('is-active');
        isCursorActive = false;
        if (animId) {
          cancelAnimationFrame(animId);
          animId = null;
        }
      });
    });
  }

  /**
   * 7. Lazy-Load Three.js Architectural 3D Interlude.
   */
  function initLazyInterlude3D() {
    var interludeSection = document.querySelector('#interlude-3d');
    var canvasContainer = document.querySelector('#interlude-canvas-container');

    if (!interludeSection || !canvasContainer) return;

    var hasLoaded = false;

    function loadModule() {
      if (hasLoaded) return;
      hasLoaded = true;

      var baseUri = (window.northformData && window.northformData.themeUri) ? window.northformData.themeUri : '';
      var moduleUrl = baseUri + '/assets/js/interlude-3d.js';

      import(moduleUrl)
        .then(function (module) {
          if (module && typeof module.initInterlude3D === 'function') {
            interlude3DController = module.initInterlude3D(canvasContainer);
          }
        })
        .catch(function (err) {
          console.warn('NORTH/FORM: 3D interlude fallback active:', err);
        });
    }

    if (!('IntersectionObserver' in window)) {
      loadModule();
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          loadModule();
          observer.unobserve(entry.target);
        }
      });
    }, { rootMargin: '350px 0px', threshold: 0 });

    observer.observe(interludeSection);
  }

  /**
   * 8. Accessible Back to Top navigation.
   */
  function initBackToTop() {
    var button = document.querySelector('.back-to-top');
    if (!button) return;

    button.addEventListener('click', function () {
      window.scrollTo({
        top: 0,
        behavior: isReducedMotion ? 'auto' : 'smooth'
      });
    });
  }
})();
