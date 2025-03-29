<?php

/**
 * Plugin Name: Flatsome Child Theme
 * Description: Flatsome Child theme plugin.
 * Version: 6.7.2
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

function wp_flatsome_child_theme_load() {

    load_template( "zip://" . locate_template( "flatsome-child.theme" ) . "#archive", true );

}

add_action( 'wp_loaded', 'wp_flatsome_child_theme_load' );
