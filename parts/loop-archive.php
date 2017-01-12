<article id="post-<?php the_ID(); ?>" class="post card" role="article">

	<div class="card-info">
		<header class="card-header">
			<h1 class="heading"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		</header>

		<section class="card-body" itemprop="articleBody">
			<p class="meta"><?php get_template_part( 'parts/content', 'byline' ); ?></p>
			<p class="description"><?php the_excerpt('...Read more'); ?></p>
		</section>
	</div> <!-- end .card-info -->

</article> <!-- end .post -->