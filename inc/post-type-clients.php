<?php

/**
 * This file registers the Clients custom post type
 *
 * @package    	Bizworx_Tools
 * @link        http://themeworx.net
 * Author:      Themeworx
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// Register the Clients custom post type
function bizworx_toolbox_register_clients() {

	$labels = array(
		'name'                  => _x( 'Clients', 'Post Type General Name', 'bizworx_toolbox' ),
		'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'bizworx_toolbox' ),
		'menu_name'             => __( 'Clients', 'bizworx_toolbox' ),
		'name_admin_bar'        => __( 'Clients', 'bizworx_toolbox' ),
		'archives'              => __( 'Item Archives', 'bizworx_toolbox' ),
		'parent_item_colon'     => __( 'Parent Item:', 'bizworx_toolbox' ),
		'all_items'             => __( 'All Clients', 'bizworx_toolbox' ),
		'add_new_item'          => __( 'Add New Client', 'bizworx_toolbox' ),
		'add_new'               => __( 'Add New Client', 'bizworx_toolbox' ),
		'new_item'              => __( 'New Client', 'bizworx_toolbox' ),
		'edit_item'             => __( 'Edit Client', 'bizworx_toolbox' ),
		'update_item'           => __( 'Update Client', 'bizworx_toolbox' ),
		'view_item'             => __( 'View Client', 'bizworx_toolbox' ),
		'search_items'          => __( 'Search Client', 'bizworx_toolbox' ),
		'not_found'             => __( 'Not found', 'bizworx_toolbox' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bizworx_toolbox' ),
		'featured_image'        => __( 'Featured Image', 'bizworx_toolbox' ),
		'set_featured_image'    => __( 'Set featured image', 'bizworx_toolbox' ),
		'remove_featured_image' => __( 'Remove featured image', 'bizworx_toolbox' ),
		'use_featured_image'    => __( 'Use as featured image', 'bizworx_toolbox' ),
		'insert_into_item'      => __( 'Insert into item', 'bizworx_toolbox' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'bizworx_toolbox' ),
		'items_list'            => __( 'Items list', 'bizworx_toolbox' ),
		'items_list_navigation' => __( 'Items list navigation', 'bizworx_toolbox' ),
		'filter_items_list'     => __( 'Filter items list', 'bizworx_toolbox' ),
	);
	$args = array(
		'label'                 => __( 'Client', 'bizworx_toolbox' ),
		'description'           => __( 'A post type for your clients', 'bizworx_toolbox' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => 'clients' ),
	);
	register_post_type( 'clients', $args );

}
add_action( 'init', 'bizworx_toolbox_register_clients', 0 );