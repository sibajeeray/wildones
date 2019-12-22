<?php

    $tour_args = array(
        'numberposts' => -1,
        'post_type'   => 'tours'
    );
    
    $tours = get_posts( $tour_args );
?>

<div id="priv_tour_list" class="wrap">
    <h1 class="text-center">Tours List</h1>
    <table class="wp-list-table widefat striped">
        <tbody>         
            <?php
                foreach($tours as $tour){
                    ?>
                        <tr>
                            <td><?php echo $tour->ID ?></td>
                            <td><a href="<?php echo $tour->guid ?>" target="_blank" ><?php echo $tour->post_title ?></a></td>
                            <td><a href="<?php echo home_url(); ?>/wp-admin/admin.php?page=trips-list&tour_id=<?php echo $tour->ID ?>"><button >Check</button></a></td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>
    