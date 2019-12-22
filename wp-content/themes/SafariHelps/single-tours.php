<?php get_header(); 
  while(have_posts()) { 
    the_post(); 

    $custom_fields = get_field("single_tour_custom_fields");
    $custom_fields['tour_meta'] = array_filter($custom_fields['tour_meta']);
    $custom_fields['itineraries'] = array_filter($custom_fields['itineraries'], function ($var) {
      return ($var['description']);
    });


	  // echo "<pre>";
	  // print_r($custom_fields["accommodations"]);
	  // echo "</pre>";

    $itinerary_arr = array_filter($custom_fields['itineraries'], function ($var) {
      return ($var['description']);
    });
    $itinerary_arr_size = count($itinerary_arr);

    $hotels = $custom_fields['accommodations']["hotels"] ;
    $hotels = array_filter($hotels, function ($var) {
      return ($var['descriptions']);
    });
    $hotel_arr_size = count($hotels);


    if(!empty($custom_fields['tour_meta']) || !empty($custom_fields['itineraries'])) 
    {

?>


<div id="single-tours">

  <!-- Banner Start -->
  <div class="inner-banner position-relative">
    <img class="w-100 big" src="<?php echo get_the_post_thumbnail_url(null,'banner') ?>" alt="" />
    <span class="overlay"></span>
    <div class="desc position-absolute w-100 text-center">
      <div class="container">
        <div class="text-block">
          <h2 class="text-white m-0 p-0"><?php echo $custom_fields['header_section']['tag_line']; ?></h2>
          <h1 class="text-white d-inline-block position-relative"><?php the_title() ?></h1>
          <p class="text-white m-0"><?php echo $custom_fields['header_section']['tour_description']; ?></p>
          <ul>
            <li class="d-inline-block"><img src="<?php echo get_template_directory_uri() ?>/assets/images/star-img.png"
                alt="" /></li>
            <!-- <li class="d-inline-block text-white m-0 p-0">914 reviews</li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner End -->

  <!-- Details-block Start -->
  <div class="details-block m-0">
    <div class="container">
      <div class="block float-left m-0">
        <h2 class="text-white m-0"><span><img
              src="<?php echo get_template_directory_uri() ?>/assets/images/doller-icon.png"></span>price from</h2>
        <h3 class="text-white m-0">
          <?php if(isset( $custom_fields['tour_meta']['minimum_price'])) echo "<strong>£ </strong>". $custom_fields['tour_meta']['minimum_price'];  ?>
        </h3>
      </div>
      <div class="block float-left m-0">
        <h2 class="text-white m-0"><span><img
              src="<?php echo get_template_directory_uri() ?>/assets/images/deposit-icon.png"></span>Deposit</h2>
        <h3 class="text-white h3-small m-0"><strong> </strong>Just 10% of the trip cost</h3>
      </div>
      <div class="block float-left m-0">
        <h2 class="text-white m-0"><span><img
              src="<?php echo get_template_directory_uri() ?>/assets/images/clock-icon.png"></span>Tour Length</h2>
        <h3 class="text-white m-0"><?php echo $custom_fields['tour_meta']['tour_duration'] ?> Days</h3>
      </div>
      <div class="block float-left m-0">
        <a class="d-inline-block rounded-30 m-0" data-toggle="modal" data-target="#booking-page" href="#">Book a
          Trip</a>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- Details-block Start -->

  <!-- About-tour Start -->
  <div class="about-tour m-0">
    <div class="container">
      <div class="row">
        <div id="about-left" class="col-md-7 ">
          <!--  align-self-center -->
          <div class="lt-block m-0">
            <div class="upper-text">
              <h2 class="position-relative">ABOUT <strong>YOUR TRIP</strong></h2>
              <div class="about-contents">
                <?php the_content(); ?>
              </div>
            </div>
            <div class="lower-img d-inline-block">
              <img class="mw-100 h-auto"
                src="<?php if(isset($custom_fields['tour_meta']['route_map'])) echo wp_get_attachment_image_src( $custom_fields['tour_meta']['route_map'], 'large')[0]; else echo wp_get_attachment_image_src( 72, 'large')[0];  ?>"
                alt="" />
            </div>
          </div>
        </div>
        <div id="about-right" class="col-md-5">
          <div class="rt-block bg-white m-0">
            <h3 class="m-0">tour Itinenaries</h3>
            <div id="jsScroll" class="bottom-section position-relative">
              <div class="thumb">
                <h4>FLIGHT</h4>
                <h5>(Please remember to book separately)</h5>
              </div>

              <?php
                for ($i = 1; $i <= $itinerary_arr_size; $i++) {
                  $itinerary_day_no = 'day_' . $i;
                  ?>
              <div class="thumb">
                <h4>DAY

                  <?php 
					
					
					if( isset($itinerary_arr[$itinerary_day_no]["manual_day_no"]) && $itinerary_arr[$itinerary_day_no]["manual_day_no"]){
						echo $itinerary_arr[$itinerary_day_no]["manual_day_no"];
					}
					else {
						if($i < 10) echo "0"; 
						echo $i;
					}
					

						  
						  ?>


                </h4>
                <h5><?php echo $itinerary_arr[$itinerary_day_no]["short_headline"]?></h5>
              </div>
              <?php
                }
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About-tour End -->

  <!-- Included-section Start -->
  <div class="included-section m-0 position-relative">
    <div class=container>
      <div class="left-side float-md-left m-0">
        <h2 class="text-white position-relative">WHAT'S INCLUDED</h2>
        <p class="text-white">Remember, international flights aren't included. We'll be happy to help you finding the
          best one for you.</p>
      </div>
      <div class="right-side float-md-right m-0 p-0">
        <div class="section float-left w-50 m-0">
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/accommodation-icon.png" alt="" />
            </div>
            <div class="text">
              <h5>Accommodation</h5>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/equipment-icon.png" alt="" />
            </div>
            <div class="text">
              <h5>Equipment</h5>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/guide-icon.png" alt="" />
            </div>
            <div class="text">
              <h5>Guide</h5>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/local-transport-icon.png" alt="" />
            </div>
            <div class="text">
              <h5>Local <strong>transport</strong></h5>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="section float-left w-50 m-0">
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/meals-icon.png" alt="" />
            </div>
            <div class="text">
              <h5>Most meals <strong>included</strong></h5>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/flashpacker-icon.png" alt="" />
            </div>
            <div class="text">
              <h5>Max 14 <strong>Flashpackers</strong></h5>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/protected-icon.png" alt="" />
            </div>
            <div class="text">
              <h5>WildOnes <strong>Goodie Bag</strong></h5>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/car-icon.png" alt="" />
            </div>
            <div class="text">
              <h5>Private airport <strong>transfers</strong></h5>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- Included-section End -->

  <!-- Tours-panel Start -->
  <div class="tours-panel">
    <div class="container">
      <h2 class="text-center m-0">our tours</h2>
      <div class="thumb-panel m-0 p-0 position-relative">

        <?php

          for ($i = 1; $i <= $itinerary_arr_size; $i++) {
            $itinerary_day_no = 'day_' . $i;

            if(!$itinerary_arr[$itinerary_day_no]['image_1']) {
              $itinerary_arr[$itinerary_day_no]['image_1'] = 496; 
            };
            if(!$itinerary_arr[$itinerary_day_no]['image_2']) {
              $itinerary_arr[$itinerary_day_no]['image_2'] = 496; 
            };

        ?>
            <div class="thumb position-relative">
              <div class="top-img">
                <img
                  src="<?php  echo wp_get_attachment_image_src( $itinerary_arr[$itinerary_day_no]['image_1'] , 'mid-size')[0]?>"
                  alt="" />
                <div class="day">
                  <h5>DAY <strong>
                  <?php 		
                    if( isset($itinerary_arr[$itinerary_day_no]["manual_day_no"]) && $itinerary_arr[$itinerary_day_no]["manual_day_no"]){
                      echo $itinerary_arr[$itinerary_day_no]["manual_day_no"];
                    }
                    else {
                      if($i < 10) echo "0"; 
                      echo $i;
                    }
                  ?>
                </strong></h5>
                </div>
              </div>
              <div class="bottom-img">
                <img
                  src="<?php echo wp_get_attachment_image_src( $itinerary_arr[$itinerary_day_no]['image_2'], 'mid-size')[0] ?>"
                  alt="" />
              </div>

              <div class="text-box">
                <div class="text-box-contents">
                  <h3> <?php echo $itinerary_arr[$itinerary_day_no]['headline'] ?> </h3>
                  <div class="itinerary_desc">
                    <?php echo $itinerary_arr[$itinerary_day_no]['description'] ?>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
        <?php
          }
        ?>

      </div>
    </div>
  </div>
  <!-- Tours-panel End -->

  <!-- Favourite-hotel Start -->
  <?php 
    if($hotel_arr_size > 0){
      ?>

      <div class="favourite-hotel">
        <div class="container">
          <div class="top-panel text-center">
            <h2 class="position-relative">OUR FAVOURITE HOTELS</h2>
            <div id="accd-desc" class="m-0 pb-lg-5 pb-md-4"><?php echo $custom_fields["accommodations"]["accommodation_descriptions"] ?></div>
          </div>

          <div class="bottom-panel m-0 p-0">

            <?php

            for ($i = 1; $i <= $hotel_arr_size; $i++) {
              $hotel_no = 'accommodation_' . $i;

              if(!$hotels[$hotel_no]['hotel_image']) {
                $hotels[$hotel_no]['hotel_image'] = 496; 
              };
              
            ?>

              <div class="section position-relative">
                <div class="img-block">
                  <img src="<?php  echo wp_get_attachment_image_src( $hotels[$hotel_no]['hotel_image'] , 'slides')[0]?>" alt="" />
                </div>
                <div class="text-block">
                  <h3><?php echo $hotels[$hotel_no]['destination'] ?></h3>
                  <h4><?php echo $hotels[$hotel_no]['hotel_name'] ?></h4>
                  <div class="hotel-desc"><?php echo $hotels[$hotel_no]['descriptions'] ?></div>
                </div>
                <div class="clearfix"></div>
              </div>

            <?php
              }
            ?>

          </div>

        </div>
      </div>

      <?php
    }
  ?>
  <!-- Favourite-hotel End -->

  <!-- Why-travels Start -->
  <div class="why-travels our-promise m-0 pt-5 pb-5">
    <div class="container">
      <h2 class="text-center text-white position-relative">OUR PROMISE</h2>
      <p class="text-white text-center m-0 pb-4">Joining the Wild Ones community comes with a few special guarantees...
      </p>
      <div class="lower-section m-0 p-0">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="box text-center mb-md-5 mb-sm-4 mb-4">
              <div class="icon d-inline-block m-0 pb-3 position-relative">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/people-icon.png" alt="" />
              </div>
              <h3 class="text-white mb-3 pb-3 position-relative">THE PEOPLE</h3>
              <p class=" text-white m-0 pb-3">Wild Ones trips are for adventurous, special women aged 18 and over.
                You’re welcome to join us solo or come with friends. </p>
              <!--               <a class="d-inline-block text-white m-0 position-relative" href="#">LOAD MORE</a> -->
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box text-center mb-md-5 mb-sm-4 mb-4">
              <div class="icon d-inline-block m-0 pb-3 position-relative">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/trips-icon.png" alt="" />
              </div>
              <h3 class="text-white mb-3 pb-3 position-relative">THE TRIPS</h3>
              <p class=" text-white m-0 pb-3">Thanks to our expert teams in the countries where we explore, you’ll have
                unique access to those off-the-beaten track locations that most travellers never have the opportunity to
                visit.</p>
              <!--               <a class="d-inline-block text-white m-0 position-relative" href="#">LOAD MORE</a> -->
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box text-center mb-md-5 mb-sm-4 mb-4">
              <div class="icon d-inline-block m-0 pb-3 position-relative">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/guides-icon.png" alt="" />
              </div>
              <h3 class="text-white mb-3 pb-3 position-relative">THE GUIDES</h3>
              <p class=" text-white m-0 pb-3">The Wild Ones have a hand-picked selection of the very best
                English-speaking female guides in each country where we operate. You’re guaranteed the very best service
                throughout.</p>
              <!--               <a class="d-inline-block text-white m-0 position-relative" href="#">LOAD MORE</a> -->
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="box text-center mb-md-5 mb-sm-4 mb-4">
              <div class="icon d-inline-block m-0 pb-3 position-relative">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/ease-icon.png" alt="" />
              </div>
              <h3 class="text-white mb-3 pb-3 position-relative">THE EASE</h3>
              <p class=" text-white m-0 pb-3">Your own personal Customer Experience manager will help to ensure that
                you’re full prepared and have all of the information you need so that you can just relax and enjoy your
                trip to its fullest.</p>
              <!--               <a class="d-inline-block text-white m-0 position-relative" href="#">LOAD MORE</a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Why-travels End -->

  <!-- Similar-trips Start -->
  <div class="similar-trips m-0">
    <div class="container">
      <h2 class="text-center m-0 pb-sm-5">Similar Trips</h2>
    </div>
    <div class="slider-block">
      <div class="loop owl-carousel owl-theme">

        <?php 
            $term_list = wp_get_post_terms( $post->ID, ['category','country'], array());
            $args = array( 
              'post_type'       => 'tours',
              'post__not_in'    => array( get_the_ID() ),
              'posts_per_page' => '6',
              'order'           => 'rand',
              'tax_query' => array(
                'relation' => 'OR',
                array(
                  'taxonomy' => $term_list[0]->taxonomy,
                  'field'    => 'slug',
                  'terms' => $term_list[0]->slug
                ),
                array(
                  'taxonomy' => $term_list[1]->taxonomy,
                  'field'    => 'slug',
                  'terms' => $term_list[1]->slug
                )
              )
            );
            $tours = new WP_Query($args);
            while($tours -> have_posts()){
                $tours -> the_post(); 
            ?>
        <div class="item">
          <div class="box">
            <img src="<?php echo get_the_post_thumbnail_url(null,'slides') ?>" alt="" />
            <div class="text">
              <h3><?php the_title(); ?></h3>
              <div><?php echo trim_contents(get_the_excerpt(), 350); ?></div>
              <a href="<?php echo the_permalink() ?>">MORE INFO</a>
            </div>
          </div>
        </div>

        <?php 
            }
            wp_reset_postdata();
        ?>

      </div>
    </div>
  </div>
  <!-- Similar-trips End -->

  <!-- Whats-excluded Start -->
  <div class="whats-excluded">
    <div class="container">
      <h2 class="p-0 position-relative"><span class="bg-white pr-2 position-relative">What's Excluded</span></h2>
      <div class="lower-box row">
        <div class="col-6 col-sm-4 col-lg-2">
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/dinner.png" alt="" />
            </div>
            <h3>Meals & drinks, other than those included</h3>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/money.png" alt="" />
            </div>
            <h3>Spending money</h3>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/insurance.png" alt="" />
            </div>
            <h3>Travel and medical insurance</h3>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/visa.png" alt="" />
            </div>
            <h3>Visa (if required)</h3>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/tips.png" alt="" />
            </div>
            <h3>Tips & Gratuities</h3>
          </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
          <div class="block">
            <div class="icon">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/flight.png" alt="" />
            </div>
            <h3>Return flight</h3>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- Whats-excluded End -->

</div> <!-- #single-tours END -->

<?php 
    } // end of if data are empty
    else {
      ?>
<style>
  .navbar-default {
    border-color: rgba(255, 255, 255, .2) !important;
    background-color: #f03577;
  }
</style>
<div class="no-content" style="display: table; height: 400px; width: 100%">
  <div class="msg" style="display: table-cell; vertical-align: middle; text-align: center; color: red">
    <h4>All the contents are not added to this trip</h4>
  </div>
</div>
<?php    
    }

?>

<!-- BOOKING PAGE MODAL START -->
<div class="modal fade" id="booking-page" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <!-- modal-dialog-centered -->
    <div class="modal-content">
      <div class=close-btn>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="container">

          <div class="headings">
            <h4>Choose dates for your trip to <?php the_title(); ?></h4>
            <h5><?php echo $custom_fields['tour_meta']['tour_duration'] ?> Days trip, Price starting from
              <?php if(isset( $custom_fields['tour_meta']['minimum_price'])) echo "<strong>£ </strong>". $custom_fields['tour_meta']['minimum_price']; else echo "XXXXX"  ?>
            </h5>
          </div>

          <div class="date-sec">

            <ul class="trip-lists">

              <?php
                global $wpdb;
                $table = $wpdb->prefix.'trip_items';
                $tour_id = get_the_ID();
                $trips_list = $wpdb->get_results(
                  "SELECT CONCAT(MONTH(start_date),'_', YEAR(start_date)) as month_year, 
                  GROUP_CONCAT(
                  start_date, ':', 
                  duration, ':', 
                  total_seats, ':',
                  booked_seats, ':',
                  price, ':',
                  advance_price
                  ) as data 
                  FROM $table where tour_id = $tour_id AND disabled = 'false'
                  GROUP BY YEAR(start_date), MONTH(start_date)"
                  , ARRAY_A
                );

                if($trips_list && $trips_list[0]){
                  foreach($trips_list as $trip_month){
                    $month_year =  explode("_",$trip_month['month_year']);
                    $year = $month_year[1];

                    $month_no = $month_year[0];
                    $dateObj   = DateTime::createFromFormat('!m', $month_no);
                    $month_name = $dateObj->format('F');

                    $trip_data =  explode(",",$trip_month['data']);

                    $trip_array = array();

                    foreach($trip_data as $trip_info){
                      $trip = array();
                      $trip_data_set = explode(":", $trip_info);
                      $trip['start_date'] = $trip_data_set[0];
                      $trip['no_of_days'] = $trip_data_set[1];
                      $trip['total_seats'] = $trip_data_set[2];
                      $trip['booked_seats'] = $trip_data_set[3];
                      $trip['price'] = $trip_data_set[4];
                      $trip['advance_price'] = $trip_data_set[5];
                      array_push($trip_array, $trip);
                    }

                    ?>

                      <li>

                        <p class="date-button collapsed" data-toggle="collapse" data-target="#<?php echo $month_name."-".$year ?>"><?php echo $month_name.", ".$year ?></p>

                        <div id="<?php echo $month_name."-".$year ?>" class="collapse trips">

                        <?php 
                          foreach($trip_array as $trip){

                            $startDate = date('D d M', strtotime(date($trip["start_date"])));
                            $endDateRaw =Date('Y-m-d', strtotime($trip["start_date"]."+".$trip["no_of_days"]." days"));
                            $endDate = date('D d M', strtotime($endDateRaw));
                            $leftSeats = $trip["total_seats"]- $trip["booked_seats"];
                
                            ?>

                              <div class="trip row">
                                <div class="col-md-5 align-self-center">
                                  <h5><?php echo $startDate . " - ". $endDate; ?> </h5>
                                  <p class="seats"><?php echo $leftSeats. " seats Left"?></p>
                                </div>
                                <div class="col-md-4 align-self-center">
                                  <p>Total £<?php echo $trip["price"]; ?></p>
                                  <p>£<?php echo $trip["advance_price"]; ?> deposite</p>
                                </div>
                                <div class="col-md-3 align-self-center"><a href="#" class="book-link <?php if($leftSeats <= 0) echo "disabled" ?>" ><span class="book-btn">Book Now</span></a></div>
                              </div>

                            <?php
                          }
                        ?>

                        </div>

                      </li>

                    <?php
                  }
                }
                else {
                  ?>
                    <div class="no_trips text-center">
                      <h3>SORRY :) NO TRIP AVAILABLE NOW FOR THIS TOUR</h3>
                    </div>
                  <?php
                }

              ?>
            </ul>
          </div>


        </div>
      </div>


    </div>
  </div>
</div>
<!-- BOOKING PAGE MODAL END -->


<?php
  }// end of the loop
  get_footer(); 
?>