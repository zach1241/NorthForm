<?php
/**
 * NORTH/FORM — Homepage Template
 *
 * Implements the full editorial and immersive interaction specification for NORTH/FORM.
 * Structured with semantic HTML5 sections ready for future ACF Gutenberg block conversion.
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<?php
/*
 * Image migration note: future block render callbacks should receive attachment
 * IDs and use wp_get_attachment_image(). External URLs remain fallback prototype
 * assets during this static frontend phase only.
 */
?>

<!-- 1. HERO SECTION -->
<section class="section hero-section" id="hero" aria-labelledby="hero-title">
	<div class="site-container">
		<div class="hero-grid">
			<div class="hero-header-block reveal">
				<div class="hero-eyebrow" data-depth="0.05">
					<span>NORTH<span class="brand-slash">/</span>FORM</span>
					<span class="hero-eyebrow__divider">—</span>
					<span>ARCHITECTURE & CONSTRUCTION STUDIO</span>
				</div>

				<h1 id="hero-title" class="hero-title" data-depth="0.12">
					WE BUILD<br>
					SPACES THAT<br>
					OUTLIVE US.
				</h1>
			</div>

			<div class="hero-meta-row reveal reveal-delay-1" data-depth="0.04">
				<div class="hero-meta">
					Architecture / Construction<br>
					Cape Town, South Africa
				</div>

				<div>
					<a href="#projects" class="link-arrow link-arrow--down">
						<span class="link-arrow__text">EXPLORE SELECTED WORKS</span>
						<span class="link-arrow__icon" aria-hidden="true">↓</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 2. FEATURED HERO IMAGE -->
<section class="section section--no-top featured-image-section" aria-labelledby="featured-heading">
	<div class="site-container">
		<h2 id="featured-heading" class="screen-reader-text"><?php esc_html_e( 'Featured architecture showcase', 'northform' ); ?></h2>
		<figure class="featured-media image-reveal reveal">
			<div class="featured-media__frame">
				<img
				src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=80"
				srcset="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=768&q=80 768w,
				        https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80 1200w,
				        https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=80 1600w,
				        https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2000&q=80 2000w"
				sizes="(max-width: 768px) 100vw, (max-width: 1440px) 92vw, 1440px"
				alt="The Cliff House by NORTH/FORM - Monolithic concrete architecture overlooking the Atlantic Ocean in Clifton, Cape Town"
				class="featured-media__img parallax-img"
				width="1600"
				height="900"
				fetchpriority="high"
				decoding="async"
				>
			</div>
			<figcaption class="featured-media__caption reveal-delay-1">
				<span>00 / THE CLIFF HOUSE</span>
				<span>CLIFTON, CAPE TOWN — 2026</span>
			</figcaption>
		</figure>
	</div>
</section>

<!-- 3. SELECTED PROJECTS -->
<section class="section" id="projects" aria-labelledby="projects-heading">
	<div class="site-container">
		<!-- Section Header -->
		<header class="section-header section-header--split reveal">
			<h2 id="projects-heading" class="section-label">
				<span class="section-label__num">01</span>
				<span class="section-label__bar" aria-hidden="true"></span>
				<span>SELECTED PROJECTS</span>
			</h2>
			<div>
				<p class="text-lead">
					A curated survey of bespoke residential and civic structures engineered with tectonic discipline in the Western Cape.
				</p>
			</div>
		</header>

		<!-- Staggered Editorial Showcase -->
		<div class="projects-showcase">
			<!-- Project 01 -->
			<article class="project-item project-item--offset-right-large image-reveal reveal">
					<div class="project-item__media project-item__media--landscape">
						<span class="project-item__index-tag">01</span>
						<img
							src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1400&q=80"
							srcset="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=768&q=80 768w,
							        https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1400&q=80 1400w"
							sizes="(max-width: 1024px) 100vw, 65vw"
							alt="Atlantic House - Modern minimalist residence with timber and concrete elements in Cape Town"
							class="project-item__img"
							width="1400"
							height="875"
							loading="lazy"
							decoding="async"
						>
					</div>
					<div class="project-item__content">
						<div class="project-item__header">
							<div class="project-item__title-wrap">
								<h3 class="project-item__title">ATLANTIC HOUSE</h3>
								<span class="project-item__arrow" aria-hidden="true">↗</span>
							</div>
							<span class="project-item__year">2026</span>
						</div>
						<div class="project-item__meta">
							<span>CAPE TOWN</span>
							<span class="project-item__bullet" aria-hidden="true">•</span>
							<span>RESIDENTIAL ARCHITECTURE & BUILD</span>
						</div>
					</div>
			</article>

			<!-- Project 02 -->
			<article class="project-item project-item--offset-left image-reveal reveal">
					<div class="project-item__media project-item__media--square">
						<span class="project-item__index-tag">02</span>
						<img
							src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80"
							srcset="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=640&q=80 640w,
							        https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80 1200w"
							sizes="(max-width: 1024px) 100vw, 55vw"
							alt="Concrete House - Off-shutter concrete and stone pavilion in Stellenbosch"
							class="project-item__img"
							width="1200"
							height="900"
							loading="lazy"
							decoding="async"
						>
					</div>
					<div class="project-item__content">
						<div class="project-item__header">
							<div class="project-item__title-wrap">
								<h3 class="project-item__title">CONCRETE HOUSE</h3>
								<span class="project-item__arrow" aria-hidden="true">↗</span>
							</div>
							<span class="project-item__year">2025</span>
						</div>
						<div class="project-item__meta">
							<span>STELLENBOSCH</span>
							<span class="project-item__bullet" aria-hidden="true">•</span>
							<span>WINELANDS RESIDENTIAL ESTATE</span>
						</div>
					</div>
			</article>

			<!-- Project 03 -->
			<article class="project-item project-item--center-wide image-reveal reveal">
					<div class="project-item__media project-item__media--wide">
						<span class="project-item__index-tag">03</span>
						<img
							src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1400&q=80"
							srcset="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=768&q=80 768w,
							        https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1400&q=80 1400w"
							sizes="(max-width: 1024px) 100vw, 85vw"
							alt="Coastal Residence - Horizontal architectural pavilion in Hermanus"
							class="project-item__img"
							width="1400"
							height="667"
							loading="lazy"
							decoding="async"
						>
					</div>
					<div class="project-item__content">
						<div class="project-item__header">
							<div class="project-item__title-wrap">
								<h3 class="project-item__title">COASTAL RESIDENCE</h3>
								<span class="project-item__arrow" aria-hidden="true">↗</span>
							</div>
							<span class="project-item__year">2026</span>
						</div>
						<div class="project-item__meta">
							<span>HERMANUS</span>
							<span class="project-item__bullet" aria-hidden="true">•</span>
							<span>COASTAL SANCTUARY</span>
						</div>
					</div>
			</article>

			<!-- Project 04 -->
			<article class="project-item project-item--offset-right image-reveal reveal">
					<div class="project-item__media project-item__media--landscape">
						<span class="project-item__index-tag">04</span>
						<img
							src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=1400&q=80"
							srcset="https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=768&q=80 768w,
							        https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=1400&q=80 1400w"
							sizes="(max-width: 1024px) 100vw, 65vw"
							alt="Signal Hill Pavilion - Sculptural architecture on Signal Hill Cape Town"
							class="project-item__img"
							width="1400"
							height="875"
							loading="lazy"
							decoding="async"
						>
					</div>
					<div class="project-item__content">
						<div class="project-item__header">
							<div class="project-item__title-wrap">
								<h3 class="project-item__title">SIGNAL HILL PAVILION</h3>
								<span class="project-item__arrow" aria-hidden="true">↗</span>
							</div>
							<span class="project-item__year">2025</span>
						</div>
						<div class="project-item__meta">
							<span>CAPE TOWN</span>
							<span class="project-item__bullet" aria-hidden="true">•</span>
							<span>CIVIC & CULTURAL PAVILION</span>
						</div>
					</div>
			</article>
		</div>
	</div>
</section>

<!-- 3.5 ARCHITECTURAL 3D INTERLUDE (TECTONIC MASSING STUDY) -->
<section class="section section-interlude-3d" id="interlude-3d" aria-labelledby="interlude-heading">
	<div class="site-container">
		<header class="section-header section-header--split reveal">
			<h2 id="interlude-heading" class="section-label">
				<span class="section-label__num">SPATIAL FORM</span>
				<span class="section-label__bar" aria-hidden="true"></span>
				<span>TECTONIC STUDY</span>
			</h2>
			<div>
				<p class="text-lead">
					An exploration of monolithic volumes, structural cantilever, and spatial voids — studying how mass and daylight interact across architectural scale.
				</p>
			</div>
		</header>

		<div class="interlude-3d__stage reveal">
			<!-- Static Architectural Blueprint / Massing Fallback -->
			<div class="interlude-3d__fallback" aria-hidden="true">
				<svg class="interlude-3d__svg-fallback" viewBox="0 0 800 500" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect width="800" height="500" fill="#E8E5DC"/>
					<!-- Architectural Grid & Datum Lines -->
					<line x1="80" y1="50" x2="80" y2="450" stroke="#B8B2A7" stroke-opacity="0.35" stroke-dasharray="4 4"/>
					<line x1="720" y1="50" x2="720" y2="450" stroke="#B8B2A7" stroke-opacity="0.35" stroke-dasharray="4 4"/>
					<line x1="80" y1="400" x2="720" y2="400" stroke="#171717" stroke-width="1.5"/>
					<line x1="80" y1="120" x2="720" y2="120" stroke="#B8B2A7" stroke-opacity="0.25"/>
					<line x1="80" y1="260" x2="720" y2="260" stroke="#B8B2A7" stroke-opacity="0.25"/>

					<!-- Axonometric Architectural Volumes -->
					<polygon points="260,340 460,250 560,290 360,380" fill="#ded9d0" stroke="#171717" stroke-width="1.5"/>
					<polygon points="260,340 360,380 360,400 260,360" fill="#b8b2a7" stroke="#171717" stroke-width="1.5"/>
					<polygon points="360,380 560,290 560,310 360,400" fill="#8c867d" stroke="#171717" stroke-width="1.5"/>

					<!-- Cantilever Upper Volume -->
					<polygon points="320,240 520,150 640,200 440,290" fill="#F1EFE9" stroke="#171717" stroke-width="1.5"/>
					<polygon points="320,240 440,290 440,330 320,280" fill="#c2bcb2" stroke="#171717" stroke-width="1.5"/>
					<polygon points="440,290 640,200 640,240 440,330" fill="#9e988f" stroke="#171717" stroke-width="1.5"/>

					<!-- Vertical Shear Core Volume -->
					<polygon points="220,280 300,240 300,380 220,400" fill="#7a756c" stroke="#171717" stroke-width="1.5"/>
					<polygon points="220,280 260,220 340,180 300,240" fill="#ded9d0" stroke="#171717" stroke-width="1.5"/>
					<polygon points="300,240 340,180 340,340 300,380" fill="#69645d" stroke="#171717" stroke-width="1.5"/>

					<!-- Annotation / Dimension Details -->
					<text x="96" y="80" font-family="JetBrains Mono, monospace" font-size="11" fill="#69645D" letter-spacing="0.1em">DATUM ELEVATION +14.250m</text>
					<text x="96" y="425" font-family="JetBrains Mono, monospace" font-size="11" fill="#69645D" letter-spacing="0.1em">DATUM LEVEL 0.000m // AXONOMETRIC MASSING STUDY</text>
					<text x="540" y="80" font-family="JetBrains Mono, monospace" font-size="11" fill="#B65C32" letter-spacing="0.1em">NORTH/FORM // SPATIAL LAB</text>
				</svg>
			</div>

			<!-- Dynamic 3D WebGL Canvas Container -->
			<div class="interlude-3d__canvas-container" id="interlude-canvas-container" aria-hidden="true"></div>

			<!-- 3D Overlay Controls & Meta -->
			<div class="interlude-3d__meta" aria-hidden="true">
				<div class="interlude-3d__meta-item">
					<span class="interlude-3d__meta-label">GEOMETRY</span>
					<span class="interlude-3d__meta-val">MONOLITHIC CONCRETE / TECTONIC VOID</span>
				</div>
				<div class="interlude-3d__meta-item">
					<span class="interlude-3d__meta-label">PERSPECTIVE</span>
					<span class="interlude-3d__meta-val">AXONOMETRIC 40° // ROTATE VIA POINTER & SCROLL</span>
				</div>
				<div class="interlude-3d__meta-item">
					<span class="interlude-3d__meta-label">COORDINATES</span>
					<span class="interlude-3d__meta-val">33.9249° S, 18.4241° E</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 4. STUDIO STATEMENT (DARK TYPOGRAPHIC MOMENT) -->
<section class="section statement-section theme-dark" id="studio" aria-labelledby="statement-heading">
	<div class="site-container">
		<div class="statement-content">
			<div class="section-label reveal">
				<span class="section-label__num">STUDIO PHILOSOPHY</span>
				<span class="section-label__bar" aria-hidden="true"></span>
				<span>NORTH/FORM PRACTICE</span>
			</div>

			<h2 id="statement-heading" class="statement-text reveal">
				<span class="statement-line statement-line--1">WE DON'T JUST</span>
				<span class="statement-line statement-line--2">CONSTRUCT BUILDINGS.</span>
				<span class="statement-line statement-line--gap" aria-hidden="true"></span>
				<span class="statement-line statement-line--3">WE SHAPE HOW PEOPLE</span>
				<span class="statement-line statement-line--4">EXPERIENCE SPACE.</span>
			</h2>

			<div class="statement-body-grid reveal">
				<div class="statement-lead">
					"Every line drawn must respond directly to topography, climatic light, and structural permanence."
				</div>
				<div class="statement-desc">
					<p>
						Founded in Cape Town, NORTH/FORM merges architectural exploration with precision construction engineering. We reject the divide between the design studio and the building site, taking full accountability from first sketch to final handover.
					</p>
					<p>
						Our work explores the honest expression of materials — off-shutter concrete, regional stone, blackened steel, and sustainable timber — creating enduring architectural forms rooted in the southern hemisphere.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 5. STATISTICS -->
<section class="section section--sm" aria-labelledby="statistics-heading">
	<div class="site-container">
		<h2 id="statistics-heading" class="screen-reader-text"><?php esc_html_e( 'Studio statistics and track record', 'northform' ); ?></h2>
		<div class="stats-grid reveal">
			<div class="stat-item">
				<div class="stat-item__number">18</div>
				<div class="stat-item__label">YEARS EXPERIENCE</div>
			</div>

			<div class="stat-item">
				<div class="stat-item__number">42</div>
				<div class="stat-item__label">COMPLETED PROJECTS</div>
			</div>

			<div class="stat-item">
				<div class="stat-item__number">11</div>
				<div class="stat-item__label">DESIGN AWARDS</div>
			</div>

			<div class="stat-item">
				<div class="stat-item__number">06</div>
				<div class="stat-item__label">ACTIVE PROJECTS</div>
			</div>
		</div>
	</div>
</section>

<!-- 6. SERVICES -->
<section class="section" id="services" aria-labelledby="services-heading">
	<div class="site-container">
		<!-- Section Header -->
		<header class="section-header section-header--split reveal">
			<h2 id="services-heading" class="section-label">
				<span class="section-label__num">02</span>
				<span class="section-label__bar" aria-hidden="true"></span>
				<span>DISCIPLINES & SERVICES</span>
			</h2>
			<div>
				<p class="text-lead">
					An integrated practice providing architectural design, structural engineering, and end-to-end master construction.
				</p>
			</div>
		</header>

		<!-- Architectural Service List -->
		<div class="services-list reveal">
			<!-- Floating Decorative Preview Image (Desktop Only) -->
			<div class="services-floating-preview" aria-hidden="true">
				<img src="" alt="" class="services-floating-preview__img" loading="lazy">
			</div>

			<!-- Service 01 -->
			<article class="service-row" data-service-image="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=600&q=80" data-service-alt="Architectural concept detailing">
				<div class="service-row__header">
					<span class="service-row__index">01</span>
					<div class="service-row__title-wrap">
						<h3 class="service-row__title">ARCHITECTURE</h3>
						<span class="service-row__arrow" aria-hidden="true">→</span>
					</div>
				</div>
				<div class="service-row__details">
					<div class="service-row__desc">
						Rigorous concept design, site environmental modeling, municipal council approvals, and uncompromising technical construction documentation.
					</div>
					<div class="service-row__tags">
						<span class="service-row__tag-item">Residential & Commercial Concept</span>
						<span class="service-row__tag-item">Passive Environmental Design</span>
						<span class="service-row__tag-item">Statutory Approvals & Heritage</span>
						<span class="service-row__tag-item">Tectonic Detailing</span>
					</div>
				</div>
			</article>

			<!-- Service 02 -->
			<article class="service-row" data-service-image="https://images.unsplash.com/photo-1541888946425-d0fbb18086f6?auto=format&fit=crop&w=600&q=80" data-service-alt="Off-shutter concrete and construction site engineering">
				<div class="service-row__header">
					<span class="service-row__index">02</span>
					<div class="service-row__title-wrap">
						<h3 class="service-row__title">CONSTRUCTION</h3>
						<span class="service-row__arrow" aria-hidden="true">→</span>
					</div>
				</div>
				<div class="service-row__details">
					<div class="service-row__desc">
						Master construction execution with dedicated on-site engineering superintendents, specialist formwork craftsmen, and rigorous quality control.
					</div>
					<div class="service-row__tags">
						<span class="service-row__tag-item">Architectural Concrete Construction</span>
						<span class="service-row__tag-item">Structural Steel Fabrication</span>
						<span class="service-row__tag-item">Precision Masonry & Timber</span>
						<span class="service-row__tag-item">Turnkey Site Management</span>
					</div>
				</div>
			</article>

			<!-- Service 03 -->
			<article class="service-row" data-service-image="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=600&q=80" data-service-alt="Architectural timber joinery and interior curation">
				<div class="service-row__header">
					<span class="service-row__index">03</span>
					<div class="service-row__title-wrap">
						<h3 class="service-row__title">INTERIOR DESIGN</h3>
						<span class="service-row__arrow" aria-hidden="true">→</span>
					</div>
				</div>
				<div class="service-row__details">
					<div class="service-row__desc">
						Tactile material curation, bespoke architectural joinery, customized lighting design, and cohesive interior architectural environments.
					</div>
					<div class="service-row__tags">
						<span class="service-row__tag-item">Custom Joinery & Millwork</span>
						<span class="service-row__tag-item">Material & Finish Schedules</span>
						<span class="service-row__tag-item">Architectural Lighting Schemes</span>
						<span class="service-row__tag-item">FF&E Curation</span>
					</div>
				</div>
			</article>

			<!-- Service 04 -->
			<article class="service-row" data-service-image="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=600&q=80" data-service-alt="Programmatic contract and project management">
				<div class="service-row__header">
					<span class="service-row__index">04</span>
					<div class="service-row__title-wrap">
						<h3 class="service-row__title">PROJECT MANAGEMENT</h3>
						<span class="service-row__arrow" aria-hidden="true">→</span>
					</div>
				</div>
				<div class="service-row__details">
					<div class="service-row__desc">
						Transparent cost forecasting, procurement coordination, programmatic scheduling, and full contract administration from inception to occupation.
					</div>
					<div class="service-row__tags">
						<span class="service-row__tag-item">Cost Planning & Feasibility</span>
						<span class="service-row__tag-item">Contract Administration (JBCC)</span>
						<span class="service-row__tag-item">Timeline & Critical Path Auditing</span>
						<span class="service-row__tag-item">Occupancy Certification</span>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>

<!-- 7. TESTIMONIAL -->
<section class="section testimonial-section" aria-labelledby="testimonial-heading">
	<div class="site-container">
		<h2 id="testimonial-heading" class="screen-reader-text"><?php esc_html_e( 'Client endorsement', 'northform' ); ?></h2>
		<div class="testimonial-card reveal">
			<div class="section-label">
				<span class="section-label__num">CLIENT PERSPECTIVE</span>
				<span class="section-label__bar" aria-hidden="true"></span>
				<span>RESIDENTIAL COMMISSION</span>
			</div>

			<blockquote class="testimonial-quote">
				"NORTH/FORM understood that the project wasn't simply about constructing a house. It was about creating somewhere we wanted to spend the next twenty years."
			</blockquote>

			<div class="testimonial-author">
				<cite class="testimonial-author__name">DR. HELENA VOSLOO</cite>
				<span class="testimonial-author__role">THE CLIFF HOUSE / CLIFTON, CAPE TOWN</span>
			</div>
		</div>
	</div>
</section>

<!-- 8. CALL TO ACTION (CTA) -->
<section class="section cta-section" id="contact" aria-labelledby="cta-heading">
	<div class="site-container">
		<div class="cta-grid">
			<div class="cta-main reveal">
				<div class="section-label">
					<span class="section-label__num">COMMISSIONS</span>
					<span class="section-label__bar" aria-hidden="true"></span>
					<span>NEW PROJECTS</span>
				</div>

				<h2 id="cta-heading" class="cta-heading">
					HAVE A PROJECT<br>
					IN MIND?
				</h2>

				<div>
					<a href="mailto:studio@northform.co.za" class="link-arrow link-arrow--lg">
						<span class="link-arrow__text">START A CONVERSATION</span>
						<span class="link-arrow__icon" aria-hidden="true">→</span>
					</a>
				</div>
			</div>

			<div class="cta-contact-block reveal reveal-delay-1">
				<div class="cta-contact-item">
					<span class="cta-contact-label">Direct Studio Email</span>
					<a href="mailto:studio@northform.co.za" class="cta-contact-value">studio@northform.co.za</a>
				</div>

				<div class="cta-contact-item">
					<span class="cta-contact-label">Studio Telephone</span>
					<a href="tel:+27214249800" class="cta-contact-value">+27 (0)21 424 9800</a>
				</div>

				<div class="cta-contact-item">
					<span class="cta-contact-label">Studio Location</span>
					<span class="cta-contact-value cta-contact-value--address">
						Kloof Street, Gardens<br>
						Cape Town, South Africa
					</span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Contextual Project Cursor (Desktop Pointer Only) -->
<div class="project-cursor" id="project-cursor" aria-hidden="true">
	<span class="project-cursor__text">VIEW<br>PROJECT</span>
</div>

<?php
get_footer();
