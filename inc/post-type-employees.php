<?php

/**
 * This file registers the Employees custom post type
 *
 * @package    	Bizworx_Tools
 * @link        http://themeworx.net
 * Author:      Themeworx
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// Register the Employees custom post type
function bizworx_tools_register_employees() {

	$slug = apply_filters( 'bizworx_employees_rewrite_slug', 'employees' );	

	$labels = array(
		'name'                  => _x( 'Employees', 'Post Type General Name', 'bizworx_tools' ),
		'singular_name'         => _x( 'Employee', 'Post Type Singular Name', 'bizworx_tools' ),
		'menu_name'             => __( 'Employees', 'bizworx_tools' ),
		'name_admin_bar'        => __( 'Employees', 'bizworx_tools' ),
		'archives'              => __( 'Item Archives', 'bizworx_tools' ),
		'parent_item_colon'     => __( 'Parent Item:', 'bizworx_tools' ),
		'all_items'             => __( 'All Employees', 'bizworx_tools' ),
		'add_new_item'          => __( 'Add New Employee', 'bizworx_tools' ),
		'add_new'               => __( 'Add New Employee', 'bizworx_tools' ),
		'new_item'              => __( 'New Employee', 'bizworx_tools' ),
		'edit_item'             => __( 'Edit Employee', 'bizworx_tools' ),
		'update_item'           => __( 'Update Employee', 'bizworx_tools' ),
		'view_item'             => __( 'View Employee', 'bizworx_tools' ),
		'search_items'          => __( 'Search Employee', 'bizworx_tools' ),
		'not_found'             => __( 'Not found', 'bizworx_tools' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bizworx_tools' ),
		'featured_image'        => __( 'Featured Image', 'bizworx_tools' ),
		'set_featured_image'    => __( 'Set featured image', 'bizworx_tools' ),
		'remove_featured_image' => __( 'Remove featured image', 'bizworx_tools' ),
		'use_featured_image'    => __( 'Use as featured image', 'bizworx_tools' ),
		'insert_into_item'      => __( 'Insert into item', 'bizworx_tools' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'bizworx_tools' ),
		'items_list'            => __( 'Items list', 'bizworx_tools' ),
		'items_list_navigation' => __( 'Items list navigation', 'bizworx_tools' ),
		'filter_items_list'     => __( 'Filter items list', 'bizworx_tools' ),
	);
	$args = array(
		'label'                 => __( 'Employee', 'bizworx_tools' ),
		'description'           => __( 'A post type for your employees', 'bizworx_tools' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 26,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array( 'slug' => $slug ),		
	);
	register_post_type( 'employees', $args );

}
add_action( 'init', 'bizworx_tools_register_employees', 0 );