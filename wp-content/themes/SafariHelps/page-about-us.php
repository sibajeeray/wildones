<?php get_header(); ?>

<!-- Banner Start -->
<div class="inner-banner position-relative">
  <img class="w-100 big" src="<?php echo get_the_post_thumbnail_url(null,'banner') ?>" alt="" />
    <div class="desc position-absolute w-100 text-center">
        <div class="container">
            <div class="text-block">
                <h1 class="text-white d-inline-block position-relative">About Us</h1>
                <p class="text-white m-0">Aliquam eros felis, ultrices quis metus sed, blandit ornare dolor. Sed sed <strong>dui at enim sodales congue ac laoreet tortor.</strong></p>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- about-us Start -->
<div class="about-us text-center m-0">
  <div class="container">
    <h2 class="position-relative">About Us</h2>
    <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempor scelerisque erat sed mollis. Pellentesque ultrices suscipit magna et facilisis. Ut semper nulla pretium metus tincidunt tempus.</p>
  </div>
</div>
<!-- about-us End -->

<!-- all-block Start -->
<div class="all-block m-0">
  <div class="container">
    <div class="block position-relative m-lg-0">
      <div class="image-block m-0 p-0">
        <img class="mw-100 h-auto" src="<?php echo get_template_directory_uri() ?>/assets/images/travel-location-img01.jpg" alt="">
      </div>
      <div class="text-block position-absolute bg-white m-lg-0">
        <h3 class="text-dark position-relative">Lorem ipsum dolor</h3>
        <p>Maecenas tempor scelerisque erat sed mollis. Pellentesque ultrices suscipit magna et facilisis. Ut semper nulla pretium metus tincidunt tempus. Nam vel mollis felis, eu congue est.</p>
        <p>Nunc fringilla luctus metus eget cursus. Sed hendrerit lectus vel neque elementum, ut molestie odio hendrerit. Quisque ornare varius metus at pulvinar. Curabitur facilisis mauris a magna feugiat malesuada. Nullam rhoncus metus vitae mi imperdiet pharetra.</p>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="block position-relative m-lg-0">
      <div class="image-block m-0 p-0">
        <img class="mw-100 h-auto" src="<?php echo get_template_directory_uri() ?>/assets/images/travel-location-img02.jpg" alt="">
      </div>
      <div class="text-block position-absolute bg-white m-lg-0">
        <h3 class="text-dark position-relative">Aliquam eros felis</h3>
        <p>Sed sed dui at enim sodales congue ac laoreet tortor. Aenean a purus facilisis, volutpat odio vitae, sagittis felis. Praesent at porttitor metus. Cras in arcu non leo lobortis lobortis eu in diam.</p>
        <p>Cras semper ante quis tincidunt ornare. Aliquam erat volutpat. In dapibus lectus ac molestie efficitur. Suspendisse pretium, augue at convallis fringilla, enim mi commodo nunc, rhoncus pellentesque dolor orci et libero. Donec sed pretium tellus. Nullam in ultricies ex. In eget bibendum dolor. Curabitur ut arcu lacus. Integer iaculis vel dui sed tincidunt.</p>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!-- all-block End -->


<?php get_footer(); ?>