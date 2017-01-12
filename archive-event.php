<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
		
		    <main id="main" class="medium-12 columns" role="main">
			    
		    	<header class="page-header">
		    		<h1 class="page-title">Events</h1>
					<?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
		    	</header>

				<div class="row">
			    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				 
						<div class="medium-12 columns">

							<?php get_template_part( 'parts/loop', 'event' ); ?>

						</div> <!-- end .columns -->
					    
					<?php endwhile; ?>	

						<?php joints_page_navi(); ?>
						
					<?php else : ?>
												
						<?php get_template_part( 'parts/content', 'missing' ); ?>
							
					<?php endif; ?>
				</div> <!-- end .row -->
		
			</main> <!-- end #main -->
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>