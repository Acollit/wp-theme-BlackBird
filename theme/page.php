<?php get_header(); ?>

<main class="site-main">
	<?php while ( have_posts() ) : the_post(); ?>
		<article class="page">
			<h1 class="page__title"><?php the_title(); ?></h1>
			<div class="page__content"><?php the_content(); ?></div>
		</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
