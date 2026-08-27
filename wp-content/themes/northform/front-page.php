<?php
/**
 * NORTH/FORM — Art Direction V3 homepage.
 *
 * Images are temporary editorial placeholders. Each media wrapper preserves
 * the future layout when URLs are replaced by wp_get_attachment_image().
 *
 * @package NorthForm
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<section class="nf-hero" id="hero" aria-labelledby="hero-title">
	<div class="nf-hero__photo" aria-hidden="true">
		<img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2200&q=86" srcset="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=82 900w, https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1440&q=84 1440w, https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2200&q=86 2200w" sizes="100vw" width="2200" height="1467" alt="" fetchpriority="high" decoding="async">
	</div>
	<div class="nf-hero__wash" aria-hidden="true"></div>
	<div class="nf-hero__editorial-plane" aria-hidden="true"></div>
	<div class="nf-hero__static-massing" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i></div>
	<div class="nf-hero__webgl" data-hero-massing aria-hidden="true"></div>
	<div class="nf-hero__content site-container">
		<p class="nf-kicker nf-hero__kicker">Architecture + Construction <span>Cape Town / 34.0° S</span></p>
		<h1 class="nf-hero__title" id="hero-title"><span>We build</span><span>spaces that</span><span>outlive us.</span></h1>
		<div class="nf-hero__baseline">
			<p>Designing from first line<br>to final structure.</p>
			<a href="#featured-project">Selected work <span aria-hidden="true">↓</span></a>
			<p>N/F — 2026<br>Selected practice</p>
		</div>
	</div>
</section>

<section class="nf-opener" id="featured-project" aria-labelledby="cliff-title">
	<header class="nf-opener__header site-container reveal">
		<p class="nf-index"><span>01</span> Featured project</p>
		<h2 id="cliff-title">The Cliff<br>House</h2>
	</header>
	<div class="nf-opener__stage reveal">
		<figure class="nf-media nf-opener__media"><img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=2200&q=86" srcset="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=800&q=82 800w, https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1440&q=84 1440w, https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=2200&q=86 2200w" sizes="100vw" width="2200" height="1375" alt="The Cliff House, a monolithic concrete residence overlooking the Atlantic Ocean" loading="lazy" decoding="async"></figure>
		<div class="nf-opener__panel"><p>A monolithic coastal residence shaped by Atlantic weather, steep topography and the measured weight of concrete.</p><dl><div><dt>Place</dt><dd>Clifton, Cape Town</dd></div><div><dt>Type</dt><dd>Residence / Build</dd></div><div><dt>Year</dt><dd>2026</dd></div></dl></div>
	</div>
	<div class="nf-opener__after site-container reveal"><p>Inhabited geology—protected from the mountain, open to the horizon.</p><span>Architecture / Construction / Interiors</span></div>
</section>

<section class="nf-works" id="projects" aria-labelledby="works-title">
	<header class="nf-works__header site-container reveal"><p class="nf-index"><span>02</span> Selected works</p><h2 id="works-title">Structures<br>of place.</h2><p>Studies in material, light and permanence across the Western Cape.</p></header>

	<article class="nf-portrait-study reveal" aria-labelledby="concrete-title">
		<div class="nf-project-copy"><p class="nf-index"><span>01 / 02</span> Stellenbosch</p><h3 id="concrete-title">Concrete<br>House</h3><p>Off-shutter planes, local stone and filtered daylight give weight to a quiet Winelands pavilion.</p><small>Residential / 2025</small></div>
		<figure class="nf-media nf-portrait-study__primary"><img src="https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1600&q=85" width="1600" height="2000" alt="Concrete House interior opening toward the landscape" loading="lazy" decoding="async"></figure>
		<figure class="nf-media nf-portrait-study__detail"><img src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=1000&q=83" width="1000" height="750" alt="Concrete, stone and glazing detail" loading="lazy" decoding="async"></figure>
	</article>

	<article class="nf-datum reveal" aria-labelledby="coastal-title">
		<figure class="nf-media nf-datum__media"><img src="https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&w=2200&q=85" width="2200" height="1050" alt="Coastal Residence extending horizontally across its site" loading="lazy" decoding="async"></figure>
		<div class="nf-datum__rule" aria-hidden="true"></div>
		<div class="nf-project-copy"><p class="nf-index"><span>02 / 02</span> Hermanus</p><h3 id="coastal-title">Coastal Residence</h3><p>A low datum follows the land, balancing protected courts with long views toward Walker Bay.</p><small>Coastal retreat / 2026</small></div>
	</article>
</section>

<section class="nf-manifesto theme-dark" id="studio" aria-labelledby="studio-title">
	<div class="nf-manifesto__grid">
		<div class="nf-manifesto__type reveal"><p class="nf-index"><span>03</span> Studio philosophy</p><h2 id="studio-title">One practice.<br>From line<br>to structure.</h2><p class="nf-manifesto__lead">We reject the divide between the design studio and the building site.</p></div>
		<figure class="nf-media nf-manifesto__media reveal"><img src="https://images.unsplash.com/photo-1511818966892-d7d671e672a2?auto=format&fit=crop&w=1400&q=83" width="1400" height="1750" alt="Close detail of board-marked architectural concrete" loading="lazy" decoding="async"></figure>
		<div class="nf-manifesto__body reveal"><p>NORTH/FORM unites architectural exploration and construction precision in one accountable process—responding directly to topography, climatic light and the honest expression of materials.</p><div class="nf-proof" aria-label="Studio track record"><p><strong>18</strong><span>Years</span></p><p><strong>42</strong><span>Completed works</span></p><p><strong>11</strong><span>Awards</span></p></div></div>
	</div>
</section>

<section class="nf-practice" id="services" aria-labelledby="practice-title">
	<div class="site-container">
		<header class="nf-practice__header reveal"><p class="nf-index"><span>04</span> Integrated practice</p><h2 id="practice-title">A continuous<br>act of making.</h2><p>One team holds the architectural intent from sketch through construction and occupation.</p></header>
		<div class="nf-practice__field reveal">
			<p class="nf-practice__mark">NORTH<span>/</span>FORM <small>Design integrity<br>through delivery</small></p>
			<ol><li><span>01</span><div><h3>Architecture</h3><p>Concept, climate and technical resolution.</p></div></li><li><span>02</span><div><h3>Construction</h3><p>Material craft and structural execution.</p></div></li><li><span>03</span><div><h3>Interiors</h3><p>Spatial continuity, joinery and light.</p></div></li><li><span>04</span><div><h3>Project direction</h3><p>Cost, programme and accountable delivery.</p></div></li></ol>
		</div>
	</div>
</section>

<section class="nf-contact theme-dark" id="contact" aria-labelledby="contact-title"><div class="site-container">
	<p class="nf-index reveal"><span>05</span> New commissions / 2027</p><h2 id="contact-title" class="reveal">Have a place<br>in mind?</h2><div class="nf-contact__base reveal"><a href="mailto:studio@northform.co.za">studio@northform.co.za <span aria-hidden="true">↗</span></a><address>Kloof Street, Gardens<br>Cape Town, South Africa<br><a href="tel:+27214249800">+27 (0)21 424 9800</a></address></div>
</div></section>
<?php get_footer();
