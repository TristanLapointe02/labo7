<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

get_header();
?>

	<section class="carrousel-2">
		<div><p>Techniques</p></div>
		<div><p>d'intégration</p></div>
		<div><p>multimédia</p></div>
	</section>
	<div id="boutonsSlider">
		<button id='un'>1</button>
		<button id='deux'>2</button>
		<button id='trois'>3</button>
	</div>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			</header><!-- .page-header -->
			<section class="list-cours">
				<?php
				/* Start the Loop */
				/* BOUCLE AFFICHANT LA LISTE DE COURS AVEC DIVERS INFORMATIONS */
				$precedent = "XXXXXX";
				while ( have_posts() ) :
					the_post();
					
					convertir_tableau($tPropriété);
					if ($precedent != $tPropriété['typeCours']): ?>
						<?php if($precedent != "XXXXXX"): ?>
						</section>
						<?php endif ?>
						<h1><p><?php echo $tPropriété['typeCours'] ?></p></h1>
					<section>
					<?php endif?>
				<?php 
				get_template_part( 'template-parts/content', 'bloc' );
				$precedent = $tPropriété['typeCours'];
				endwhile; ?> 
			</section>
		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertir_tableau(&$tPropriété) {
	$titre_grand = get_the_title();
	$tPropriété['session'] = substr($titre_grand, 4, 1);
	$tPropriété['nbHeure'] = substr($titre_grand, -4, 3);
	$tPropriété['titre'] = substr($titre_grand, 8, -6);
	$tPropriété['sigle'] = substr($titre_grand, 0, 7);
	$tPropriété['typeCours'] = get_field('type_de_cours'); 
					
}
