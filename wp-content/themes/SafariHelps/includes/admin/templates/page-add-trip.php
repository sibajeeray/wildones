<?php 

    if(isset($_POST['send_tour_id_n_name']) && is_user_logged_in()) 
    {
        $tour_details = $_POST['tour_details']; // In the format of tour_id::tour_name

        $data = explode("::",$tour_details);
        $tour_id = $data[0];
        $tour_name = $data[1];
    }
    else {
        $tour_id = 0;
        $tour_name = '';
    }

    if(!$tour_id || !$tour_name) {
        $tour_args = array(
            'numberposts' => -1,
            'post_type'   => 'tours'
        );
        
        $tours = get_posts( $tour_args );
        ?>

            <div class="no_id wrap">
                <div class="no_id_content">
                    <h1>Please select tour to check the trips list</h1>
                    <form action="<?php echo admin_url().'admin.php?page=add-new-trip' ?>" method="post">
                        <select class="wp-heading-inline" name="tour_details" required>
                            <option value="" selected >--Please choose a tour--</option>
                            <?php 
                                foreach($tours as $tour){
                                    ?>
                                        <option value="<?php echo $tour->ID.'::'.$tour->post_title ?>"> <?php echo $tour->post_title ?> </option>
                                    <?php
                                }
                            ?>
                        </select>
                        <input class="page-title-action" type="submit" name="send_tour_id_n_name" value="Go" >
                    </form>
                    <hr class="wp-header-end">
                </div>
            </div>

        <?php
    }
    else {
        ?>
            <div id="add_trip" class="wrap">
                <h1>Add New trip to the tour : <strong><?php echo $tour_name ?></strong></h1>
                <form method="post">
                    <table class="form-table">
                        <tr valign='top'>
                            <th scope="row">Start Date :</th>
                            <td>
                                <input type="date" name="start_date" min=<?php echo date("Y-m-d"); ?> required />
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Duration(Days) :</th>
                            <td>
                                <input type="number" name="duration" required min=1>
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Total No of Seats : </th>
                            <td>
                                <input type="number" name="total_seats" required min=1>
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Full Price (USD) :</th>
                            <td>
                                <input type="number" name="price" required min=1>
                            </td>
                        </tr>
                        <tr valign='top'>
                            <th scope="row">Advance to be paid :</th>
                            <td>
                                <input type="number" name="advance_price" required min=1>
                            </td>
                        </tr>
                        
                            <input type="hidden" name="tour_name" value="<?php echo $tour_name ?>" required>
                            <input type="hidden" name="tour_id" value=<?php echo $tour_id ?> required>
                            <input type="hidden" name="booked_seats" value=0 required>
                            <input type="hidden" name="disabled" value="false" required>
                            <input type="hidden" name="secret" value=9556649 required>
                        </table>
                    <?php submit_button( __( 'Create Trip', 'safarihelps' ), 'primary', 'create_trip' ); ?>
                </form>
            </div>
        <?php
    }
?>



