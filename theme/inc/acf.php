<?php

namespace StarterScss\Inc;

add_action( 'acf/init', function (): void {
	if ( ! function_exists( 'acf_add_options_page' ) ) {
		return;
	}

	acf_add_options_page( [
		'page_title' => 'Настройки темы',
		'menu_title' => 'Настройки темы',
		'menu_slug'  => 'theme-settings',
		'capability' => 'manage_options',
	] );
} );

/**
 * Обёртка над get_field() с безопасным фолбэком, если ACF ещё не установлен/активирован.
 */
function theme_field( string $selector, $post_id = false, $default = '' ) {
	if ( ! function_exists( 'get_field' ) ) {
		return $default;
	}

	$value = get_field( $selector, $post_id );

	return $value !== null && $value !== '' ? $value : $default;
}
