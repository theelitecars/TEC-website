<?php

if(!function_exists("register_listing_post_type")){
    function register_listing_post_type() {
        global $lwp_options;

    	//********************************************
    	//	Register the post type
    	//***********************************************************

    	$labels = array(
    	  'name'          	    => __('Listings', 'listings'),
    	  'singular_name'		=> __('Listing', 'listings'),
    	  'add_new'			 	=> __('Add New', 'listings'),
    	  'add_new_item'		=> __('Add New Listing', 'listings'),
    	  'edit_item'			=> __('Edit Listing', 'listings'),
    	  'new_item'			=> __('New Listing', 'listings'),
    	  'all_items'			=> __('All Listings', 'listings'),
    	  'view_item' 		 	=> __('View Listing', 'listings'),
    	  'search_items'		=> __('Search Listings', 'listings'),
    	  'not_found'          	=> __('No listings found', 'listings'),
    	  'not_found_in_trash' 	=> __('No listings found in Trash',  'listings'),
    	  'menu_name'			=> __('Listings', 'listings')
    	);
      
    	$args = array(
    	  'labels'              => $labels,
    	  'public'              => true,
    	  'publicly_queryable' 	=> true,
    	  'show_ui'            	=> true, 
    	  'show_in_menu' 	    => true, 
    	  'query_var'          	=> true,
    	  'rewrite' 	        => array( 'slug' => (isset($lwp_options['listing_slug']) && !empty($lwp_options['listing_slug']) ? $lwp_options['listing_slug'] : 'listings') ),
    	  'capability_type'    	=> 'post',
    	  'has_archive'        	=> true, 
    	  'hierarchical'       	=> false,
    	  'taxonomies' 			=> array('listing_category'), 
    	  'menu_position'      	=> null,
    	  'supports'			=> array('title', 'editor', 'comments'),
    	  'show_in_rest'       => true,
		  'rest_base'          => 'listings',
		  'rest_controller_class' => 'WP_REST_Posts_Controller',
    	); 

    	register_post_type( 'listings', $args );
      
    }
    add_action( 'init', 'register_listing_post_type', 0 );
}


/* Custom Columns */
function add_new_listings_columns($columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    $new_columns['title'] = __('Title', 'listings');

    $column_categories = get_column_categories();

    if(!empty($column_categories)){
	    foreach($column_categories as $column){
	    	$new_columns[$column['slug']] = $column['singular'];
	    }
	}
 
    $new_columns['date'] = __('Date', 'listings');
 
    return $new_columns;
}
add_filter('manage_edit-listings_columns', 'add_new_listings_columns');

 
function manage_listings_columns($column_name, $id) {
    $return = get_post_meta($id, $column_name, true);

    echo (isset($return) && !empty($return) ? $return : "");
}  
add_action('manage_listings_posts_custom_column', 'manage_listings_columns', 10, 2);


function order_column_register_sortable($columns){
    $column_categories = get_column_categories();

    if(!empty($column_categories)){
	    foreach($column_categories as $column){
	    	$slug = $column['slug'];

	    	$columns[$slug] = $slug;
	    }
	}

  return $columns;
}
add_filter('manage_edit-listings_sortable_columns','order_column_register_sortable');


function custom_listings_orderby( $query ) {
    if( ! is_admin() )
        return;
 
    $orderby = $query->get( 'orderby');
    
    $column_categories = get_column_categories();

    if(!empty($column_categories)){
	    foreach($column_categories as $column){ 
	    	$safe = $column['slug'];

		    if( $safe == $orderby ) {
		        $query->set('meta_key', $safe);
		        $query->set('orderby', ($column['compare_value'] != "=" ? 'meta_value_num' : 'meta_value') );
		    }

	    	$columns[$safe] = $safe;
	    }
	}
}
add_action( 'pre_get_posts', 'custom_listings_orderby' );