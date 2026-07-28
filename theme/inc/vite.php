<?php

namespace StarterScss\Inc;

use Kucrut\Vite;

add_action( 'wp_enqueue_scripts', function (): void {
	if ( ! function_exists( 'Kucrut\Vite\enqueue_asset' ) ) {
		return;
	}

	Vite\enqueue_asset(
		get_theme_file_path( 'dist' ),
		'src/js/main.js',
		[
			'handle'    => 'starter-scss',
			'in-footer' => true,
		]
	);
} );
