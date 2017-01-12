<?php
/*
Template Name: Storyline
*/
?>

<?php get_header(); ?>
	
	<div id="content" class="row">
			<main id="storytellers" class="medium-12 columns">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				    <header class="article-header">
						<h1 class="page-title"><?php the_title() ?></h1>
					</header>

					<section class="entry-content">
						<?php the_content() ?>
					</section>
			    
			    <?php endwhile; endif; ?>

				<div class="row">

					<?php for ($i = 0; $i < 6; $i++) { ?>

						<div class="large-4 medium-6 small-12 columns">
							
							<?php get_template_part( 'parts/loop', 'storyline' ); ?>

						</div> <!-- end .columns -->

					<?php } ?>

				</div> <!-- end .row -->

			</main> <!-- end #storytellers -->
		</div> <!-- end #content -->

<?php get_footer(); ?>
