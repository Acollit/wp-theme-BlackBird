<article <?php post_class( 'entry' ); ?>>
	<h2 class="entry__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="entry__excerpt"><?php the_excerpt(); ?></div>
</article>
