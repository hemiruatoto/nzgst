<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

	    <main id="main" class="medium-12 columns" role="main">
	
		    <header class="page-header">
		    	<h1 class="page-title"><span><?php _e( 'Events:', 'jointswp' ); ?></span> <?php single_cat_title(); ?></h1>
		    	<div class="description"><p><?php echo get_the_archive_description();?> <a href="<?php echo get_post_type_archive_link( 'event' ); ?>">All Events &raquo;</a></p></div>
		    </header>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		 
				<!-- To see additional archive styles, visit the /parts directory -->
				<?php get_template_part( 'parts/loop', 'event' ); ?>
			    
			<?php endwhile; ?>	

				<?php joints_page_navi(); ?>
				
			<?php else : ?>
										
				<?php get_template_part( 'parts/content', 'missing' ); ?>
					
			<?php endif; ?>

	    </main> <!-- end #main -->
	    
	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>