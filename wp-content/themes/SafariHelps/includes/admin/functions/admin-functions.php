<?php 
require_once get_template_directory() . '/includes/admin/functions/init-dbtables.php';
require_once get_template_directory() . '/includes/admin/functions/db-operations.php';
require_once get_template_directory() . '/includes/admin/functions/form-handler.php';

/*
* Adding a menu to contain the custom post types for frontpage
*/
 
function safarihelps_admin_menu() {
 
    add_menu_page(
        'Manage Bookings',
        'Manage Bookings',
        'manage_options',
        'manage-bookings',
        'get_booking_home_page',
        'dashicons-admin-home',
        9
    );
    add_submenu_page( 
        'manage-bookings', 
        'Tours', 
        'Tours',
        'manage_options',
        'manage-bookings', 
        ''
    );
    add_submenu_page( 
        'manage-bookings', 
        'Trips List', 
        'Trips List',
        'manage_options',
        'trips-list', 
        'get_trip_listing_page'
    );
    add_submenu_page( 
        'manage-bookings', 
        'Add Trip', 
        'Add Trip',
        'manage_options',
        'add-new-trip', 
        'get_add_trip_page'
    );
 
 }
 add_action( 'admin_menu', 'safarihelps_admin_menu' );


function get_booking_home_page(){
    include(get_template_directory().'/includes/admin/templates/page-trip-home.php');
}
function get_trip_listing_page() {
    include(get_template_directory().'/includes/admin/templates/page-trips-list.php');
}
function get_add_trip_page() {
    include(get_template_directory().'/includes/admin/templates/page-add-trip.php');
}
function get_edit_trip_page() {
    include(get_template_directory().'/includes/admin/templates/page-edit-trip.php');
}

// Admin custom styling
function wpdocs_enqueue_custom_admin_files($hook_suffix) {

    if (strpos($hook_suffix, 'nage-bookings') == false) { //ma is removed from 'manage' to avoid 0 which is agian false
        return;
    }

    // Load your css.
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/includes/admin/css/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );

    wp_register_style( 'admin_bootstrap', get_template_directory_uri() . '/assets/css/vendors/bootstrap/bootstrap.css', false, '1.0.0' );
    wp_enqueue_style( 'admin_bootstrap' );

    //Load your scripts
    wp_register_script('admin-script', get_template_directory_uri() . '/includes/admin/scripts/admin-scripts.js', array('jquery'));
    wp_enqueue_script( 'admin-script');

    //To pass the url of the admin-ajax.php to the js file, which will be used for the ajax call
    wp_localize_script('admin-script', 'dataObj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => home_url('/')
    ));
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_files' );

function get_trips_list_php() {
    $data = $_POST['postId'];

    
    echo $data;
    wp_die(); // this is required to terminate immediately and return a proper response

}
add_action( 'wp_ajax_phpFunction_ajax', 'get_trips_list_php' );


if(isset($_GET['notice'])){

    /*
    * Messages for admin Notices.
    */
    $msg_1 = "New Trip Added Successfully.";
    $msg_2 = "Trip Deleted Successfully";
    $msg_3 = "Trip Updated Successfully";

    $msg_101 = "Operation Failed. DataBase Error Occured. Please contact to the developers";
    $msg_102 = "Operation Failed. Trip with the same start date is already exist on this tour. Please update the same.";




    $msg_code = $_GET['notice'];

    if($msg_code < 100 )
        $classes = 'updated';
    else
        $classes = 'notice-error';

    if(isset(${'msg_'.$msg_code})){
        ?>
            <div class="<?php echo $classes ?> notice is-dismissible">
                <p><?php _e( ${'msg_'.$msg_code}, 'safarihelps' ); ?></p>
            </div>
        <?php
    }

}

?>