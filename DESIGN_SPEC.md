# NORTH/FORM — Design & Frontend Specification

## 1. Project Overview

**NORTH/FORM** is a fictional premium architecture and construction company.

The website should feel like a high-end architecture studio rather than a generic construction company website.

The visual direction should combine:

* Editorial typography
* Architectural photography
* Strong whitespace
* Large-scale layouts
* Restrained colour
* Subtle motion
* Minimal UI
* Premium art-direction
* Strong responsive behaviour

The frontend must remain lightweight, semantic, accessible and compatible with the existing custom WordPress theme architecture.

---

# 2. Project Goal

The immediate goal of this phase is to create the **static visual implementation of the NORTH/FORM homepage**.

Do not integrate ACF fields during this phase.

Temporary static content may be used inside `front-page.php`.

The static sections will later be converted into reusable ACF Gutenberg blocks.

---

# 3. Reference Direction

These websites are references for **visual direction only**.

Do not reproduce their layouts, branding, assets, copy or visual identity.

## Franklin Azzi

Reference qualities:

* Large editorial typography
* Architectural seriousness
* Strong grid
* Full-width imagery
* Minimal interface
* Strong whitespace

## Huts

Reference qualities:

* Minimal visual language
* Premium property/architecture presentation
* Confident typography
* Restrained colours
* High-quality image presentation

## The Red

Reference qualities:

* Oversized typography
* Strong visual hierarchy
* Bold use of whitespace
* Editorial layout
* Typography as a major visual element

## Daniel Blue

Reference qualities:

* Photography-led design
* Minimal interface
* Portfolio-style presentation
* Asymmetrical layouts
* Editorial spacing

## Architecture Architecture

Reference qualities:

* Project-first presentation
* Studio/portfolio feel
* Content presented more like a publication than a corporate template
* Restrained navigation and UI

---

# 4. Brand Direction

## Brand Name

**NORTH/FORM**

Use uppercase when displaying the main brand name.

Preferred display:

```text
NORTH/FORM
```

Do not use a generic construction icon or house logo.

Typography itself should function as the primary visual identity.

---

# 5. Colour System

Use a restrained architectural palette.

```text
Warm White
#F1EFE9

Charcoal
#171717

Stone
#B8B2A7

Burnt Orange
#B65C32
```

## Usage

### Warm White

Primary website background.

### Charcoal

Primary typography, navigation, borders and dark sections.

### Stone

Secondary text, subtle borders and muted interface elements.

### Burnt Orange

Accent only.

Use sparingly for:

* Hover states
* Small labels
* Active elements
* Selected links
* Small visual details

Do not create large bright orange sections.

---

# 6. Typography

The typography should feel editorial, architectural and confident.

## Primary Sans-Serif

Preferred:

* Inter
* Manrope
* Similar modern grotesk sans-serif if required

Use for:

* Major headings
* Navigation
* Labels
* Project titles
* Statistics

## Optional Editorial Serif

A restrained serif may be used occasionally for:

* Pull quotes
* Editorial accent text
* Small brand moments

Do not mix excessive fonts.

## Heading Behaviour

Large headings should use fluid sizing with `clamp()`.

Example visual direction:

```text
WE BUILD
SPACES THAT
OUTLIVE US.
```

Headings should:

* Feel oversized on desktop
* Remain readable on mobile
* Use relatively tight line-height
* Use controlled letter-spacing
* Avoid excessive font-weight

---

# 7. Layout System

The website should use a strong grid.

Maximum content width:

```text
1440px
```

Recommended viewport padding:

```text
Mobile: 20px
Tablet: 32px
Desktop: 48px
Large desktop: 64px
```

Use modern CSS Grid and Flexbox.

Avoid Bootstrap-style generic container layouts.

Sections should have generous vertical spacing.

---

# 8. Homepage Structure

The homepage should contain the following sections:

```text
Header
↓
Hero
↓
Featured Project / Hero Image
↓
Selected Projects
↓
Studio Statement
↓
Statistics
↓
Services
↓
Testimonial
↓
CTA
↓
Footer
```

These sections will later map to reusable Gutenberg/ACF blocks.

---

# 9. Header

The header should be minimal.

Desktop structure:

```text
NORTH/FORM                  PROJECTS   STUDIO   SERVICES   CONTACT
```

Requirements:

* Brand left aligned
* Navigation right aligned
* Minimal appearance
* No large CTA button in navigation
* No generic rounded SaaS buttons
* Strong typography
* Accessible keyboard navigation

The header may initially overlay or sit above the hero.

A subtle scroll-state change is acceptable.

---

# 10. Hero Section

The hero is the most important visual section.

Preferred content direction:

```text
NORTH/FORM


WE BUILD
SPACES THAT
OUTLIVE US.


Architecture / Construction
Cape Town, South Africa
```

The hero should use very large typography.

Avoid:

* Generic centred heading
* Generic subtitle + rounded CTA
* Gradient backgrounds
* Floating cards
* Excessive decorative shapes
* Generic AI-generated SaaS aesthetics

The composition should feel editorial and intentional.

---

# 11. Hero / Featured Image

Immediately after or partially integrated into the hero, display a large architectural image.

The image should:

* Occupy significant viewport width
* Have a strong architectural composition
* Preserve aspect ratio
* Avoid layout shift
* Use responsive image behaviour
* Act as one of the main visual anchors

Eventually this image will come from WordPress/ACF.

Use a placeholder during static implementation if no final asset exists.

---

# 12. Selected Projects

Section label:

```text
01
SELECTED PROJECTS
```

Projects should feel like architectural case studies rather than generic cards.

Example content:

```text
ATLANTIC HOUSE
Cape Town
2026

CONCRETE HOUSE
Stellenbosch
2025

COASTAL RESIDENCE
Hermanus
2026
```

## Layout

Avoid:

```text
[ CARD ] [ CARD ] [ CARD ]
```

Prefer large, staggered or alternating project compositions.

Example:

```text
                    [ LARGE IMAGE ]

                    ATLANTIC HOUSE
                    CAPE TOWN / 2026


[ LARGE IMAGE ]

CONCRETE HOUSE
STELLENBOSCH / 2025
```

Project numbers may be included:

```text
01
02
03
```

Hover interactions should remain subtle.

---

# 13. Studio Statement

Use this section as a major typographic break.

Example:

```text
WE DON'T JUST
CONSTRUCT BUILDINGS.

WE SHAPE HOW PEOPLE
EXPERIENCE SPACE.
```

The typography itself should create the visual interest.

This section may use a dark background if appropriate.

Avoid unnecessary imagery if typography alone is stronger.

---

# 14. Statistics

Example content:

```text
18
YEARS EXPERIENCE

42
COMPLETED PROJECTS

11
DESIGN AWARDS

06
ACTIVE PROJECTS
```

Display statistics using strong typography and clean spacing.

Avoid animated number-counter libraries.

If animation is used later, it should be lightweight.

---

# 15. Services

Section label:

```text
02
SERVICES
```

Services:

```text
01  ARCHITECTURE
02  CONSTRUCTION
03  INTERIOR DESIGN
04  PROJECT MANAGEMENT
```

Preferred layout:

```text
01   ARCHITECTURE                              →
────────────────────────────────────────────────

02   CONSTRUCTION                              →
────────────────────────────────────────────────

03   INTERIOR DESIGN                           →
────────────────────────────────────────────────

04   PROJECT MANAGEMENT                        →
────────────────────────────────────────────────
```

Avoid generic cards with icons.

Interaction may reveal:

* Small supporting text
* Image
* Colour change
* Arrow movement

Keep interaction subtle.

---

# 16. Testimonial

Include one premium editorial testimonial.

Example:

```text
"NORTH/FORM understood that the project
wasn't simply about constructing a house.
It was about creating somewhere we wanted
to spend the next twenty years."
```

Include:

```text
CLIENT NAME
PROJECT / LOCATION
```

Typography and whitespace should carry this section.

---

# 17. CTA

Preferred headline:

```text
HAVE A PROJECT
IN MIND?
```

CTA:

```text
START A CONVERSATION →
```

Avoid a generic:

```text
Get Started
```

button.

The CTA should feel integrated with the architecture brand.

---

# 18. Footer

Keep the footer minimal.

Suggested content:

```text
NORTH/FORM

CAPE TOWN
SOUTH AFRICA

PROJECTS
STUDIO
SERVICES
CONTACT

INSTAGRAM
LINKEDIN

© NORTH/FORM
```

Do not overload the footer with unnecessary columns.

---

# 19. Motion & Interaction

Motion should enhance the presentation rather than dominate it.

Allowed:

* Gentle image reveal on scroll
* Slight image scale on hover
* Text reveal
* Navigation transition
* Arrow movement
* Subtle opacity transitions
* Small transform effects

Avoid:

* Excessive parallax
* Constant movement
* Cursor trails
* Particles
* Large animation libraries
* Scroll-jacking
* Overly dramatic transitions

Respect:

```css
prefers-reduced-motion
```

---

# 20. Responsive Requirements

The implementation must be tested at minimum at:

```text
375px
768px
1024px
1440px
1920px
```

## Mobile

Mobile should be designed intentionally rather than merely stacking desktop sections.

Requirements:

* Readable hero typography
* No horizontal overflow
* Touch-friendly navigation
* Proper image scaling
* Comfortable spacing
* Project layouts adapted for narrow screens

---

# 21. Accessibility

Requirements:

* Semantic HTML5
* `<header>`
* `<nav>`
* `<main>`
* `<section>`
* `<footer>`
* Proper heading hierarchy
* Keyboard accessible navigation
* Visible `:focus-visible` states
* Meaningful image alt attributes
* Accessible button/link markup
* `aria-expanded` for mobile navigation
* Adequate colour contrast
* Respect `prefers-reduced-motion`

Do not use clickable `<div>` elements where a `<button>` or `<a>` is appropriate.

---

# 22. Performance

Avoid unnecessary dependencies.

Use:

* Vanilla JavaScript
* CSS Grid
* Flexbox
* CSS custom properties
* `clamp()`
* Responsive images
* Explicit image dimensions/aspect ratios

Do not add:

* React
* Vue
* Tailwind
* Bootstrap
* GSAP
* jQuery

unless specifically approved later.

Performance target:

```text
Lighthouse Performance:     90+
Lighthouse Accessibility:   95+
Lighthouse Best Practices:  95+
Lighthouse SEO:             95+
```

---

# 23. CSS Architecture

Use the existing structure.

Recommended:

```text
assets/css/
├── main.css
├── base/
│   ├── reset.css
│   ├── variables.css
│   └── typography.css
├── layout/
│   ├── header.css
│   ├── footer.css
│   └── grid.css
└── components/
    ├── buttons.css
    └── cards.css
```

Block styles will later live alongside each Gutenberg block.

Example:

```text
blocks/
├── hero/
│   └── style.css
├── services-grid/
│   └── style.css
└── project-showcase/
    └── style.css
```

Use CSS custom properties for design tokens.

Avoid excessive specificity.

---

# 24. WordPress Constraints

This is a custom WordPress theme.

Do not:

* Install Elementor
* Install visual builders
* Replace PHP templates with a frontend framework
* Remove the existing WordPress structure
* Introduce a JavaScript framework
* Implement ACF fields during Phase 1
* Hard-code the final CMS architecture

For the static frontend phase, temporary content in `front-page.php` is acceptable.

It will later be replaced by Gutenberg/ACF blocks.

---

# 25. Phase 1 Deliverable

Phase 1 is complete when the following exist and visually work:

* Header
* Hero
* Architectural hero imagery
* Selected Projects
* Studio statement
* Statistics
* Services
* Testimonial
* CTA
* Footer

And the page works correctly at:

```text
375px
768px
1024px
1440px
1920px
```

Do not implement ACF during Phase 1.

Do not install unnecessary dependencies.

Do not modify the overall project architecture without explaining why.

---

# 26. Future Phases

After the frontend is approved:

```text
Phase 2
Codex code review and refactoring

Phase 3
Convert homepage sections into ACF Gutenberg blocks

Phase 4
Contact form + validation

Phase 5
SEO + structured metadata

Phase 6
GTM / GA4 event layer

Phase 7
Performance and accessibility audit

Phase 8
Production deployment
```

---

# 27. Core Principle

The finished website should not look like an AI-generated template.

It should feel like a deliberately art-directed architecture website while remaining maintainable as a professional WordPress agency project.

**Design quality and engineering quality are equally important.**

