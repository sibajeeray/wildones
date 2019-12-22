<?php 
    function safarihelps_database(){
        global $wpdb;
        global $safarihelps_db_version; 
        $safarihelps_db_version = '1.0';
        
        $table = $wpdb->prefix.'trip_items';
        $charset_collate = $wpdb->get_charset_collate();

        //SQL Query
        $sql = "CREATE TABLE $table (
            trip_id mediumint(9) NOT NULL AUTO_INCREMENT,
            tour_id  mediumint(9) NOT NULL,
            tour_name varchar(300) NOT NULL,
            start_date date NOT NULL,
            duration mediumint(9) NOT NULL,
            total_seats mediumint(3) NOT NULL,
            booked_seats mediumint(3) NOT NULL,
            price mediumint(5) NOT NULL,
            advance_price mediumint(5) NOT NULL,
            disabled varchar(50) DEFAULT 'false' NOT NULL,
            PRIMARY KEY (trip_id),
            UNIQUE KEY `uc_start_date_tour_id` (`tour_id` , `start_date`)
        ) $charset_collate;";

        require_once(ABSPATH. 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
    add_action('after_setup_theme', 'safarihelps_database');
?>