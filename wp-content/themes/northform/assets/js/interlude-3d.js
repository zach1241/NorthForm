/**
 * NORTH/FORM — Architectural 3D Interlude
 * 
 * Standalone ES module for the abstract architectural massing model.
 * Lazy-loaded when the interlude section approaches the viewport.
 * Features WebGL detection, brutalist concrete geometry, soft directional lighting,
 * tectonic drafting edge lines, and pointer/scroll driven rotation.
 */

import * as THREE from './vendor/three.module.min.js';

/**
 * Check WebGL support safely.
 * @return {boolean}
 */
function isWebGLAvailable() {
  try {
    var canvas = document.createElement('canvas');
    return Boolean(window.WebGLRenderingContext && (canvas.getContext('webgl') || canvas.getContext('experimental-webgl')));
  } catch (e) {
    return false;
  }
}

/**
 * Initialize the 3D Architectural Interlude within the target container.
 * @param {HTMLElement} container - The container element for the canvas.
 * @return {object|null} Controller object with dispose/update methods.
 */
export function initInterlude3D(container) {
  if (!container || !isWebGLAvailable()) {
    return null;
  }

  var isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var width = container.clientWidth || 800;
  var height = container.clientHeight || 500;

  // Scene setup
  var scene = new THREE.Scene();

  // Camera setup - Architectural perspective (40° FOV)
  var camera = new THREE.PerspectiveCamera(40, width / height, 0.1, 100);
  camera.position.set(4.5, 3.2, 5.5);
  camera.lookAt(0, 0.2, 0);

  // WebGL Renderer
  var renderer;
  try {
    renderer = new THREE.WebGLRenderer({
      antialias: true,
      alpha: true,
      powerPreference: 'high-performance',
    });
  } catch (err) {
    console.warn('WebGL initialization failed:', err);
    return null;
  }

  renderer.setSize(width, height);
  renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.75));
  renderer.toneMapping = THREE.ACESFilmicToneMapping;
  renderer.toneMappingExposure = 1.1;
  renderer.domElement.classList.add('interlude-3d__canvas');
  container.appendChild(renderer.domElement);

  // Lighting - Soft architectural daylighting
  var ambientLight = new THREE.AmbientLight(0xf5f3ed, 1.2);
  scene.add(ambientLight);

  var sunLight = new THREE.DirectionalLight(0xfffdf7, 2.4);
  sunLight.position.set(6, 8, 5);
  scene.add(sunLight);

  var fillLight = new THREE.DirectionalLight(0xd5d1c9, 0.9);
  fillLight.position.set(-5, 3, -3);
  scene.add(fillLight);

  var hemiLight = new THREE.HemisphereLight(0xffffff, 0xb8b2a7, 0.6);
  hemiLight.position.set(0, 10, 0);
  scene.add(hemiLight);

  // Architectural Model Group
  var modelGroup = new THREE.Group();
  scene.add(modelGroup);

  // Shared Materials (Matte Concrete & Stone with Tectonic Edge Linework)
  var materialPlinth = new THREE.MeshStandardMaterial({
    color: 0xc4beb4,
    roughness: 0.9,
    metalness: 0.05,
    flatShading: true,
  });

  var materialShearCore = new THREE.MeshStandardMaterial({
    color: 0x8a847b,
    roughness: 0.85,
    metalness: 0.05,
    flatShading: true,
  });

  var materialPavilion = new THREE.MeshStandardMaterial({
    color: 0xded9d0,
    roughness: 0.8,
    metalness: 0.02,
    flatShading: true,
  });

  var materialUpperCantilever = new THREE.MeshStandardMaterial({
    color: 0xf1efe9,
    roughness: 0.75,
    metalness: 0.02,
    flatShading: true,
  });

  var materialAccentVoid = new THREE.MeshStandardMaterial({
    color: 0x3d3a36,
    roughness: 0.95,
    metalness: 0.1,
    flatShading: true,
  });

  var lineMaterial = new THREE.LineBasicMaterial({
    color: 0x4a463f,
    linewidth: 1,
    transparent: true,
    opacity: 0.45,
  });

  /**
   * Helper to create architectural massing volume with crisp edge lines.
   */
  function addVolume(w, h, d, x, y, z, material) {
    var geometry = new THREE.BoxGeometry(w, h, d);
    var mesh = new THREE.Mesh(geometry, material);
    mesh.position.set(x, y, z);
    modelGroup.add(mesh);

    var edges = new THREE.EdgesGeometry(geometry);
    var line = new THREE.LineSegments(edges, lineMaterial);
    line.position.set(x, y, z);
    modelGroup.add(line);

    return mesh;
  }

  // 1. Foundation Plinth / Podium
  addVolume(3.8, 0.25, 2.8, 0, -0.65, 0, materialPlinth);

  // 2. Vertical Core / Monolithic Shear Wall
  addVolume(0.9, 2.6, 1.4, -0.85, 0.65, -0.25, materialShearCore);

  // 3. Middle Cantilevered Living Pavilion (Interlocking volume)
  addVolume(2.6, 0.75, 1.8, 0.45, 0.25, 0.35, materialPavilion);

  // 4. Upper Cantilever Roof Terrace & Studio Volume
  addVolume(2.8, 0.55, 1.9, 0.6, 1.15, -0.15, materialUpperCantilever);

  // 5. Recessed Glazed Void / Shaded Breezeway Volume
  addVolume(1.4, 0.5, 1.1, 0.1, -0.25, 0.55, materialAccentVoid);

  // 6. Tectonic Structural Columns / Fin Elements
  addVolume(0.08, 0.75, 0.6, -0.2, 0.25, 1.0, materialShearCore);
  addVolume(0.08, 0.75, 0.6, 0.5, 0.25, 1.0, materialShearCore);
  addVolume(0.08, 0.75, 0.6, 1.2, 0.25, 1.0, materialShearCore);

  // Center the model group gently
  modelGroup.position.set(0, -0.1, 0);

  // Mark container as loaded for smooth CSS transition
  container.classList.add('is-loaded');

  // Animation State
  var targetRotX = 0;
  var targetRotY = 0;
  var currentRotX = 0;
  var currentRotY = 0;
  var scrollRotationY = 0;
  var isVisible = true;
  var animationFrameId = null;

  // Pointer Movement Handler (Desktop fine pointers only)
  function onPointerMove(e) {
    if (isReducedMotion) return;
    var rect = container.getBoundingClientRect();
    if (rect.width === 0 || rect.height === 0) return;

    var normX = ((e.clientX - rect.left) / rect.width) * 2 - 1;
    var normY = -(((e.clientY - rect.top) / rect.height) * 2 - 1);

    // Clamped subtle rotation angles (max ~0.25 radians)
    targetRotY = normX * 0.28;
    targetRotX = -normY * 0.18;
  }

  function onPointerLeave() {
    targetRotX = 0;
    targetRotY = 0;
  }

  container.addEventListener('pointermove', onPointerMove, { passive: true });
  container.addEventListener('pointerleave', onPointerLeave, { passive: true });

  // Update scroll progress relative to the interlude section
  function updateScrollProgress(progress) {
    // Rotate model up to ~45 degrees across scroll range
    scrollRotationY = (progress - 0.5) * (Math.PI * 0.45);
  }

  // Animation / Render Loop
  var lastTime = performance.now();

  function render(time) {
    if (!isVisible) return;

    var delta = (time - lastTime) * 0.001;
    lastTime = time;

    if (!isReducedMotion) {
      // Smooth interpolation for pointer rotation (damping/lerp)
      currentRotX += (targetRotX - currentRotX) * 0.06;
      currentRotY += (targetRotY - currentRotY) * 0.06;

      // Base idle drift (subtle architectural movement)
      var idleDrift = Math.sin(time * 0.0006) * 0.04;

      modelGroup.rotation.x = currentRotX;
      modelGroup.rotation.y = currentRotY + scrollRotationY + idleDrift;
    } else {
      modelGroup.rotation.x = 0;
      modelGroup.rotation.y = 0;
    }

    renderer.render(scene, camera);

    if (!isReducedMotion) {
      animationFrameId = requestAnimationFrame(render);
    }
  }

  // Initial render
  render(performance.now());

  // Visibility toggling via IntersectionObserver to save GPU/CPU
  var visibilityObserver = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      isVisible = entry.isIntersecting;
      if (isVisible && !isReducedMotion && !animationFrameId) {
        lastTime = performance.now();
        animationFrameId = requestAnimationFrame(render);
      } else if (!isVisible && animationFrameId) {
        cancelAnimationFrame(animationFrameId);
        animationFrameId = null;
      }
    });
  }, { threshold: 0.05 });

  visibilityObserver.observe(container);

  // Resize handling
  function onResize() {
    var newW = container.clientWidth || 800;
    var newH = container.clientHeight || 500;
    camera.aspect = newW / newH;
    camera.updateProjectionMatrix();
    renderer.setSize(newW, newH);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 1.75));
    if (isReducedMotion) {
      renderer.render(scene, camera);
    }
  }

  var resizeObserver = null;
  if ('ResizeObserver' in window) {
    resizeObserver = new ResizeObserver(function () {
      onResize();
    });
    resizeObserver.observe(container);
  } else {
    window.addEventListener('resize', onResize, { passive: true });
  }

  // Controller return
  return {
    updateScrollProgress: updateScrollProgress,
    onResize: onResize,
    dispose: function () {
      if (animationFrameId) cancelAnimationFrame(animationFrameId);
      visibilityObserver.disconnect();
      if (resizeObserver) resizeObserver.disconnect();
      container.removeEventListener('pointermove', onPointerMove);
      container.removeEventListener('pointerleave', onPointerLeave);
      window.removeEventListener('resize', onResize);
      renderer.dispose();
      if (renderer.domElement && renderer.domElement.parentNode) {
        renderer.domElement.parentNode.removeChild(renderer.domElement);
      }
    }
  };
}
