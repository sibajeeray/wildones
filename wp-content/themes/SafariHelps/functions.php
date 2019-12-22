<?php 

add_filter('show_admin_bar', '__return_false');



require_once get_template_directory().'/includes/enques.php';    
require_once get_template_directory().'/includes/custom-posts.php'; 

require get_template_directory() . '/includes/admin/functions/admin-functions.php';


// Add all the theme support here
function safarihelps_setup()
{
    // Post-thumbnail support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    //custom Image sizes
    add_image_size('banner', 1920, 600, true);
    add_image_size('mid-size', 500, 550, true);
    add_image_size('slides', 1000, 700, true);
}
add_action('after_setup_theme', 'safarihelps_setup');

// Add Menu Support to the Theme
function safarihelps_menus()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'safarihelps'),
        'social-menu' => __('Social Menu', 'safarihelps'),
        'footer-links' => __('Footer Links', 'safarihelps')
    ));
}
add_action('init', 'safarihelps_menus');


function trim_contents($text, $limit) {
    $lenght =  strlen($text);
    if($lenght > $limit){
        $text =  substr($text, 0, $limit).' [...]';
    }
    return $text;
}

?>