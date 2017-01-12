<?php
	$prefix = '_events_';

	$title = get_the_title();

	$description = get_post_meta( get_the_ID(), $prefix . 'description', true );
	$description = wp_strip_all_tags( $description, true);
	$description = wp_trim_words($description, 50, '... <a href="' . get_permalink() . '">Read more</a>');
	$description = wpautop( $description );

	$image = get_post_meta( get_the_ID(), $prefix . 'image', true );

	if (!$image) {
		$image = get_stylesheet_directory_uri() . '/assets/images/event-images/default-image.jpg';
	}

	$dates = get_post_meta( get_the_ID(), $prefix . 'dates_and_times', true );
	$start_date = date('j M Y', $dates[0]);

	$city = get_post_meta( get_the_ID(), $prefix . 'city', true );

	$audience = get_the_terms( get_the_ID(), 'target_audience' );

	$event_meta = $start_date .  ' in ' . $city . ' | ';

?>

<article class="event card">

	<div class="card-image" style="background-image: url('<?php echo esc_html($image); ?>');"></div>

	<div class="card-info">
		<header class="card-header">
			<h1 class="heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		</header>

		<section class="card-body">
			<p class="meta"><?php echo $event_meta; ?><?php the_terms( $post->ID, 'target_audience' ); ?></p>
			<div class="description"><?php echo $description; ?></div>
		</section>

		<footer class="card-footer">
			<a href="<?php the_permalink(); ?>" class="secondary large button">Book your spot <i class="fa fa-calendar-check-o" aria-hidden="true"></i></a>
		</footer>
	</div> <!-- end .card-info -->

</article> <!-- end .card -->