<?php
/*
Template Name: Homepage
*/

// Setup query for event loop
$event_args = array( 'post_type' => 'event', 'posts_per_page' => 6 );
$event_loop = new WP_Query( $event_args );

// Setup query for noticeboard loop
$noticeboard_args = array( 'posts_per_page' => 6 );
$noticeboard_loop = new WP_Query( $noticeboard_args );
?>

<?php get_header(); ?>
			
	<div id="homepage">
		
		<div class="hero-image section-background margin-bottom">
			<div class="row">

				<article id="hero" class="page-section medium-10 medium-offset-1 columns">

					<header class="hero-header">
						<h1><small>We are dedicated to</small><br /> preserving, practising and promoting the art of Storytelling</h1>
					</header>

					<section class="hero-content">
						<p>The NZ Guild of Storytellers is a vibrant community of storytellers who share news, ideas and wisdom to preserve the art of storytelling in New Zealand and abroad.</p>
					</section>

					<section class="hero-action">
						<a href="#" class="secondary xlarge button margin-right">Join the guild <i class="fa fa-users" aria-hidden="true"></i></a>
						<a href="#" class="primary xlarge button">Learn more <i class="fa fa-search" aria-hidden="true"></i></a>
						<p class="text">Already a member? <a href="#">Log in to your account.</a></p>
					</section>

				</article> <!-- end #hero -->

			</div> <!-- end .row -->
		</div> <!-- end .hero-image -->



		<div class="row">
			<article id="storytellers" class="page-section medium-12 columns">

				<header class="section-header">
					<h1 class="small section-title divider">Featured storytellers</h1>
				</header>

				<div class="row small-up-1 medium-up-2 large-up-3" data-equalizer data-equalize-by-row="true">

					<?php for ($i = 0; $i < 6; $i++) { ?>

						<div class="column">
							
							<?php get_template_part( 'parts/loop', 'storyteller' ); ?>

						</div> <!-- end .columns -->

					<?php } ?>

				</div> <!-- end .row -->

			</article> <!-- end #storytellers -->
		</div> <!-- end .row -->

		<?php if ( $event_loop->have_posts() ) { ?>

		<div class="row">
			<article id="events" class="page-section medium-12 columns">

				<header class="section-header">
					<h1 class="small section-title divider">Upcoming events</h1>
				</header>

				<div class="row">

					<?php while ( $event_loop->have_posts() ) : $event_loop->the_post(); ?>

						<div class="medium-12 columns">
							
							<?php get_template_part( 'parts/loop', 'event' ); ?>

						</div> <!-- end .columns -->

					<?php endwhile; ?>

				</div> <!-- end .row -->

			</article> <!-- end #events -->
		</div> <!-- end .row -->
		
		<?php } ?>
		
		<?php if ( $noticeboard_loop->have_posts() ) { ?>

		<div class="row">
			<article id="noticeboard" class="page-section medium-12 columns">
				
				<header class="section-header">
					<h1 class="small section-title divider">Public noticeboard</h1>
				</header>

				<div class="row">

					<div class="medium-12 columns">
						<?php while ( $noticeboard_loop->have_posts() ) : $noticeboard_loop->the_post(); ?>

							<?php get_template_part( 'parts/loop', 'archive' ); ?>

						<?php endwhile; ?>
					</div> <!-- end .columns -->

				</div> <!-- end .row -->

			</article>
		</div> <!-- end .row -->

		<?php } ?>

	</div> <!-- end #homepage -->

<?php get_footer(); ?>
