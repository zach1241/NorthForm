# NORTH/FORM — ACF Gutenberg Block Specification

## Goal

Convert the approved NORTH/FORM homepage from hard-coded static markup into reusable ACF Gutenberg blocks without changing the approved visual design, motion system, accessibility behavior, or WordPress theme architecture.

The current visual frontend is considered frozen for CMS conversion.

Do not redesign the page.

Do not change the motion direction.

Do not modify the 3D hero geometry during this phase.

---

# Block Architecture

Create the following reusable ACF Gutenberg blocks:

1. Hero
2. Featured Project
3. Project Portrait Study
4. Project Panoramic Datum
5. Studio Manifesto
6. Integrated Practice
7. Commission CTA

Each block should live in:

blocks/<block-name>/

with:

- block.json
- render.php
- style.css only if block-specific styles are required

Avoid unnecessary per-block JavaScript.

---

# 1. Hero Block

## Purpose

Controls the content surrounding the approved NORTH/FORM hero composition.

The 3D massing remains implemented in code.

## Fields

- Eyebrow
  - Text
  - Optional

- Headline Line 1
  - Text
  - Required

- Headline Line 2
  - Text
  - Required

- Headline Line 3
  - Text
  - Required

- Location
  - Text
  - Optional

- Practice Type
  - Text
  - Optional

- Edition / Meta Label
  - Text
  - Optional

- Hero Image
  - Image
  - Required
  - Return format: Image ID

- Hero Image Alt Override
  - Text
  - Optional
  - If empty, use WordPress attachment alt text

- Selected Work Link
  - Link
  - Optional

## Rendering Rules

- Use wp_get_attachment_image() for the hero image.
- Preserve responsive image attributes.
- Hero image should remain priority/LCP aware.
- Escape all text output.
- Do not expose 3D geometry settings to editors.

---

# 2. Featured Project Block

## Purpose

Full-field editorial case-study opener.

## Fields

- Project Title
  - Text
  - Required

- Location
  - Text
  - Optional

- Year
  - Text
  - Optional

- Typology
  - Text
  - Optional

- Primary Image
  - Image
  - Required
  - Return format: Image ID

- Editorial Plane Image
  - Image
  - Optional
  - Return format: Image ID

- Architectural Premise
  - Textarea
  - Required

- Supporting Copy
  - WYSIWYG
  - Optional

- Project Link
  - Link
  - Optional

## Rendering Rules

- Preserve the approved full-field composition.
- If no project link exists, render non-interactive semantic content.
- Do not render fake "#"-style links.

---

# 3. Project Portrait Study Block

## Fields

- Project Title
  - Text
  - Required

- Location
  - Text
  - Optional

- Year
  - Text
  - Optional

- Typology
  - Text
  - Optional

- Primary Image
  - Image
  - Required
  - Return format: Image ID

- Detail Image
  - Image
  - Optional
  - Return format: Image ID

- Architectural Premise
  - Textarea
  - Required

- Supporting Copy
  - WYSIWYG
  - Optional

- Project Link
  - Link
  - Optional

## Rendering Rules

- Preserve the approved offset portrait composition.
- Detail image should disappear gracefully when not provided.
- Mobile layout remains image-first.

---

# 4. Project Panoramic Datum Block

## Fields

- Project Title
  - Text
  - Required

- Location
  - Text
  - Optional

- Year
  - Text
  - Optional

- Typology
  - Text
  - Optional

- Panoramic Image
  - Image
  - Required
  - Return format: Image ID

- Architectural Premise
  - Textarea
  - Required

- Supporting Copy
  - WYSIWYG
  - Optional

- Datum Label
  - Text
  - Optional

- Project Link
  - Link
  - Optional

## Rendering Rules

- Preserve the approved panoramic editorial composition.
- Maintain mobile conversion to a portrait-style image treatment.

---

# 5. Studio Manifesto Block

## Fields

- Eyebrow
  - Text
  - Optional

- Heading
  - Textarea
  - Required

- Supporting Copy
  - WYSIWYG
  - Optional

- Image
  - Image
  - Optional
  - Return format: Image ID

- Proof Points
  - Repeater
  - Minimum: 1
  - Maximum: 4

Repeater subfields:

- Value
  - Text
  - Required

- Label
  - Text
  - Required

## Rendering Rules

- Preserve the approved charcoal composition.
- Proof-point values must remain static.
- Do not add number-count animations.

---

# 6. Integrated Practice Block

## Fields

- Eyebrow
  - Text
  - Optional

- Heading
  - Textarea
  - Required

- Central Proposition
  - Textarea
  - Optional

- Disciplines
  - Repeater
  - Minimum: 2
  - Maximum: 6

Repeater subfields:

- Discipline Name
  - Text
  - Required

- Description
  - Textarea
  - Optional

- Index
  - Text
  - Optional

## Rendering Rules

- Preserve the approved diagram-like composition.
- Keep the structural-line animation purely decorative.
- Content must remain understandable without JavaScript.

---

# 7. Commission CTA Block

## Fields

- Eyebrow
  - Text
  - Optional

- Heading
  - Textarea
  - Required

- Primary Email
  - Email
  - Optional

- Primary Link
  - Link
  - Optional

- Phone
  - Text
  - Optional

- Location
  - Text
  - Optional

## Rendering Rules

- Preserve the large typographic CTA.
- If Primary Link exists, prefer it.
- Otherwise, if email exists, render a mailto link.
- Escape and validate output.

---

# ACF Local JSON

Configure ACF Local JSON inside:

acf-json/

Use:

acf/settings/save_json
acf/settings/load_json

Field groups must be version-controlled in Git.

Do not leave field-group architecture database-only.

---

# Gutenberg Category

Register a custom block category:

northform

Display title:

NORTH/FORM

All custom blocks should appear within this category.

---

# block.json Requirements

Use modern block.json registration.

Each block should define:

- name
- title
- description
- category
- icon
- keywords
- acf.renderTemplate
- acf.mode
- supports.anchor
- supports.align where appropriate

Prefer preview mode where useful.

Do not use legacy acf_register_block_type() unless absolutely necessary.

---

# Content Safety

Use appropriate escaping:

- esc_html()
- esc_attr()
- esc_url()
- wp_kses_post()

For links:

- validate URL
- support target
- support rel attributes where appropriate

For images:

- use attachment IDs
- use wp_get_attachment_image()
- preserve srcset and dimensions
- use attachment alt text by default

Do not output raw ACF values without escaping.

---

# Front Page Migration

Current front-page.php contains hard-coded visual sections.

After block conversion:

front-page.php should primarily:

- render semantic <main>
- execute the_content()
- preserve any global hooks required by motion/hero systems

The homepage layout should be assembled through Gutenberg blocks.

Do not permanently duplicate the current homepage markup in both front-page.php and block templates.

---

# Motion Integration

Existing motion architecture must survive conversion.

Use stable block-level classes/data attributes matching the current implementation.

Do not rewrite the motion system unless required.

The following must continue working:

- hero differential depth
- hero massing / Three.js integration
- project image motion
- masked reveals
- manifesto depth
- integrated-practice structural animation
- reduced-motion handling
- no-JavaScript readability

---

# Editor Experience

Editors should be able to:

- add blocks
- reorder blocks
- edit text
- replace images
- edit project metadata
- manage proof points
- manage disciplines
- change CTA content

Editors should NOT control:

- arbitrary CSS
- animation speeds
- parallax values
- Three.js geometry
- layout percentages
- structural visual-system tokens

Content is editable.
Art direction remains theme-controlled.

---

# Homepage Block Order

Recommended default:

Hero
Featured Project
Project Portrait Study
Project Panoramic Datum
Studio Manifesto
Integrated Practice
Commission CTA

Do not hard-lock block order unless necessary.

---

# Implementation Rules

- Preserve approved V3 visual design.
- Preserve Motion Direction pass.
- No redesign.
- No new frontend frameworks.
- No page builder.
- No Elementor.
- No React frontend.
- No ACF Flexible Content mega-field.
- Avoid one giant homepage field group.
- Prefer one field group per block.
- Keep code modular and reviewable.

---

# Validation

After implementation:

- PHP syntax check
- JavaScript syntax check
- theme.json validation
- git diff --check
- verify all blocks register
- verify Gutenberg editor renders without PHP warnings
- verify homepage renders with dynamic field content
- verify missing optional fields fail gracefully
- verify no-JavaScript frontend remains readable
- verify reduced-motion still works

Do not commit.
Do not push.
