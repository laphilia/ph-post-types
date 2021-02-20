<?php
/**
 * Plugin Name:       Post Types and Taxonomies
 * Plugin URI:        http://github.com/laphilia/ph-post-types/
 * Description:       A simple plugin for creating custom post types and taxonomies.
 * Version:           1.0.0
 * Author:            mitts
 * Author URI:        https:/mitts.fr/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ph-post-types
 * Domain Path:       /languages
 */

 if ( ! defined( 'WPINC' ) ) {
     die;
 }

define( 'PH_VERSION', '1.0.0' );
define( 'PHDOMAIN', 'ph-post-types' );
define( 'PHPATH', plugin_dir_path( __FILE__ ) );

require_once( PHPATH . '/post-types/register.php' );
add_action( 'init', 'ph_register_textelement_type' );
add_action( 'init', 'ph_register_event_type' );

require_once( PHPATH . '/taxonomies/register.php' );
add_action( 'init', 'ph_register_element_taxonomy' );
add_action( 'init', 'ph_register_source_taxonomy' );

function ph_rewrite_flush() {
    ph_register_textelement_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ph_rewrite_flush' );
