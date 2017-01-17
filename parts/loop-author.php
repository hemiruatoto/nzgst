<?php 
// Setup author info variables
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$display_name = $curauth->nzgst_user_display_name;

$storyteller_photo = $curauth->nzgst_user_profile_photo;

$cover_photo = $curauth->nzgst_user_cover_photo;

if ($cover_photo) {
	$header_background = 'linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(\'' . $cover_photo . '\') no-repeat center center';
} else {
	$header_background = 'linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(\'' . get_stylesheet_directory_uri() . '/assets/images/event-images/default-image.jpg\') no-repeat center center';
}

$bio = wpautop( $curauth->nzgst_user_bio );

$stories_for_array = $curauth->nzgst_user_stories_for;

if (sizeof($stories_for_array) > 1) {
	$stories_for = 'Adults &amp; Children';
} else if (sizeof($stories_for_array) == 1){
	$stories_for = ucfirst( $stories_for_array[0] );
} else {
	$stories_for = '';
}

$email = $curauth->nzgst_user_contact_email;

$phone = $curauth->nzgst_user_contact_phone;

$website_url = $curauth->nzgst_user_website_url;

$facebook_url = $curauth->nzgst_user_facebook_url;

$twitter_url = $curauth->nzgst_user_twitter_url;

$googleplus_url = $curauth->nzgst_user_googleplus_url;

$linkedin_url = $curauth->nzgst_user_linkedin_url;

?>

<article id="author-<?php $curauth->ID; ?>" class="author" role="article" itemscope itemtype="http://schema.org/BlogPosting">
				
	<header class="article-header" style="background: <?php echo $header_background; ?>; background-size: cover;">
		<div class="profile-photo" style="background-image: url('<?php echo $storyteller_photo; ?>');">
		</div>
		<div class="header-content">
			<h1 class="display-name" itemprop="headline"><?php echo $display_name; ?></h1>
			<p class="storyteller-meta">Stories for <?php echo $stories_for; ?></p>
		</div>
		
		<a href="#" class="back"><i class="fa fa-chevron-left"></i> All Storytellers</a>
    </header> <!-- end article header -->
					
    <section class="entry-content row" itemprop="articleBody">
		<div class="large-4 medium-5 columns">

			<!-- Contact buttons -->
			<?php if ($booking_url || $phone || $email || $url) { ?>
				<address class="contact info-section">
					<button id="message-button" class="large expanded secondary button" data-open="message-modal">Send A Message <i class="fa fa-paper-plane"></i></button>
					<?php if ($website_url) { ?>
						<a href="<?php echo $website_url; ?>" class="large expanded primary button" target="_blank">Visit Website <i class="fa fa-globe"></i></a>
					<?php } ?>
				</address>
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

			<!-- Social media -->
			<?php if ($facebook_url || $twitter_url || $googleplus_url || $linkedin_url) { ?>
				<address class="social-media info-section">
					<h1>Social Media</h1>
					<p>
						<?php if ($facebook_url) { ?>
							<a href="<?php echo $facebook_url; ?>" class="facebook social-link"><i class="fa fa-facebook-square"></i></a>
						<?php } ?>
						<?php if ($twitter_url) { ?>
							<a href="<?php echo $twitter_url; ?>" class="twitter social-link"><i class="fa fa-twitter-square"></i></a>
						<?php } ?>
						<?php if ($googleplus_url) { ?>
							<a href="<?php echo $googleplus_url; ?>" class="google social-link"><i class="fa fa-google-plus-square"></i></a>
						<?php } ?>
						<?php if ($linkedin_url) { ?>
							<a href="<?php echo $linkedin_url; ?>" class="linkedin social-link"><i class="fa fa-linkedin-square"></i></a>
						<?php } ?>
					</p>
				</address>
			<?php } ?>

		</div>

		<div class="large-8 medium-7 columns">

			<!-- Event description -->
			<?php if ($bio) { ?>
				<section class="description info-section">
					<h1>About</h1>
					<?php echo $bio; ?>
				</section>
			<?php } ?>

		</div>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
	</footer> <!-- end article footer -->

	<!-- Modal for sending messages to the author -->
	<section id="message-modal" class="modal reveal" data-reveal>

		<button class="close-button" data-close aria-label="Close modal" type="button">
			<span aria-hidden="true">&times;</span>
		</button>

		<header class="modal-header">
			<h1 class="modal-title">Send a message to <?php echo $display_name; ?></h1>
		</header>

		<section class="modal-body">
			<form action="">
				<div class="row">
					<div class="medium-6 columns">
						<label for="message-name">
							Your name
							<input type="text" id="message-name" name="name">
						</label>
					</div>
					<div class="medium-6 columns">
						<label for="message-email">
							Your email
							<input type="text" id="message-email" name="email">
						</label>
					</div>
				</div>

				<div class="row">
					<div class="medium-12 columns">
						<label for="message-content">
							Message
							<textarea name="content" id="message-content" cols="30" rows="10"></textarea>
						</label>
					</div>
				</div>

				<div class="row">
					<div class="medium-12 columns">
						<input type="submit" class="secondary button" value="Send message">
					</div>
				</div>
			</form>
		</section><!-- end modal body -->
		
	</section><!-- end message modal -->

</article>