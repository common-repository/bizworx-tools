<?php

/**
 *
 * Plugin Name:       Bizworx Tools
 * Plugin URI:        http://themeworx.net/plugins/bizworx-tools
 * Description:       Adds custom widgets for the theme
 * Version:           1.1
 * Author:            Themeworx
 * Author URI:        http://themeworx.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bizworx-tools
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Bizworx_Tools {

	private static $instance;

	/**
	 * Actions
	 */
	public function __construct() {

		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'admin_notices', array( $this, 'admin_notice' ), 4 );
		
		//Elementor actions
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'elementor_includes' ), 4 );
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'scripts' ), 4 );

	}

	/**
	 * Constants
	 */
	function constants() {

		define( 'ST_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'ST_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	}

	/**
	 * Includes
	 */

	function elementor_includes() {
		if ( !version_compare(PHP_VERSION, '5.4', '<=') ) {
			require_once( ST_DIR . 'inc/elementor/block-testimonials.php' );
			require_once( ST_DIR . 'inc/elementor/block-posts.php' );
			require_once( ST_DIR . 'inc/elementor/block-employee.php' );
			require_once( ST_DIR . 'inc/elementor/block-pricing.php' );
		}
	}

	static function install() {
		if ( version_compare(PHP_VERSION, '5.4', '<=') ) {
			wp_die( __( 'Bizworx Tools requires PHP 5.4. Please contact your host to upgrade your PHP. The plugin was <strong>not</strong> activated.', 'bizworx-tools' ) );
		};
	}

	/**
	 * Admin notice
	 */
	function admin_notice() {
		$theme  = wp_get_theme();
		$parent = wp_get_theme()->parent();
		$support_themes = array('Bizworx', 'Bizworx Pro', 'SmartWorx', 'SmartWorx Pro', 'Appworx', 'Appworx Pro');
		if (!in_array($theme, $support_themes)) {
		    echo '<div class="error">';
		    echo 	'<p>' . __('Please note that the <strong>Bizworx Tools</strong> plugin is meant to be used only with the <a href="http://themeworx.net/themes/" target="_blank">Themeworx themes</a></p>', 'bizworx-tools');
		    echo '</div>';			
		}
	}

	/**
	 * Scripts
	 */	
	function scripts() {
		wp_enqueue_script( 'st-carousel', ST_URI . 'js/main.js', array(), '20180228', true );

	}

	/**
	 * Check for pro theme
	 */
	public static function is_pro() {
		$active_theme  = wp_get_theme();
		$parent = wp_get_theme()->parent();
		$pro_themes = array('Bizworx Pro', 'SmartWorx Pro', 'Appworx Pro');
		if(!in_array($active_theme, $pro_themes) && !in_array($parent, $pro_themes)){
			return false;
	    } else {
	    	return true;
	    }		
	}

	/**
	 * Returns the instance.
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}
}

function bizworx_toolbox_plugin() {
		return Bizworx_Tools::get_instance();
}
add_action('plugins_loaded', 'bizworx_toolbox_plugin', 1);


function elementor_category() {
	if ( !version_compare(PHP_VERSION, '5.4', '<=') ) {
		\Elementor\Plugin::$instance->elements_manager->add_category( 
			'bizworx-elements',
			[
				'title' => __( 'Bizworx Elements', 'bizworx-tools' ),
				'icon' => 'fa fa-plug',
			],
			2
		);
	}
} 

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'bizworx-tools',
		[
			'title' => __( 'Bizworx Widgets', 'bizworx-tools' ),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

register_activation_hook( __FILE__, array( 'Bizworx_Tools', 'install' ) );