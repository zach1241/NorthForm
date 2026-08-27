/**
 * NORTH/FORM hero massing enhancement.
 * The page remains complete without this file, WebGL, or the remote module.
 */
(function () {
  'use strict';

  var mount = document.querySelector('[data-hero-3d]');
  var hero = mount && mount.closest('.hero-v2');
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!mount || !hero || reduceMotion || !window.WebGLRenderingContext) return;

  function loadMassing() {
    import('https://cdn.jsdelivr.net/npm/three@0.180.0/build/three.module.min.js')
      .then(initMassing)
      .catch(function () {
        /* The intentionally complete CSS massing remains visible. */
      });
  }

  if ('requestIdleCallback' in window) {
    window.requestIdleCallback(loadMassing, { timeout: 1800 });
  } else {
    window.setTimeout(loadMassing, 700);
  }

  function initMassing(THREE) {
    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera(32, 1, 0.1, 100);
    var renderer;

    try {
      renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true, powerPreference: 'high-performance' });
    } catch (error) {
      return;
    }

    renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.5));
    renderer.outputColorSpace = THREE.SRGBColorSpace;
    renderer.setClearColor(0x000000, 0);
    mount.appendChild(renderer.domElement);

    var massing = new THREE.Group();
    var concrete = new THREE.MeshStandardMaterial({ color: 0x4d4b46, roughness: 0.92, metalness: 0.02 });
    var darkConcrete = new THREE.MeshStandardMaterial({ color: 0x1b1b1a, roughness: 0.86, metalness: 0.04 });
    var orange = new THREE.MeshStandardMaterial({ color: 0xb65c32, roughness: 0.78, metalness: 0.02 });

    function volume(size, position, material) {
      var mesh = new THREE.Mesh(new THREE.BoxGeometry(size[0], size[1], size[2]), material);
      mesh.position.set(position[0], position[1], position[2]);
      massing.add(mesh);
    }

    volume([5.8, 1.45, 2.1], [0.2, 0.5, 0], concrete);
    volume([3.1, 1.9, 2.8], [1.05, -1.1, -0.2], darkConcrete);
    volume([1.65, 4.25, 1.65], [-1.9, -0.75, 0.15], concrete);
    volume([2.7, 0.75, 3.45], [2.15, 1.45, -0.55], darkConcrete);
    volume([0.12, 1.8, 1.9], [2.72, 0.38, 1.04], orange);
    scene.add(massing);

    scene.add(new THREE.HemisphereLight(0xf1efe9, 0x171717, 2.1));
    var key = new THREE.DirectionalLight(0xfff3df, 3.2);
    key.position.set(-4, 7, 6);
    scene.add(key);
    var rim = new THREE.DirectionalLight(0xb65c32, 0.65);
    rim.position.set(5, 1, -2);
    scene.add(rim);

    camera.position.set(0, 0.1, 12.5);
    massing.rotation.set(-0.1, -0.42, -0.06);

    var targetX = 0;
    var targetY = 0;
    var pointerX = 0;
    var pointerY = 0;
    var scrollProgress = 0;
    var running = false;

    function resize() {
      var rect = mount.getBoundingClientRect();
      if (!rect.width || !rect.height) return;
      camera.aspect = rect.width / rect.height;
      camera.updateProjectionMatrix();
      renderer.setSize(rect.width, rect.height, false);
    }

    function onPointerMove(event) {
      pointerX = (event.clientX / window.innerWidth - 0.5) * 0.12;
      pointerY = (event.clientY / window.innerHeight - 0.5) * 0.08;
    }

    function onScroll() {
      scrollProgress = Math.min(window.scrollY / Math.max(hero.offsetHeight, 1), 1);
    }

    function render() {
      if (!running) return;
      targetX += (pointerY - targetX) * 0.035;
      targetY += (pointerX - targetY) * 0.035;
      massing.rotation.x = -0.1 + targetX + scrollProgress * 0.08;
      massing.rotation.y = -0.42 + targetY + scrollProgress * 0.16;
      massing.position.y = scrollProgress * 0.3;
      renderer.render(scene, camera);
      window.requestAnimationFrame(render);
    }

    var visibilityObserver = new IntersectionObserver(function (entries) {
      running = entries[0].isIntersecting;
      if (running) render();
    }, { threshold: 0 });

    resize();
    onScroll();
    window.addEventListener('resize', resize, { passive: true });
    window.addEventListener('pointermove', onPointerMove, { passive: true });
    window.addEventListener('scroll', onScroll, { passive: true });
    visibilityObserver.observe(hero);
    hero.classList.add('is-webgl-ready');
    renderer.render(scene, camera);
  }
})();
