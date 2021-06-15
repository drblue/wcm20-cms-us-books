<?php

function cptui_register_my_taxes_wcmb_genre() {

	/**
	 * Taxonomy: Genres.
	 */

	$labels = [
		"name" => __( "Genres", "hestia" ),
		"singular_name" => __( "Genre", "hestia" ),
		"menu_name" => __( "Genres", "hestia" ),
		"all_items" => __( "All Genres", "hestia" ),
		"edit_item" => __( "Edit Genre", "hestia" ),
		"view_item" => __( "View Genre", "hestia" ),
		"update_item" => __( "Update Genre name", "hestia" ),
		"add_new_item" => __( "Add new Genre", "hestia" ),
		"new_item_name" => __( "New Genre name", "hestia" ),
		"parent_item" => __( "Parent Genre", "hestia" ),
		"parent_item_colon" => __( "Parent Genre:", "hestia" ),
		"search_items" => __( "Search Genres", "hestia" ),
		"popular_items" => __( "Popular Genres", "hestia" ),
		"separate_items_with_commas" => __( "Separate Genres with commas", "hestia" ),
		"add_or_remove_items" => __( "Add or remove Genres", "hestia" ),
		"choose_from_most_used" => __( "Choose from the most used Genres", "hestia" ),
		"not_found" => __( "No Genres found", "hestia" ),
		"no_terms" => __( "No Genres", "hestia" ),
		"items_list_navigation" => __( "Genres list navigation", "hestia" ),
		"items_list" => __( "Genres list", "hestia" ),
		"back_to_items" => __( "Back to Genres", "hestia" ),
	];


	$args = [
		"label" => __( "Genres", "hestia" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'genres', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "wcmb_genre",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
		"default_term" => ['name' => 'Unclassified', 'slug' => 'unclassified', 'description' => 'Books without a specific genre'],
	];
	register_taxonomy( "wcmb_genre", [ "wcmb_book" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_wcmb_genre' );
