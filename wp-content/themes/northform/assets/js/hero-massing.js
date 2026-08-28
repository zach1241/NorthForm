/** NORTH/FORM — restrained pointer depth for the hero architectural plane. */
(function () {
  'use strict';

  var mount = document.querySelector('[data-hero-massing]');
  var hero = mount && mount.closest('.nf-hero');
  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!mount || !hero || reducedMotion) return;

  var targetX = 0;
  var targetY = 0;
  var currentX = 0;
  var currentY = 0;
  var frameRequested = false;

  function requestFrame() {
    if (frameRequested) return;
    frameRequested = true;
    window.requestAnimationFrame(update);
  }

  function update() {
    currentX += (targetX - currentX) * 0.08;
    currentY += (targetY - currentY) * 0.08;
    mount.style.setProperty('--model-x', currentX.toFixed(2) + 'px');
    mount.style.setProperty('--model-y', currentY.toFixed(2) + 'px');
    frameRequested = false;

    if (Math.abs(targetX - currentX) > 0.05 || Math.abs(targetY - currentY) > 0.05) {
      requestFrame();
    }
  }

  hero.addEventListener('pointermove', function (event) {
    targetX = (event.clientX / window.innerWidth - 0.5) * 28;
    targetY = (event.clientY / window.innerHeight - 0.5) * 16;
    requestFrame();
  }, { passive: true });

  hero.addEventListener('pointerleave', function () {
    targetX = 0;
    targetY = 0;
    requestFrame();
  }, { passive: true });
})();
