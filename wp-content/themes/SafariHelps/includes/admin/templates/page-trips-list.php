<?php 
    if(!isset($_GET['action']) && isset($_GET['tour_id']) && is_user_logged_in()) {
        $tour_id = $_GET['tour_id'];
    }
    else if(isset($_GET['action']) && isset($_GET['trip_id']) && $_GET['action']=== "edit" && is_user_logged_in() ){
        
        $trip = get_trip_by_id($_GET['trip_id']);
        ?>
            <div id="update_trip" class="wrap">
                <h1 class="wp-heading-inline">Update this trip of tour : <strong><?php echo $trip['tour_name'] ?></strong></h1>
                <hr class="wp-header-end">
                <form method="post">
                    <table class="form-table">
                        <tr valign='top'>
                            <th scope="row">Start Date :</th>
                            <td>
                                <input type="date" name="start_date" min=<?php echo date("Y-m-d"); ?> value='<?php echo $trip['start_date']?>' required />
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Duration(Days) :</th>
                            <td>
                                <input type="number" name="duration" value='<?php echo $trip['duration']?>' required min=1>
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Total No of Seats : </th>
                            <td>
                                <input type="number" name="total_seats"  value='<?php echo $trip['total_seats']?>' required min=1>
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Booked Seats : </th>
                            <td>
                                <input type="number" name="booked_seats"  value='<?php echo $trip['booked_seats']?>' required min=0>
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Full Price (USD) :</th>
                            <td>
                                <input type="number" name="price"  value='<?php echo $trip['price']?>' required min=1>
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Advance to be paid :</th>
                            <td>
                                <input type="number" name="advance_price"  value='<?php echo $trip['advance_price']?>' required min=1>
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Disable the Trip:</th>
                            <td>
                                <select class="wp-heading-inline" name="disabled" required>
                                    <option value="true" <?php if($trip['disabled']==="true") echo "selected"?>> Yes </option>
                                    <option value="false" <?php if($trip['disabled']==="false") echo "selected"?>> No </option>
                                </select>
                            </td>
                        </tr>
    
                        <input type="hidden" name="trip_id" value="<?php echo $trip['trip_id'] ?>" required>
                        
                    </table>
                    <?php submit_button( __( 'Update Trip', 'safarihelps' ), 'primary', 'update_trip' ); ?>
                </form>
            </div>
        <?php
        return;
    }
    else $tour_id = 0;

    if(!$tour_id) {
        $tour_args = array(
            'numberposts' => -1,
            'post_type'   => 'tours'
        );
        $tours = get_posts( $tour_args );
?>

    <div class="no_id wrap">
        <div class="no_id_content">
            <h1>Please select tour to check the trips list</h1>
            <form method="get">
                <select class="wp-heading-inline" name="tour_id" required>
                    <option value="" selected >--Please choose a tour--</option>
                    <?php 
                        foreach($tours as $tour){
                            ?>
                                <option value="<?php echo $tour->ID ?>"> <?php echo $tour->post_title ?> </option>
                            <?php
                        }
                    ?>
                </select>
                <input class="page-title-action" type="submit" name="get_tour_id" value="Check Trips" >
            </form>
            <hr class="wp-header-end">
        </div>
    </div>

<?php
    }
    else {
?>

    <div class="wrap">
        <?php
            $trips_list = get_all_trips_by_tour_id($tour_id);

            if($trips_list && $trips_list[0]){
                ?>
                    <h1 class="wp-heading-inline">Trips List of tour : <strong><?php echo "". $trips_list[0]["tour_name"] ?></strong></h1>
                    <form style="display: inline-block" action="<?php echo admin_url().'admin.php?page=add-new-trip'?>" method="post">
                        <input type="hidden" name="tour_details" value="<?php echo $tour_id.'::'.$trips_list[0]["tour_name"] ?>" >
                        <input class="page-title-action" type="submit" name="send_tour_id_n_name" value="Add New" >
                    </form>
                    <hr class="wp-header-end">
                    
                    <table class="wp-list-table widefat striped">
                        <thead>
                            <tr>
                                <th class="manage-column">ID</th>
                                <th class="manage-column">Start Date</th>
                                <th class="manage-column">Duration</th>
                                <th class="manage-column">Total Seats</th>
                                <th class="manage-column">Booked Seats</th>
                                <th class="manage-column">Price</th>
                                <th class="manage-column">Advance</th>
                                <th class="manage-column">Disabled</th>
                                <th class="manage-column">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($trips_list as $trip){ ?>
                                    <tr>
                                        <td><?php echo $trip['trip_id'] ?></td>
                                        <td><?php echo $trip['start_date'];  ?></td>
                                        <td><?php echo $trip['duration'] ?></td>
                                        <td><?php echo $trip['total_seats'] ?></td>
                                        <td><?php echo $trip['booked_seats'] ?></td>
                                        <td><?php echo $trip['price'] ?></td>
                                        <td><?php echo $trip['advance_price'] ?></td>
                                        <td><?php if($trip['disabled'] === 'false') echo "NO"; elseif($trip['disabled'] === 'true') echo "YES" ?></td>
                                        <td>
                                            <a href="<?php echo home_url(); ?>/wp-admin/admin.php?page=trips-list&tour_id=<?php echo $tour_id ?>&action=edit&trip_id=<?php echo $trip['trip_id']?>" class="pr-2" > Edit </a> 
                                            <a href="<?php echo home_url(); ?>/wp-admin/admin.php?page=trips-list&tour_id=<?php echo $tour_id ?>&action=delete&trip_id=<?php echo $trip['trip_id']?>" > Delete </a>
                                        </td>
                                    </tr>
                            <?php       
                                } 
                            ?>
                        </tbody>
                    </table>
                <?php
            }
            else {
                $tour   = get_post( $tour_id );
                $tour_name = $tour->post_title;
                ?>
                    <div class="no_id">
                        <div class="no_id_content">
                            <h1 class='wp-heading-inline' >No trips available for this tour</h1>
                            <form style="display: inline" action="<?php echo admin_url().'admin.php?page=add-new-trip'?>" method="post">
                                <input type="hidden" name="tour_details" value="<?php echo $tour_id.'::'.$tour_name ?>" >
                                <input class="page-title-action" type="submit" name="send_tour_id_n_name" value="Add New" >
                            </form>
                            <hr class="wp-header-end">
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
<?php
    }
?>

