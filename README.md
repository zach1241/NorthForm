# NORTH/FORM - AI-Assisted WordPress Development

> Production asset note: the theme currently keeps readable modular CSS source
> files connected through `assets/css/main.css`. Before deployment, concatenate
> and minify these files into one versioned asset, and self-host/subset the fonts
> after confirming licensing and privacy requirements.

**NORTH/FORM** is a production-style WordPress website for a fictional premium architecture and construction company.

The project demonstrates a modern **AI-assisted agency development workflow**, combining custom WordPress development, reusable ACF Gutenberg blocks, responsive frontend engineering, technical SEO, analytics readiness, accessibility, performance optimisation and Git-based deployment.

### Built with

<img height="38px" src="https://skillicons.dev/icons?i=wordpress,php,html,css,js,git,github" />

![ACF](https://img.shields.io/badge/ACF_Pro-00E4BC?style=for-the-badge\&logo=advancedcustomfields\&logoColor=white)
![Gutenberg](https://img.shields.io/badge/Gutenberg-000000?style=for-the-badge\&logo=wordpress\&logoColor=white)

---

## About the Project

The goal of NORTH/FORM is to demonstrate how I approach building a real agency website using both traditional development skills and modern AI-assisted development tools.

Rather than hard-coding the entire website, major sections are built as **reusable ACF Gutenberg blocks**, allowing marketing teams to manage and rearrange content without modifying theme code.

The project focuses on:

* Custom WordPress theme development
* Reusable ACF Gutenberg blocks
* Responsive frontend development
* Clean and maintainable PHP
* Technical SEO
* Accessibility
* Performance optimisation
* GTM / GA4 tracking readiness
* Git-based version control
* Production deployment
* AI-assisted development and QA

---

## Tech Stack

### Development

<img height="40px" src="https://skillicons.dev/icons?i=wordpress,php,html,css,js" />

**WordPress** - Content management system
**PHP** - Theme and server-side development
**ACF Pro** - Custom Gutenberg block fields
**Gutenberg** - Block-based content editing
**HTML5** - Semantic structure
**CSS3** - Responsive styling and animation
**JavaScript** - Frontend interactions

### Development Tools

<img height="40px" src="https://skillicons.dev/icons?i=git,github,vscode,linux" />

**Git** - Version control
**GitHub** - Repository and development history
**Linux** - Development environment

---

## AI-Assisted Development

AI is used as a development accelerator while architecture, implementation decisions, code review and final QA remain developer-controlled.

### Antigravity

Used for:

* Frontend implementation assistance
* UI iteration
* Browser testing
* Responsive testing
* Visual QA

### OpenAI Codex

Used for:

* Code review
* Architecture review
* Debugging
* Refactoring
* Accessibility review
* Performance analysis
* Security and code-quality checks

### Developer

Responsible for:

* Technical architecture
* Design direction
* WordPress architecture
* Reviewing generated code
* Accepting or rejecting AI changes
* Git workflow
* Accessibility
* Performance
* QA
* Deployment

---

## Development Workflow

```text
Design / Reference
        ↓
   Antigravity
        ↓
Frontend Implementation
        ↓
      Codex
        ↓
Review / Refactor / Debug
        ↓
Custom WordPress Theme
        ↓
 ACF Gutenberg Blocks
        ↓
      GitHub
        ↓
    Deployment
        ↓
Performance & Responsive QA
```

---

## Custom Gutenberg Blocks

The homepage is not hard-coded into a single WordPress template.

Instead, reusable ACF Gutenberg blocks provide flexible content management.

```text
blocks/
├── hero/
├── services-grid/
├── project-showcase/
├── stats/
├── testimonial/
└── cta/
```

### Hero

* Eyebrow
* Heading
* Description
* CTA
* Background image

### Services Grid

* Section heading
* Service title
* Description
* Image / icon
* Link

### Project Showcase

* Project image
* Project title
* Location
* Category
* Project URL

### Statistics

* Statistic
* Label

### Testimonial

* Quote
* Name
* Position
* Company
* Portrait

### Call To Action

* Heading
* Description
* Button text
* Button URL

---

## Theme Architecture

```text
northform/
│
├── README.md
├── .gitignore
│
└── wp-content/
    └── themes/
        └── northform/
            ├── style.css
            ├── functions.php
            ├── theme.json
            ├── header.php
            ├── footer.php
            ├── front-page.php
            │
            ├── assets/
            │   ├── css/
            │   ├── js/
            │   └── images/
            │
            ├── inc/
            │   ├── setup.php
            │   ├── enqueue.php
            │   └── blocks.php
            │
            ├── blocks/
            │   ├── hero/
            │   ├── services-grid/
            │   ├── project-showcase/
            │   ├── stats/
            │   ├── testimonial/
            │   └── cta/
            │
            └── acf-json/
```

---

## Built for Content Editors

NORTH/FORM separates content management from development.

A marketing user can open the WordPress Gutenberg editor and manage:

```text
Homepage
│
├── Hero
├── Services Grid
├── Project Showcase
├── Statistics
├── Testimonial
└── CTA
```

Blocks can be edited and rearranged without modifying PHP templates.

---

## Responsive Development

The website is designed and tested across:

**Mobile** - 375px+
**Tablet** - 768px+
**Laptop** - 1024px+
**Desktop** - 1440px+
**Large Desktop** - 1920px+

Testing covers navigation, typography, images, grids, forms, spacing, interactive states and overflow.

---

## SEO & Analytics

Technical SEO implementation includes:

* Semantic HTML
* Page titles and meta descriptions
* Open Graph metadata
* Canonical URLs
* XML sitemap
* Logical heading hierarchy
* Image alt attributes
* Mobile optimisation

The project is also structured for **Google Tag Manager and GA4** conversion tracking.

Example events:

```javascript
window.dataLayer.push({
    event: 'contact_form_submit',
    form_name: 'project_enquiry'
});
```

```javascript
window.dataLayer.push({
    event: 'cta_click',
    cta_location: 'hero'
});
```

---

## Accessibility

The project considers:

* Semantic HTML
* Keyboard navigation
* Visible focus states
* Form labels
* Image alt text
* Colour contrast
* Logical heading hierarchy
* Accessible mobile navigation
* Appropriate interactive elements

---

## Performance

Performance optimisation includes:

* WebP / AVIF images
* Responsive images
* Lazy loading
* Minimal JavaScript
* Optimised CSS
* Font optimisation
* Core Web Vitals considerations

### Lighthouse Targets

| Category       | Target |
| -------------- | -----: |
| Performance    |    90+ |
| Accessibility  |    95+ |
| Best Practices |    95+ |
| SEO            |    95+ |

---

## Git Workflow

Development is committed incrementally to maintain a clear project history.

```text
chore: initialise northform project

feat: scaffold custom WordPress theme

feat: build responsive Northform homepage

refactor: improve theme architecture and accessibility

feat: add reusable ACF hero block

feat: add ACF services grid block

feat: implement project showcase block

feat: implement accessible contact form

perf: optimise frontend assets

chore: prepare Northform for production
```

---

## Deployment

```text
Local Development
        ↓
       Git
        ↓
      GitHub
        ↓
 Production Server
        ↓
    WordPress
        ↓
 Performance / QA
```

---

## Project Status

**Currently in development.**

The project is being developed incrementally so the Git history documents the complete development process from initial setup through production deployment.

---

## Developer

### Zachary Clint Swanepoel

Full Stack & WordPress Developer based in Cape Town, South Africa.

<img height="35px" src="https://skillicons.dev/icons?i=wordpress,php,js,ts,react,html,css,git,github,linux" />

[![Portfolio](https://img.shields.io/badge/Portfolio-View_Portfolio-000?style=for-the-badge\&logo=googlechrome\&logoColor=white)](https://zach1241.github.io/Profile/)

[![GitHub](https://img.shields.io/badge/GitHub-zach1241-181717?style=for-the-badge\&logo=github\&logoColor=white)](https://github.com/zach1241)

---

<p align="center">
<strong>NORTH/FORM</strong><br>
Custom WordPress development with an AI-assisted engineering workflow.
</p>
