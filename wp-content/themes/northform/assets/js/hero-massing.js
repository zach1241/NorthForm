/** NORTH/FORM — optional hero architectural massing enhancement. */
(function () {
  'use strict';

  var mount = document.querySelector('[data-hero-massing]');
  var hero = mount && mount.closest('.nf-hero');
  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!mount || !hero || reducedMotion || !window.WebGLRenderingContext) return;

  function loadThree() {
    import('https://cdn.jsdelivr.net/npm/three@0.180.0/build/three.module.min.js')
      .then(createMassing)
      .catch(function () {
        /* The complete CSS massing remains visible on any failure. */
      });
  }

  if ('requestIdleCallback' in window) {
    window.requestIdleCallback(loadThree, { timeout: 1800 });
  } else {
    window.setTimeout(loadThree, 700);
  }

  function createMassing(THREE) {
    var renderer;
    try {
      renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true, powerPreference: 'high-performance' });
    } catch (error) {
      return;
    }

    var scene = new THREE.Scene();
    var camera = new THREE.PerspectiveCamera(30, 1, 0.1, 100);
    var group = new THREE.Group();
    var concrete = new THREE.MeshStandardMaterial({ color: 0x57544e, roughness: 0.94, metalness: 0.01 });
    var charcoal = new THREE.MeshStandardMaterial({ color: 0x1c1c1a, roughness: 0.88, metalness: 0.03 });
    var orange = new THREE.MeshStandardMaterial({ color: 0xb65c32, roughness: 0.8, metalness: 0 });

    function addVolume(size, position, material) {
      var mesh = new THREE.Mesh(new THREE.BoxGeometry(size[0], size[1], size[2]), material);
      mesh.position.set(position[0], position[1], position[2]);
      group.add(mesh);
    }

    addVolume([6.6, 1.45, 2.2], [0.1, 0.55, 0], concrete);
    addVolume([3.6, 2.1, 3], [1.1, -1.15, -0.2], charcoal);
    addVolume([1.7, 4.9, 1.7], [-2.25, -0.75, 0.15], concrete);
    addVolume([3.05, 0.8, 3.7], [2.35, 1.55, -0.65], charcoal);
    addVolume([0.13, 2.1, 2.15], [3.02, 0.3, 1.08], orange);
    scene.add(group);

    scene.add(new THREE.HemisphereLight(0xf1efe9, 0x171717, 2));
    var key = new THREE.DirectionalLight(0xfff3df, 3.5);
    key.position.set(-5, 8, 7);
    scene.add(key);
    var rim = new THREE.DirectionalLight(0xb65c32, 0.6);
    rim.position.set(6, 1, -3);
    scene.add(rim);

    renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.5));
    renderer.outputColorSpace = THREE.SRGBColorSpace;
    renderer.setClearColor(0x000000, 0);
    mount.appendChild(renderer.domElement);
    camera.position.set(0, 0, 13);
    group.rotation.set(-0.09, -0.43, -0.055);

    var pointerX = 0;
    var pointerY = 0;
    var currentX = 0;
    var currentY = 0;
    var scrollProgress = 0;
    var active = false;

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

    function onMotionFrame(event) {
      scrollProgress = event.detail.heroProgress;
    }

    function frame() {
      if (!active) return;
      currentX += (pointerY - currentX) * 0.035;
      currentY += (pointerX - currentY) * 0.035;
      group.rotation.x = -0.09 + currentX + scrollProgress * 0.08;
      group.rotation.y = -0.43 + currentY + scrollProgress * 0.15;
      group.position.y = scrollProgress * 0.28;
      renderer.render(scene, camera);
      window.requestAnimationFrame(frame);
    }

    var observer = new IntersectionObserver(function (entries) {
      var wasActive = active;
      active = entries[0].isIntersecting;
      if (active && !wasActive) frame();
    });

    resize();
    renderer.render(scene, camera);
    observer.observe(hero);
    window.addEventListener('resize', resize, { passive: true });
    window.addEventListener('pointermove', onPointerMove, { passive: true });
    window.addEventListener('northform:motionframe', onMotionFrame);
    hero.classList.add('has-webgl');
  }
})();
