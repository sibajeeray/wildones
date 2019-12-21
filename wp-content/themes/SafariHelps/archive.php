<?php get_header(); 

    $tour_category = get_queried_object();
    $tour_cat_name = $tour_category->name;
    $tour_cat_slug = $tour_category->slug;
    
    $custom_fields = get_field('taxonomy_custom_fields', $tour_category);        
?>

<div id="archive">
<!-- Banner Start -->
<div class="inner-banner position-relative">
  <img class="w-100 big" src="<?php echo wp_get_attachment_image_src( $custom_fields['banner']['banner_image'], 'banner')[0] ?>" alt="" />
    <div class="desc position-absolute w-100 text-center">
        <div class="container">
            <div class="text-block">
                <h1 class="text-white d-inline-block position-relative"><?php echo $tour_cat_name ?> Tours</h1>
                <p class="text-white m-0"><?php echo $custom_fields['banner']['banner_description'] ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Listing-content Start -->
<div class="listing-content text-center m-0">
  <div class="container">
    <h2 class="position-relative"><?php echo $custom_fields['contents']['heading'] ?></h2>
    <div class="m-0"><?php echo $custom_fields['contents']['details'] ?></div>
  </div>
</div>
<!-- Listing-content End -->

<!-- Tour-listing Start -->
<div class="tour-listing">
  <div class="container">
    <div class="row justify-content-center">
        
    <?php 
    
		$args = array(
		'post_type'         => 'tours',
		'posts_per_page'    => 20,
		'tax_query' => array(
			array(
				'taxonomy' => $tour_category->taxonomy,   // taxonomy name
				'field' => 'slug',                        // term_id/slug/name
				'terms' => $tour_cat_slug                 // term id, term slug or term name
			)
		  )
		);
		$tours = new WP_Query($args);

	   if ($tours->have_posts()) {
		   while ($tours->have_posts()) {
			   $tours->the_post();
			   $tour_custom_fields = get_field("single_tour_custom_fields");
?>
			   
			   <div class="col-sm-6 col-md-4">
				<div class="box text-center bg-white p-0">
				  <div class="image-block position-relative m-0 p-0">
					<img class="w-100 h-auto" src="<?php echo get_the_post_thumbnail_url(null,'slides') ?>" alt=""/>
					<div class="time-block position-absolute">
					  <h5 class="d-inline-block text-uppercase text-white m-0"><?php echo $tour_custom_fields['tour_meta']['tour_duration'] ?> Days</h5>
					</div>
				  </div>
				  <div class="text-block m-0">
					<h3 class="text-uppercase position-relative"><?php the_title(); ?></h3>
					<p class="m-0 pb-4"><?php echo trim_contents(get_the_excerpt(), 132); ?></p>
					<a class="d-inline-block m-0" href="<?php the_permalink(); ?>">CHECK MORE</a>
				  </div>
				</div>
			  </div>
						 
<?php				 
						 
		   }
	   }
	   else {
		         ?>
        <style>
          .navbar-default {
            border-color: rgba(255,255,255,.2) !important;
            background-color: #f03577;
          }
        </style>
        <div class="no-content" style= "display: table; height: 400px; width: 100%">
            <div class="msg" style="display: table-cell; vertical-align: middle; text-align: center; color: red">
              <h4>No Tours Available in this Category</h4>
            </div>        
        </div>
      <?php 
	   }
    ?>
	</div>
	</div>
</div><!-- Tour-listing End -->
</div> <!--- #archive end --->

<?php get_footer(); ?>
