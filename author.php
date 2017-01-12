<?php get_header(); ?>
			
<div id="content" class="background-white">

	<div id="inner-content" class="row">

		<main id="main" class="author-page medium-12 columns" role="main">
			
			<?php get_template_part( 'parts/loop', 'author' ); ?>

		</main> <!-- end #main -->

		<section id="author-posts" class="medium-12 columns">
			
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    					
		    <?php endwhile; else : ?>
		
		   		<?php get_template_part( 'parts/content', 'missing' ); ?>

		    <?php endif; ?>

		</section><!-- end #author-posts -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>