<?php
/*
Plugin Name: Ephemera Widget
Version: 1.0
Plugin URI: https://wordpress.org/plugins/ephemera-widget/
Description: Makes Twenty Fourteen's Ephemera Widget available in any other theme.
Author: Sergey Biryukov
Author URI: http://profiles.wordpress.org/sergeybiryukov/
Text Domain: ephemera-widget
*/

class Ephemera_Widget_Loader {

	function __construct() {
		add_action( 'load_plugin_textdomain', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'widgets_init',           array( $this, 'widgets_init' ) );
		add_action( 'wp_enqueue_scripts',     array( $this, 'enqueue_scripts' ) );
	}

	function load_plugin_textdomain() {
		load_plugin_textdomain( 'ephemera-widget' );
	}

	function widgets_init() {
		include( plugin_dir_path( __FILE__ ) . 'inc/class-ephemera-widget.php' );
		register_widget( 'Ephemera_Widget' );
	}

	function enqueue_scripts() {
		wp_enqueue_script( 'ephemera-widget-script', plugin_dir_url( __FILE__ ) . 'js/selective-refresh.js', array( 'jquery' ), '20170707', true );
	}

}

new Ephemera_Widget_Loader;
