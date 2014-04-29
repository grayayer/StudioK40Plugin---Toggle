<?php

/*
Plugin Name: Studio K40 Common Functionality Plugin
Description: All of the important functionality of the site belongs in this.
Version: 0.1
License: GPL
Author: Gray Ayer
Author URI: http://studiok40.com
*/

// loads the javascript files with the wp_enqueue_scripts hook 
 
add_action( 'wp_enqueue_scripts', 'studiok40_load_javascript_files' );
 
// Register some javascript files, because we love javascript files. Enqueue a couple as well 
define( "StudioK40Plugin_URL", plugins_url() . '/StudioK40Plugin/');
function studiok40_load_javascript_files() {
	wp_enqueue_script("simple_history", StudioK40Plugin_URL . "js/studiok40-plugin-scripts.js", array("jquery"));
}


/** Adds the function 'add_studiok40_stylesheet' to the wp_enqueue_scripts action. */

add_action( 'wp_enqueue_scripts', 'add_studiok40_stylesheet' );
/**
 * Function for loading your custom stylesheet
 */
function add_studiok40_stylesheet() {
 
    // change this path to load your own custom stylesheet
    $css_path = WP_PLUGIN_URL . '/StudioK40Plugin/css/studiok40style.css';
 
    // registers your stylesheet
    wp_register_style( 'studiok40StyleSheets', $css_path );
 
    // loads your stylesheet
    wp_enqueue_style( 'studiok40StyleSheets' );
}


//TOGGLE SHORTCODE
function toggle_shortcode( $atts, $content = null )
{
    extract( shortcode_atts(
        array(
        'title' => 'Click To Open',
        'color' => ''
),
$atts ) );
return '<h3 class="trigger toggle-'.$color.'" title="Click to Open or Close"><a><span class="icon"></span>'. $title .'</a></h3><div class="toggle_container">' . do_shortcode($content) . '</div>';
}
add_shortcode('toggle', 'toggle_shortcode');


function remove_menus () {
global $menu;
		$restricted = array(__('Links'));
		end ($menu);
		while (prev($menu)){
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		}
}
add_action('admin_menu', 'remove_menus');

?>