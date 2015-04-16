<?php

/*
 * Plugin Name:       Devons Tools - Fade Images
 * Plugin URI:        
 * Description:       This plugin makes a widget available that displays a linkable image that fades to another image on hover. 
 * Version:           1.0
 * Author:            Devon Godfrey
 * Author URI:        http://playfreygames.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt

	Plugin is based on Devons Tools 1.1

	*IMPORTANT*
	do a "find/replace" accross the directory for "DT_FIW" and replace
	with your plugin name. 

	Any files put into the js, inc, or css folders automatically get 
	included or enqeued. Files put into the root of these folders for 
	js or css get enqeued to the front end, while anything put into
	'admin' folder gets enqeued into the back-end. 

*/
if ( ! defined( 'WPINC' ) ) { die; }

define("DT_FIW_HOME_DIR", plugin_dir_path( __FILE__ ));
define("DT_FIW_HOME_URL", plugin_dir_url( __FILE__ ));

include_once( DT_FIW_HOME_DIR . "framework/class-devons_tools_core.php" );

/*
===========================================
	Edit everything below this comment!
===========================================
*/


function fiw_register_widgets(){
	register_widget( 'Fade_Image_Widget' );
}

function fiw_enqueue_js_admin(){
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery');
}

function fiw_enqueue_css_admin(){
	wp_enqueue_style('thickbox');
}

add_action( 'widgets_init', 'fiw_register_widgets' );
add_action( 'admin_print_scripts', 'fiw_enqueue_js_admin' );
add_action( 'admin_print_styles', 'fiw_enqueue_css_admin' );