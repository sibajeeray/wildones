<?php 

function safarihelps_custom_posts(){

    //Create Tours post type
    $labels_for_tours = array(
        'name'              => _x('Tours', 'post type general name', 'safarihelps'),
        'singular_name'     => _x('Tour', 'post type singular name', 'safarihelps'),
        'menu_name'         => _x('Tours', 'admin menu', 'safarihelps'),
        'name_admin_bar'    => _x('Tours', 'add new on admin bar', 'safarihelps'),
        'add_new'           => _x('Add New', 'tour', 'safarihelps'),
        'add_new_item'      => __('Add New Tour', 'safarihelps'),
        'new_item'          => __('New Tour', 'safarihelps'),
        'edit_item'         => __('Edit Tour', 'safarihelps'),
        'view_item'         => __('View Tour', 'safarihelps'),
        'all_items'         => __('All Tours', 'safarihelps'),
        'search_items'      => __('Search Tours', 'safarihelps'),
        'parent_item_colon' => __('Parent Tours', 'safarihelps'),
        'not_found'         => __('No Tour found', 'safarihelps'),
        'not_found_in_trash'=> __('No Tour found in trash', 'safarihelps')
    );

    $args_for_tours = array( 
        'labels'            => $labels_for_tours,
        'description'       => __('Description.', 'safarihelps' ),
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'tour'),
        'capability_type'   => 'post',
        'has_archeive'      => true,
        'hierarchical'      => false,
        'menu_position'     => 5,
        'supports'          => array('title', 'editor', 'thumbnail','excerpt'),
        'taxonomies'        => array('category','country')
    );
    register_post_type('tours', $args_for_tours);
}
add_action('init', 'safarihelps_custom_posts');




function safarihelps_custom_taxonomy(){

    // Add new taxonomy Countries, make it hierarchical (like categories)
    $labels_countries = array(
        'name'              => _x( 'Countries', 'taxonomy general name', 'safarihelps' ),
        'singular_name'     => _x( 'Countries', 'taxonomy singular name', 'safarihelps' ),
        'menu_name'         => __( 'Countries', 'safarihelps' ),
        'all_items'         => __( 'All Countries', 'safarihelps' ),
        'parent_item'       => __( 'Parent Country', 'safarihelps' ),
        'parent_item_colon' => __( 'Parent Country:', 'safarihelps' ),
        'new_item_name'     => __( 'New Country', 'safarihelps' ),
        'add_new_item'      => __( 'Add New Country', 'safarihelps' ),
        'edit_item'         => __( 'Edit Country', 'safarihelps' ),
        'update_item'       => __( 'Update Country', 'safarihelps' ),
        'separate_items_with_commas'    => __( 'Separate Countries with commas', 'safarihelps' ),
        'search_items'                  => __( 'Search Countries', 'safarihelps' ),
        'add_or_remove_items'           => __( 'Add or remove Countries', 'safarihelps' ),
        'choose_from_most_used'         => __( 'Choose from the most used Countries', 'safarihelps' ),
        'not_found'                     => __( 'No Countries found.', 'safarihelps' ),
    );
    $args_countries = array(
        'labels'                     => $labels_countries,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array('slug' => 'country', 'with_front' => true)
    );

    register_taxonomy( 'country', array( 'tours' ), $args_countries );
           
}
add_action('init', 'safarihelps_custom_taxonomy');



?>