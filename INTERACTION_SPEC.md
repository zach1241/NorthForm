# NORTH/FORM — Immersive Interaction Specification

## Purpose

This phase transforms the existing NORTH/FORM static architecture website into a more immersive, premium digital experience.

The existing visual identity and engineering foundation must remain intact.

The goal is not to add animation everywhere.

Motion should reinforce the architectural concept of:

- space
- depth
- structure
- scale
- material
- movement

The finished experience should feel like a premium architecture studio website rather than a technology demo.

---

# 1. Core Principles

Every interaction must satisfy at least one of these goals:

1. Improve visual hierarchy
2. Reinforce architectural depth
3. Provide meaningful feedback
4. Improve storytelling
5. Make transitions feel intentional

Do not add motion purely because it looks impressive.

Performance, accessibility and usability remain priorities.

---

# 2. Hero

The hero should become more cinematic.

Current typography and general composition should remain recognizable.

## Desired behaviour

Introduce subtle depth separation between:

- NORTH/FORM navigation
- hero headline
- supporting metadata
- architectural imagery

During initial scroll:

- hero imagery moves slightly slower than the document
- headline may move at a slightly different rate
- supporting metadata remains restrained

The effect should create depth without aggressive parallax.

Do not make text difficult to read.

---

# 3. Hero Image Parallax

The primary architectural image should have controlled parallax.

Preferred implementation:

- oversized image inside an overflow-hidden container
- image translated vertically based on scroll progress
- movement approximately 5–10% of container height
- GPU-friendly transforms
- no layout-triggering animation

The image must never expose empty container space.

Disable or substantially reduce this effect when:

prefers-reduced-motion: reduce

---

# 4. Image Reveals

Selected architectural imagery may use masked reveals as it enters the viewport.

Preferred visual behaviour:

Image container exists normally.

On entrance:

clip/mask reveals vertically or horizontally.

The actual image may simultaneously move very slightly in the opposite direction.

Keep duration restrained.

Do not hide essential content when JavaScript is unavailable.

Progressive enhancement is mandatory.

---

# 5. Selected Projects

Projects should feel more tactile.

Desktop pointer interaction may include:

- subtle image scaling
- image translation
- metadata movement
- directional indicator
- optional custom VIEW PROJECT cursor state

Avoid excessive perspective distortion.

Project imagery should remain the primary visual focus.

Touch devices must not depend on hover interactions.

---

# 6. Scroll Typography

Large editorial statements may respond subtly to scrolling.

Potential treatments:

- slight horizontal translation
- opposing line movement
- restrained opacity transition
- clip-path reveal

Example:

WE DON'T JUST
CONSTRUCT BUILDINGS.

WE SHAPE HOW PEOPLE
EXPERIENCE SPACE.

Different lines may move at slightly different speeds.

Movement must remain subtle enough that the text is always readable.

---

# 7. Services Interaction

Services remain semantically simple.

Do not reintroduce the previous simulated accordion.

Desktop hover may provide richer feedback.

Possible behaviour:

01 ARCHITECTURE →

Hover:

- arrow translates
- accent colour appears
- optional architectural preview image appears
- typography shifts slightly

Any preview imagery must be decorative and must not be required to understand the service.

Touch devices receive a simpler state.

---

# 8. Architectural 3D Interlude

Introduce ONE dedicated immersive 3D section.

This should be the primary technical showcase of the experience.

## Concept

Display an abstract architectural massing model.

The model should resemble:

- stacked concrete volumes
- structural architectural geometry
- conceptual building massing
- modern brutalist forms

It must NOT resemble:

- a glowing orb
- generic AI blob
- spaceship
- gaming object
- random floating shapes

The 3D object should clearly belong to an architecture studio website.

---

# 9. 3D Visual Direction

Preferred materials:

- concrete
- stone
- matte neutral surfaces

Preferred environment:

- warm-white or charcoal background
- soft directional lighting
- restrained shadows
- minimal scene

No neon.

No excessive bloom.

No cyberpunk styling.

No particle systems.

The visual identity must remain NORTH/FORM.

---

# 10. 3D Interaction

The architectural model may respond subtly to:

- pointer position
- scroll position
- viewport entrance

Potential behaviour:

Pointer movement:
small rotation around X/Y axis.

Scroll:
slow controlled model rotation or camera movement.

Idle:
extremely subtle motion if appropriate.

Do not allow unrestricted orbit controls.

This is an art-directed presentation, not a 3D model viewer.

---

# 11. 3D Technology

Three.js may be considered for this single controlled experience.

Do not introduce React or React Three Fiber.

Before introducing Three.js:

- evaluate bundle impact
- lazy-load the experience
- avoid blocking initial page rendering
- provide a static fallback
- ensure failure does not break the rest of the page

The 3D canvas should initialize only when reasonably close to the viewport.

---

# 12. 3D Accessibility & Fallback

The 3D section must work without WebGL.

Provide a static architectural composition or image fallback.

When:

prefers-reduced-motion: reduce

the scene should either:

- remain static
- or use dramatically reduced movement

The 3D canvas must not interfere with keyboard navigation.

Decorative canvases should be hidden appropriately from assistive technology.

---

# 13. Custom Cursor

A contextual cursor treatment may be used ONLY for selected project imagery on desktop pointer devices.

Potential display:

VIEW
PROJECT

Do not replace the cursor globally.

Do not enable it on touch devices.

Do not interfere with native links, text selection or accessibility.

If implementation becomes unnecessarily complex, omit it.

---

# 14. Micro-interactions

Allowed micro-interactions:

- arrows translating slightly
- navigation underline movement
- image scale
- image reveal
- small opacity transitions
- section-index movement
- subtle link transitions

Avoid:

- elastic bouncing
- dramatic easing
- excessive spring physics
- constant movement

---

# 15. Animation Performance

Prefer:

transform
opacity
clip-path where appropriate

Avoid repeatedly animating:

width
height
top
left
margin
padding

Use requestAnimationFrame when scroll calculations are necessary.

Avoid multiple independent scroll listeners.

Use IntersectionObserver where possible.

---

# 16. JavaScript Policy

Keep JavaScript deliberately small.

Vanilla JavaScript remains preferred for standard interactions.

Three.js is the only substantial frontend dependency that may be introduced during this phase, and only if required for the architectural 3D experience.

Do not introduce:

- React
- Vue
- jQuery
- Bootstrap
- animation frameworks without justification

If native browser APIs can accomplish an interaction cleanly, prefer them.

---

# 17. Progressive Enhancement

This requirement is mandatory.

The website must remain:

- readable
- navigable
- understandable
- visually coherent

when JavaScript fails.

JavaScript may enhance presentation but must not be required for core content visibility.

---

# 18. Reduced Motion

All major motion must respect:

prefers-reduced-motion: reduce

Reduced-motion mode should:

- disable parallax
- disable scroll-linked text movement
- disable custom cursor motion
- disable or freeze 3D animation
- remove large image transforms

Basic opacity transitions may remain only when appropriate.

---

# 19. Mobile Behaviour

Do not attempt to reproduce every desktop effect on mobile.

Mobile priorities:

1. readability
2. performance
3. touch usability
4. visual composition

Reduce or disable:

- cursor effects
- heavy parallax
- pointer-driven 3D movement
- expensive scroll calculations

The mobile experience should still feel deliberately designed.

---

# 20. Performance Budget

The immersive layer must not destroy the performance of the existing theme.

Targets remain:

Lighthouse Performance: 90+
Accessibility: 95+
Best Practices: 95+
SEO: 95+

The initial viewport should not wait for the 3D experience.

Three.js or 3D assets should be lazy-loaded.

Avoid enormous textures and models.

---

# 21. Implementation Order

Implement interactions in this order:

1. Hero depth/parallax
2. Image reveals
3. Project interactions
4. Scroll typography
5. Service hover enhancements
6. 3D architectural interlude
7. Optional contextual project cursor
8. Final reduced-motion pass
9. Responsive interaction QA

Do not attempt every effect simultaneously.

---

# 22. Do Not Change

Do not:

- implement ACF yet
- convert sections into Gutenberg blocks yet
- redesign the brand
- replace the existing colour system
- replace the typography system
- introduce a frontend framework
- rewrite the WordPress theme architecture
- compromise accessibility for animation
- hide core content behind JavaScript

---

# 23. Completion Criteria

This phase is complete when:

- hero has controlled depth
- primary imagery uses restrained parallax
- project imagery has premium interaction
- editorial typography uses subtle scroll movement
- services have richer desktop feedback
- one architectural 3D experience exists
- mobile behaviour is intentionally simplified
- reduced-motion mode works
- JavaScript failure leaves the site usable
- no major layout shift is introduced
- visual identity remains NORTH/FORM

The result should feel substantially more immersive than Phase 1 without becoming a technology demo.
