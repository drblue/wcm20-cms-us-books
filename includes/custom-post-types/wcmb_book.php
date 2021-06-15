<?php

function cptui_register_my_cpts_wcmb_book() {

	/**
	 * Post Type: Books.
	 */

	$labels = [
		"name" => __( "Books", "hestia" ),
		"singular_name" => __( "Book", "hestia" ),
		"menu_name" => __( "My Books", "hestia" ),
		"all_items" => __( "All Books", "hestia" ),
		"add_new" => __( "Add new", "hestia" ),
		"add_new_item" => __( "Add new Book", "hestia" ),
		"edit_item" => __( "Edit Book", "hestia" ),
		"new_item" => __( "New Book", "hestia" ),
		"view_item" => __( "View Book", "hestia" ),
		"view_items" => __( "View Books", "hestia" ),
		"search_items" => __( "Search Books", "hestia" ),
		"not_found" => __( "No Books found", "hestia" ),
		"not_found_in_trash" => __( "No Books found in trash", "hestia" ),
		"parent" => __( "Parent Book:", "hestia" ),
		"featured_image" => __( "Featured image for this Book", "hestia" ),
		"set_featured_image" => __( "Set featured image for this Book", "hestia" ),
		"remove_featured_image" => __( "Remove featured image for this Book", "hestia" ),
		"use_featured_image" => __( "Use as featured image for this Book", "hestia" ),
		"archives" => __( "Book archives", "hestia" ),
		"insert_into_item" => __( "Insert into Book", "hestia" ),
		"uploaded_to_this_item" => __( "Upload to this Book", "hestia" ),
		"filter_items_list" => __( "Filter Books list", "hestia" ),
		"items_list_navigation" => __( "Books list navigation", "hestia" ),
		"items_list" => __( "Books list", "hestia" ),
		"attributes" => __( "Books attributes", "hestia" ),
		"name_admin_bar" => __( "Book", "hestia" ),
		"item_published" => __( "Book published", "hestia" ),
		"item_published_privately" => __( "Book published privately.", "hestia" ),
		"item_reverted_to_draft" => __( "Book reverted to draft.", "hestia" ),
		"item_scheduled" => __( "Book scheduled", "hestia" ),
		"item_updated" => __( "Book updated.", "hestia" ),
		"parent_item_colon" => __( "Parent Book:", "hestia" ),
	];

	$args = [
		"label" => __( "Books", "hestia" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "books", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-book",
		"supports" => [ "title", "editor", "thumbnail", "excerpt" ],
		"show_in_graphql" => false,
	];

	register_post_type( "wcmb_book", $args );
}

add_action( 'init', 'cptui_register_my_cpts_wcmb_book' );
