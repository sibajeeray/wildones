<?php 

//Show trip list GET request
if( !isset($_GET['action']) && isset($_GET['get_tour_id']) && isset($_GET['tour_id']) && is_user_logged_in()){
    wp_safe_redirect(admin_url().'admin.php?page=trips-list&tour_id='.$_GET['tour_id']);
}

//Edit or Delete trip GET request
if( isset($_GET['action']) && isset($_GET['tour_id']) && isset($_GET['trip_id']) && is_user_logged_in()){
    $tour_id = $_GET['tour_id'];
    $trip_id = $_GET['trip_id'];
    $action = $_GET['action'];
    if($action === 'edit'){
        wp_safe_redirect(admin_url().'admin.php?page=trips-list&trip_id='.$trip_id.'&action=edit');
        exit();
    }
    elseif($action === 'delete'){
        delete_trip($trip_id);
        wp_safe_redirect(admin_url().'admin.php?page=trips-list&tour_id='.$tour_id.'&notice=2');
        exit();
    }
        
}

//New trip creation request(POST)
if(isset($_POST['create_trip']) && $_POST['secret'] == 9556649 && is_user_logged_in()) {
    insert_trip($_POST);
}

//Update trip request
if(isset($_POST['update_trip']) && is_user_logged_in()){
    update_trip($_POST);
}

?>