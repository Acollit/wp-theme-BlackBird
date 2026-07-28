<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header" x-data="{ navOpen: false }">
	<div class="site-header__inner">
		<a class="site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">ец</a>
		<button
			type="button"
			class="site-header__burger"
			aria-controls="primary-menu"
			:aria-expanded="navOpen"
			@click="navOpen = !navOpen"
		>
			<span class="site-header__burger-line"></span>
			<span class="site-header__burger-line"></span>
			<span class="site-header__burger-line"></span>
		</button>
		<nav class="site-header__nav" :class="{ 'site-header__nav--open': navOpen }">
			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'container'      => false,
				'items_wrap'     => '<ul id="primary-menu" class="site-header__menu">%3$s</ul>',
				'fallback_cb'    => false,
			] );
			?>
		</nav>
	</div>
</header>
