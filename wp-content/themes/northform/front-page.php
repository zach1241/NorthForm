<?php
/**
 * NORTH/FORM — Art Direction V2 Homepage.
 *
 * Static editorial content remains here until the block/ACF phase. Image
 * wrappers are stable so placeholders can later use attachment IDs unchanged.
 *
 * @package NorthForm
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>
<section class="hero-v2" id="hero" aria-labelledby="hero-title">
	<div class="hero-v2__image" aria-hidden="true">
		<img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2000&q=85" srcset="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=82 900w, https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1400&q=85 1400w, https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2000&q=85 2000w" sizes="100vw" alt="" width="2000" height="1333" fetchpriority="high" decoding="async">
	</div>
	<div class="hero-v2__shade" aria-hidden="true"></div>
	<div class="hero-v2__fallback-massing" aria-hidden="true">
		<span class="massing-block massing-block--one"></span><span class="massing-block massing-block--two"></span><span class="massing-block massing-block--three"></span><span class="massing-block massing-block--accent"></span>
	</div>
	<div class="hero-v2__webgl" data-hero-3d aria-hidden="true"></div>
	<div class="hero-v2__content site-container">
		<p class="hero-v2__eyebrow">Architecture + Construction <span>Cape Town / 34.0° S</span></p>
		<h1 id="hero-title" class="hero-v2__title"><span>We build</span><span>spaces that</span><span>outlive us.</span></h1>
		<div class="hero-v2__footer">
			<p>Designing from first line<br>to final structure.</p>
			<a class="link-arrow hero-v2__project-link" href="#featured-project"><span class="link-arrow__text">Selected work</span><span class="link-arrow__icon" aria-hidden="true">↓</span></a>
			<p class="hero-v2__edition">N/F — 2026<br>Selected practice</p>
		</div>
	</div>
</section>

<section class="project-overture" id="featured-project" aria-labelledby="featured-title">
	<div class="project-overture__intro site-container reveal">
		<p class="editorial-index"><span>01</span> Selected work</p>
		<div class="project-overture__heading"><h2 id="featured-title">The Cliff<br>House</h2><p>A monolithic coastal residence shaped by Atlantic weather, steep topography and the measured weight of concrete.</p></div>
	</div>
	<figure class="project-overture__hero masked-media reveal">
		<img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=2000&q=85" srcset="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=82 800w, https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1400&q=85 1400w, https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=2000&q=85 2000w" sizes="100vw" alt="The Cliff House, a concrete residence overlooking the Atlantic Ocean" width="2000" height="1250" loading="lazy" decoding="async">
	</figure>
	<div class="project-overture__details site-container reveal">
		<dl class="project-facts"><div><dt>Place</dt><dd>Clifton, Cape Town</dd></div><div><dt>Type</dt><dd>Residence / Build</dd></div><div><dt>Status</dt><dd>Completed 2026</dd></div></dl>
		<blockquote><p>“The house is conceived as inhabited geology: protected from the mountain, open to the horizon.”</p><footer>NORTH/FORM — Design premise</footer></blockquote>
	</div>
</section>

<section class="selected-works" id="projects" aria-labelledby="projects-title">
	<header class="selected-works__header site-container reveal"><p class="editorial-index"><span>02</span> Selected works</p><h2 id="projects-title">Structures<br>of place.</h2><p>Three studies in material, light and permanence across the Western Cape.</p></header>
	<article class="case-study case-study--atlantic reveal" aria-labelledby="atlantic-title">
		<figure class="case-study__primary masked-media"><img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1800&q=84" alt="Atlantic House with concrete and timber volumes" width="1800" height="1200" loading="lazy" decoding="async"></figure>
		<div class="case-study__copy"><p class="case-study__number">01 / 03</p><h3 id="atlantic-title">Atlantic House</h3><p>A sheltered sequence of courtyards frames the sea while tempering the Cape’s prevailing wind.</p><p class="case-study__meta">Cape Town · Residential · 2026</p></div>
	</article>
	<article class="case-study case-study--concrete reveal" aria-labelledby="concrete-title">
		<div class="case-study__copy"><p class="case-study__number">02 / 03</p><h3 id="concrete-title">Concrete House</h3><p>Off-shutter planes, local stone and filtered daylight give weight to a quiet Winelands pavilion.</p><p class="case-study__meta">Stellenbosch · Residential · 2025</p></div>
		<figure class="case-study__primary masked-media"><img src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1600&q=84" alt="Concrete House interior opening onto the landscape" width="1600" height="2000" loading="lazy" decoding="async"></figure>
		<figure class="case-study__detail masked-media"><img src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=1000&q=82" alt="Detail of concrete, stone and glazing" width="1000" height="750" loading="lazy" decoding="async"></figure>
	</article>
	<article class="case-study case-study--coastal reveal" aria-labelledby="coastal-title">
		<figure class="case-study__primary masked-media"><img src="https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&w=2000&q=84" alt="Coastal Residence extending horizontally across its site" width="2000" height="1125" loading="lazy" decoding="async"></figure>
		<div class="case-study__copy"><p class="case-study__number">03 / 03</p><h3 id="coastal-title">Coastal Residence</h3><p>A low datum follows the land, balancing protected internal courts with long views toward Walker Bay.</p><p class="case-study__meta">Hermanus · Coastal retreat · 2026</p></div>
	</article>
</section>

<section class="manifesto theme-dark" id="studio" aria-labelledby="manifesto-title">
	<div class="manifesto__image masked-media reveal"><img src="https://images.unsplash.com/photo-1511818966892-d7d671e672a2?auto=format&fit=crop&w=1400&q=82" alt="Close detail of board-marked architectural concrete" width="1400" height="1750" loading="lazy" decoding="async"></div>
	<div class="manifesto__content reveal"><p class="editorial-index"><span>03</span> Studio philosophy</p><h2 id="manifesto-title">One practice.<br>From line<br>to structure.</h2><p class="manifesto__lead">We reject the divide between the design studio and the building site.</p><p class="manifesto__body">NORTH/FORM brings architectural exploration and construction precision into one accountable process—responding directly to topography, climatic light and the honest expression of materials.</p>
		<div class="proof-points" aria-label="Studio track record"><p><strong>18</strong><span>Years of practice</span></p><p><strong>42</strong><span>Completed works</span></p><p><strong>11</strong><span>Design awards</span></p></div>
	</div>
</section>

<section class="practice" id="services" aria-labelledby="practice-title"><div class="site-container">
	<header class="practice__header reveal"><p class="editorial-index"><span>04</span> Integrated practice</p><h2 id="practice-title">A continuous<br>act of making.</h2><p>One team holds the architectural intent from first sketch through construction and occupation.</p></header>
	<div class="practice__diagram reveal"><p class="practice__core">NORTH<span class="brand-slash">/</span>FORM <small>Design integrity<br>through delivery</small></p><ol class="practice__disciplines">
		<li><span>01</span><div><h3>Architecture</h3><p>Concept, environmental response and technical resolution.</p></div></li><li><span>02</span><div><h3>Construction</h3><p>Material craft, structural execution and quality control.</p></div></li><li><span>03</span><div><h3>Interiors</h3><p>Spatial continuity, joinery, light and tactile finishes.</p></div></li><li><span>04</span><div><h3>Project direction</h3><p>Cost, programme, procurement and accountable delivery.</p></div></li>
	</ol></div>
</div></section>

<section class="commission theme-dark" id="contact" aria-labelledby="commission-title"><div class="site-container">
	<p class="editorial-index reveal"><span>05</span> New commissions / 2027</p><h2 id="commission-title" class="reveal">Have a place<br>in mind?</h2>
	<div class="commission__details reveal"><a class="commission__email" href="mailto:studio@northform.co.za">studio@northform.co.za <span aria-hidden="true">↗</span></a><address>Kloof Street, Gardens<br>Cape Town, South Africa<br><a href="tel:+27214249800">+27 (0)21 424 9800</a></address></div>
</div></section>
<?php get_footer();
