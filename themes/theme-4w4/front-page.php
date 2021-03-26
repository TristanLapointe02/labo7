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

	<!-- <section class="carrousel-2">
		<article class="slide__conteneur">
			<div class="slide">
			<img width="150" height="150" src="http://localhost/4w4/wp-content/uploads/2021/03/multimedia_general-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
				<div class="slide__info">
					<p>582-4W4 - 90h - Web</p>
					<a href="http://localhost/4w4/2020/10/07/582-4w4-conception-dinterfaces-et-developpement-web/">Conception d’interfaces et développement Web</a>
					<p>Session : 4</p>
				</div>
			</div>
		</article>

		<article class="slide__conteneur">
			<div class="slide">
			<img width="150" height="150" src="http://localhost/4w4/wp-content/uploads/2021/03/multimedia_general-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
				<div class="slide__info">
					<p>582-4W4 - 90h - Web</p>
					<a href="http://localhost/4w4/2020/10/07/582-4w4-conception-dinterfaces-et-developpement-web/">Conception d’interfaces et développement Web</a>
					<p>Session : 4</p>
				</div>
			</div>
		</article>

		<article class="slide__conteneur">
			<div class="slide">
			<img width="150" height="150" src="http://localhost/4w4/wp-content/uploads/2021/03/multimedia_general-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
				<div class="slide__info">
					<p>582-4W4 - 90h - Web</p>
					<a href="http://localhost/4w4/2020/10/07/582-4w4-conception-dinterfaces-et-developpement-web/">Conception d’interfaces et développement Web</a>
					<p>Session : 4</p>
				</div>
			</div>
		</article>
	</section> 
	<section class="ctrl-carrousel">
		<input type="radio" name="rad-carrousel">
		<input type="radio" name="rad-carrousel">
		<input type="radio" name="rad-carrousel">
	</section>-->

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
						
						<?php endif; ?>
						<?php if($precedent == "Web"): ?>
							<section class="ctrl-carrousel">
								<?php echo $ctrl_radio?>
							</section>
						<?php endif; ?>
						<h1><p><?php echo $tPropriété['typeCours'] ?></p></h1>
						<section <?php echo ($tPropriété['typeCours'] == 'Web' ? 'class="carrousel-2"' : 'class="bloc"');?>>
						
					<?php endif; ?>
				<?php 
				if($tPropriété['typeCours'] == "Web"): 
					get_template_part( 'template-parts/content', 'carrousel' );
					$ctrl_radio .= '<input type="radio" name="rad-carrousel">';
				
				else:
				get_template_part( 'template-parts/content', 'bloc' );
				
				endif;
				
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
