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
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			</header><!-- .page-header -->
			<section class="list-cours">
				<?php
				/* Start the Loop */
				$precedent = "XXXXXX";
				while ( have_posts() ) :
					the_post();
					$titre_grand = get_the_title();
					$session = substr($titre_grand, 4, 1);
					$nbHeure = substr($titre_grand, -4, 3);
					$titre = substr($titre_grand, 8, -6);
					$sigle = substr($titre_grand, 0, 7);
					$typeCours = get_field('type_de_cours'); 
					if ($precedent != $typeCours): ?>
						<?php if($precedent != "XXXXXX"): ?>
							</section>
						<?php endif ?>
						<h1><p><?php echo $typeCours ?></p></h1>
					<section>
						
					<?php endif?>
					<article class="<?php echo $typeCours ?>">
						<a href="<?php echo get_permalink(); ?>"><?php echo $titre; ?></a>
						<p><?php echo $sigle . " - " . $nbHeure . " - " . $typeCours; ?></p>
						<p>Session : <?php echo $session; ?></p>
					</article>
				<?php 
				$precedent = $typeCours;
				endwhile; ?> 
			</section>
		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
