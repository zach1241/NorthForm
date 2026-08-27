<?php
/**
 * NORTH/FORM — Homepage Template (Phase 1 Static Frontend)
 *
 * Implements the full editorial design specification for NORTH/FORM.
 * Structured with semantic HTML5 sections ready for future ACF Gutenberg block conversion.
 *
 * @package NorthForm
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<!-- 1. HERO SECTION -->
<section class="section hero-section" id="hero" aria-labelledby="hero-title">
	<div class="site-container">
		<div class="hero-grid">
			<div class="hero-header-block reveal">
				<div class="hero-eyebrow">
					<span>NORTH<span style="color: var(--color-burnt-orange);">/</span>FORM</span>
					<span style="margin: 0 var(--space-2); color: var(--color-stone);">—</span>
					<span>ARCHITECTURE & CONSTRUCTION STUDIO</span>
				</div>

				<h1 id="hero-title" class="hero-title">
					WE BUILD<br>
					SPACES THAT<br>
					OUTLIVE US.
				</h1>
			</div>

			<div class="hero-meta-row reveal reveal-delay-1">
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
<section class="section section--no-top featured-image-section" aria-label="<?php esc_attr_e( 'Featured Architecture Showcase', 'northform' ); ?>">
	<div class="site-container">
		<figure class="featured-media reveal">
			<img 
				src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=80" 
				srcset="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=768&q=80 768w,
				        https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80 1200w,
				        https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=80 1600w,
				        https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2000&q=80 2000w"
				sizes="(max-width: 768px) 100vw, (max-width: 1440px) 92vw, 1440px"
				alt="The Cliff House by NORTH/FORM - Monolithic concrete architecture overlooking the Atlantic Ocean in Clifton, Cape Town" 
				class="featured-media__img"
				width="1600" 
				height="900" 
				fetchpriority="high"
				decoding="async"
			>
		</figure>
		<figcaption class="featured-media__caption reveal reveal-delay-1">
			<span>00 / THE CLIFF HOUSE</span>
			<span>CLIFTON, CAPE TOWN — 2026</span>
		</figcaption>
	</div>
</section>

<!-- 3. SELECTED PROJECTS -->
<section class="section" id="projects" aria-labelledby="projects-heading">
	<div class="site-container">
		<!-- Section Header -->
		<header class="section-header section-header--split reveal">
			<div class="section-label">
				<span class="section-label__num">01</span>
				<span class="section-label__bar" aria-hidden="true"></span>
				<span id="projects-heading">SELECTED PROJECTS</span>
			</div>
			<div>
				<p class="text-lead">
					A curated survey of bespoke residential and civic structures engineered with tectonic discipline in the Western Cape.
				</p>
			</div>
		</header>

		<!-- Staggered Editorial Showcase -->
		<div class="projects-showcase">
			<!-- Project 01 -->
			<article class="project-item reveal">
				<a href="#projects" class="project-item__link">
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
							<h3 class="project-item__title">ATLANTIC HOUSE</h3>
							<span class="project-item__year">2026</span>
						</div>
						<div class="project-item__meta">
							<span>CAPE TOWN</span>
							<span class="project-item__bullet" aria-hidden="true">•</span>
							<span>RESIDENTIAL ARCHITECTURE & BUILD</span>
						</div>
					</div>
				</a>
			</article>

			<!-- Project 02 -->
			<article class="project-item reveal">
				<a href="#projects" class="project-item__link">
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
							<h3 class="project-item__title">CONCRETE HOUSE</h3>
							<span class="project-item__year">2025</span>
						</div>
						<div class="project-item__meta">
							<span>STELLENBOSCH</span>
							<span class="project-item__bullet" aria-hidden="true">•</span>
							<span>WINELANDS RESIDENTIAL ESTATE</span>
						</div>
					</div>
				</a>
			</article>

			<!-- Project 03 -->
			<article class="project-item reveal">
				<a href="#projects" class="project-item__link">
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
							<h3 class="project-item__title">COASTAL RESIDENCE</h3>
							<span class="project-item__year">2026</span>
						</div>
						<div class="project-item__meta">
							<span>HERMANUS</span>
							<span class="project-item__bullet" aria-hidden="true">•</span>
							<span>COASTAL SANCTUARY</span>
						</div>
					</div>
				</a>
			</article>

			<!-- Project 04 -->
			<article class="project-item reveal">
				<a href="#projects" class="project-item__link">
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
							<h3 class="project-item__title">SIGNAL HILL PAVILION</h3>
							<span class="project-item__year">2025</span>
						</div>
						<div class="project-item__meta">
							<span>CAPE TOWN</span>
							<span class="project-item__bullet" aria-hidden="true">•</span>
							<span>CIVIC & CULTURAL PAVILION</span>
						</div>
					</div>
				</a>
			</article>
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
				WE DON'T JUST<br>
				CONSTRUCT BUILDINGS.<br><br>
				WE SHAPE HOW PEOPLE<br>
				EXPERIENCE SPACE.
			</h2>

			<div class="statement-body-grid reveal">
				<div class="statement-lead">
					"Every line drawn must respond directly to topography, climatic light, and structural permanence."
				</div>
				<div class="statement-desc">
					<p>
						Founded in Cape Town, NORTH/FORM merges architectural exploration with precision construction engineering. We reject the divide between the design studio and the building site, taking full accountability from first sketch to final handover.
					</p>
					<p style="margin-top: var(--space-4);">
						Our work explores the honest expression of materials — off-shutter concrete, regional stone, blackened steel, and sustainable timber — creating enduring architectural forms rooted in the southern hemisphere.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 5. STATISTICS -->
<section class="section section--sm" aria-label="<?php esc_attr_e( 'Studio Statistics & Track Record', 'northform' ); ?>">
	<div class="site-container">
		<div class="stats-grid reveal">
			<div class="stat-item">
				<div class="stat-item__number" data-stat-target="18">18</div>
				<div class="stat-item__label">YEARS EXPERIENCE</div>
			</div>

			<div class="stat-item">
				<div class="stat-item__number" data-stat-target="42">42</div>
				<div class="stat-item__label">COMPLETED PROJECTS</div>
			</div>

			<div class="stat-item">
				<div class="stat-item__number" data-stat-target="11">11</div>
				<div class="stat-item__label">DESIGN AWARDS</div>
			</div>

			<div class="stat-item">
				<div class="stat-item__number" data-stat-target="6" data-stat-pad="true">06</div>
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
			<div class="section-label">
				<span class="section-label__num">02</span>
				<span class="section-label__bar" aria-hidden="true"></span>
				<span id="services-heading">DISCIPLINES & SERVICES</span>
			</div>
			<div>
				<p class="text-lead">
					An integrated practice providing architectural design, structural engineering, and end-to-end master construction.
				</p>
			</div>
		</header>

		<!-- Architectural Service List -->
		<div class="services-list reveal">
			<!-- Service 01 -->
			<div class="service-row">
				<div class="service-row__header">
					<span class="service-row__index">01</span>
					<h3 class="service-row__title">ARCHITECTURE</h3>
					<div class="service-row__action" aria-hidden="true">
						<span class="service-row__arrow">→</span>
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
			</div>

			<!-- Service 02 -->
			<div class="service-row">
				<div class="service-row__header">
					<span class="service-row__index">02</span>
					<h3 class="service-row__title">CONSTRUCTION</h3>
					<div class="service-row__action" aria-hidden="true">
						<span class="service-row__arrow">→</span>
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
			</div>

			<!-- Service 03 -->
			<div class="service-row">
				<div class="service-row__header">
					<span class="service-row__index">03</span>
					<h3 class="service-row__title">INTERIOR DESIGN</h3>
					<div class="service-row__action" aria-hidden="true">
						<span class="service-row__arrow">→</span>
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
			</div>

			<!-- Service 04 -->
			<div class="service-row">
				<div class="service-row__header">
					<span class="service-row__index">04</span>
					<h3 class="service-row__title">PROJECT MANAGEMENT</h3>
					<div class="service-row__action" aria-hidden="true">
						<span class="service-row__arrow">→</span>
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
			</div>
		</div>
	</div>
</section>

<!-- 7. TESTIMONIAL -->
<section class="section testimonial-section" aria-label="<?php esc_attr_e( 'Client Endorsement', 'northform' ); ?>">
	<div class="site-container">
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
					<span class="cta-contact-value" style="font-size: var(--text-base); color: var(--text-secondary);">
						Kloof Street, Gardens<br>
						Cape Town, South Africa
					</span>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
