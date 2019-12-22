<?php 

function insert_trip($POST){
    global $wpdb;
    $wpdb->hide_errors();

    $tour_id = $POST['tour_id'];
    $tour_name = $POST['tour_name'];  
    $start_date = $POST['start_date'];
    $duration = $POST['duration'];
    $total_seats = $POST['total_seats'];
    $booked_seats = $POST['booked_seats'];
    $price = $POST['price'];
    $advance_price = $POST['advance_price'];
    $disabled = $POST['disabled'];

    $table = $wpdb->prefix."trip_items";
    $data = array(
        'tour_id' => $tour_id,
        'tour_name' => $tour_name,
        'start_date' => $start_date,
        'duration' => $duration,
        'total_seats'=> $total_seats,
        'booked_seats'=> $booked_seats,
        'price'=> $price,
        'advance_price'=> $advance_price,
        'disabled'=> $disabled
    );
    $format = array(
        '%d', 
        '%s',
        '%s',
        '%d',
        '%d',
        '%d',
        '%d',
        '%d',
        '%s'
    );

    $wpdb-> insert($table, $data, $format);
    $notice=0;

    if($wpdb->last_error !== '') {

        if(strpos($wpdb->last_error, "uplicate entry") && strpos($wpdb->last_error, "start_date")){
            $notice = 102;
        }
        else {
            $notice = 101;
        }
    }
    else {
        $notice = 1;
    }
    wp_safe_redirect(admin_url().'admin.php?page=trips-list&tour_id='.$_POST['tour_id'].'&notice='.$notice);
    exit();
}

function delete_trip($trip_id){
    global $wpdb;

    $wpdb->delete(  
        $wpdb->prefix."trip_items", 
        array( 'trip_id' => $trip_id ), 
        array( '%d' ) 
    );
}

function get_trip_by_id($trip_id){
    global $wpdb;
    $table = $wpdb->prefix."trip_items";
    $trip = $wpdb->get_row( "SELECT * FROM $table WHERE trip_id = ".$trip_id, ARRAY_A  );
    return $trip;
}

function update_trip($POST){
    global $wpdb;
    $table = $wpdb->prefix."trip_items";

    $wpdb->update( 
        $table, 
        array( 
            'start_date' => $POST['start_date'],
            'duration' => $POST['duration'],
            'total_seats'=> $POST['total_seats'],
            'booked_seats'=> $POST['booked_seats'],
            'price'=> $POST['price'],
            'advance_price'=> $POST['advance_price'],
            'disabled'=> $POST['disabled']
        ),
        array( 'trip_id' => $POST['trip_id'] ),  
        array( 
            '%s',	// value1
            '%d',	// value2
            '%d',
            '%d',
            '%d',
            '%d',
            '%s'
        ), 
        array( '%d' ) //trip_id format, where clause properties
    );

    wp_safe_redirect(admin_url().'admin.php?page=trips-list&trip_id='.$POST['trip_id'].'&action=edit&notice=3');
    exit();
}

function get_all_trips_by_tour_id($tour_id ){

    global $wpdb;
    $table = $wpdb->prefix.'trip_items';
    $trips_list = $wpdb->get_results("SELECT * FROM $table where tour_id = $tour_id", ARRAY_A);

    return $trips_list;

}

?>