<?php
	// Get the information for this post
	$prefix = '_events_';

	$title = get_the_title();

	$the_terms = get_the_terms( get_the_ID(), 'target_audience' );
	$audience_slug = $the_terms[0]->slug;
	$audience_name = $the_terms[0]->name;

	$description = get_post_meta( get_the_ID(), $prefix . 'description', true );
	$description = wpautop( $description );

	$booking_url = get_post_meta( get_the_ID(), $prefix . 'booking_url', true );

	$url = get_post_meta( get_the_ID(), $prefix . 'url', true );

	$image = get_post_meta( get_the_ID(), $prefix . 'image', true );

	if ($image) {
		$header_background = 'linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(\'' . $image . '\') no-repeat center center';
	} else {
		$header_background = 'linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(\'' . get_stylesheet_directory_uri() . '/assets/images/event-images/default-image.jpg\') no-repeat center center';
	}

	$dates = get_post_meta( get_the_ID(), $prefix . 'dates_and_times', true );

	$venue = get_post_meta( get_the_ID(), $prefix . 'venue', true );
	$street_address = get_post_meta( get_the_ID(), $prefix . 'street_address', true );
	$city = get_post_meta( get_the_ID(), $prefix . 'city', true );

	$email = get_post_meta( get_the_ID(), $prefix . 'email', true );
	$phone = get_post_meta( get_the_ID(), $prefix . 'phone', true );

	$tickets = get_post_meta( get_the_ID(), $prefix . 'tickets', true );

	// Get the urls for the previous and next event posts
	$next_event = get_permalink(get_adjacent_post(false,'',false));
	$previous_event = get_permalink(get_adjacent_post(false,'',true));
	$this_url = get_permalink();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
	<header class="article-header" style="background: <?php echo $header_background; ?>; background-size: cover;">
		<span class="post-type">Event</span>
		<h1 class="entry-title single-title" itemprop="headline"><?php echo $title; ?></h1>
		<p class="post-meta">Posted on <?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?> | <?php the_terms( $post->ID, 'target_audience' ); ?></p>
		
		<a href="<?php echo get_post_type_archive_link( 'event' ); ?>" class="back"><i class="fa fa-chevron-left"></i> All Events</a>
    </header> <!-- end article header -->
					
    <section class="entry-content row" itemprop="articleBody">
		<div class="large-4 medium-5 columns">

			<!-- Contact buttons -->
			<?php if ($booking_url || $phone || $email || $url) { ?>
				<address class="contact info-section">
					<?php if ($booking_url) { ?>
						<a href="<?php echo $booking_url; ?>" class="large expanded secondary button">Book Online <i class="fa fa-calendar-check-o"></i></a>
					<?php } else if ($phone) { ?>
						<a href="tel:<?php echo $phone; ?>" class="large expanded secondary button">Ph: <?php echo $phone; ?></a>
					<?php } ?>
					<?php if ($email) { ?>
						<a href="mailto: <?php echo $email; ?>" class="large expanded primary button">Send Email <i class="fa fa-paper-plane"></i></a>
					<?php } ?>
					<?php if ($url) { ?>
						<a href="<?php echo $url; ?>" class="large expanded primary button" target="_blank">Visit Website <i class="fa fa-globe"></i></a>
					<?php } ?>
				</address>
			<?php } ?>
			
			<!-- Dates and times -->
			<?php if ($dates) { ?>
				<section class="dates info-section">
					<h1>Dates &amp; times</h1>
					<ul>
						<?php foreach ($dates as $date) { ?>

							<li><?php echo date('j M Y @ g:i a', $date); ?></li>

						<?php } ?>
					</ul>
				</section>
			<?php } ?>

			<!-- Location -->
			<?php if ($venue || $street_address || $city) { ?>
				<address class="location info-section">
					<h1>Location</h1>
					<p>
						<?php if ($venue) { 
							echo $venue . ',<br />';
						} ?>

						<?php if ($street_address) { 
							echo $street_address . ',<br />';
						} ?>

						<?php if ($city) { 
							echo $city;
						} ?>
					</p>
				</address>
			<?php } ?>

			<!-- Target audience -->
			<?php if ($audience_name) { ?>
				<section class="dates info-section">
					<h1>Target Audience</h1>
					<p><?php echo $audience_name; ?></p>
				</section>
			<?php } ?>

			<!-- Contact details -->
			<?php if ($phone || $email) { ?>
				<address class="contact-details info-section">
					<h1>Contact Details</h1>
					<p>
						<?php if ($phone) { ?>
							<strong>Phone:</strong> <?php echo $phone; ?><br />
						<?php } ?>
						<?php if ($email) { ?>
							<strong>Email:</strong> <?php echo $email; ?>
						<?php } ?>
					</p>
				</address>
			<?php } ?>

		</div>

		<div class="large-8 medium-7 columns">

			<!-- Event description -->
			<?php if ($description) { ?>
				<section class="description info-section">
					<h1>About</h1>
					<?php echo $description; ?>
				</section>
			<?php } ?>

			<!-- R18 alert -->
			<?php if ($audience_slug == 'restricted-18-plus') { ?>

				<section class="target-audience info-section callout alert">
					<h1>Restricted 18+</h1>
					<p>This event is restricted to persons over 18 years old. Photo I.D. may be required upon entry.</p>
				</section>

			<?php } ?>

			<!-- Ticket prices -->
			<?php if ($tickets[0]['ticket_name'] != '') { ?>
				<section class="prices info-section">
					<h1>Prices</h1>
					<div class="row small-up-1 medium-up-1 large-up-2" data-equalizer data-equalizer data-equalize-by-row="true">

						<?php foreach ($tickets as $ticket) { ?>
							<div class="column">
								<div class="ticket" data-equalizer-watch>
									<h2 class="name"><?php echo $ticket['ticket_name']; ?></h2>
									<p class="description"><?php echo $ticket['description']; ?></p>

									<?php if ($ticket['price'] != '') { ?>
										<p class="price">$<?php echo $ticket['price']; ?></p>
									<?php } else { ?>
										<p class="price">FREE</p>
									<?php } ?>

								</div>
							</div>
						<?php } ?>

					</div>
				</section>
			<?php } ?>

		</div>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		<div class="next-prev-links">
			<?php if ($previous_event != $this_url) { ?>
				<a href="<?php echo $previous_event; ?>" class="large primary button float-left"><i class="fa fa-chevron-left icon-left"></i> Previous Event</a>
			<?php } ?>
			<?php if ($next_event != $this_url) { ?>
				<a href="<?php echo $next_event; ?>" class="large primary button float-right">Next Event <i class="fa fa-chevron-right"></i></a>
			<?php } ?>
		</div>
	</footer> <!-- end article footer -->
					
	<?php //comments_template(); ?>
													
</article> <!-- end article -->