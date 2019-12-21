<?php get_header(); ?>

<!-- Banner Start -->
<div class="inner-banner position-relative">
  <img class="w-100 big" src="<?php echo get_the_post_thumbnail_url(null,'banner') ?>" alt="" />
    <div class="desc position-absolute w-100 text-center">
        <div class="container">
            <div class="text-block">
                <h1 class="text-white d-inline-block position-relative">Contact Us</h1>
                <p class="text-white m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas <strong>tempor scelerisque erat sed mollis.</strong></p>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Contact-section Start -->
<div class="contact-section m-0">
  <div class="container">
    <div class="mian-block position-relative">
      <div class="lt-block float-lg-left m-lg-0">
        <div class="box-block">
          <h2 class="text-dark m-0 pb-4">Contact 7travels</h2>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="thumb">
                <input type="text" placeholder="Name" class="form-control" />
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="thumb">
                <input type="email" placeholder="Email" class="form-control" />
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="thumb">
                <input type="tel" placeholder="Phone" class="form-control" />
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="thumb">
                <input type="text" placeholder="Location" class="form-control" />
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="thumb">
                <input type="date" placeholder="dd/mm/yyyy" class="form-control" />
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="thumb">
                <textarea placeholder="Enquiry" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-12 col-sm-12">
              <div class="thumb">
                <input type="submit" value="send" class="btn" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="rt-block position-absolute bg-white m-0">
          <h3 class="text-uppercase text-center text-dark">Contact Information</h3>
          <div class="block">
            <h4>Tel:</h4>
            <a href="tel:64327893210">6432 789 3210</a>
          </div>
          <div class="block">
            <h4>Email:</h4> 
            <a href="mailto:info@7travels.com" class="email">info@7travels.com</a>
          </div>
          <div class="clearfix"></div>
          <div class="social-block position-relative">
              <ul>
                  <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              </ul>
              <div class="clearfix"></div>
          </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!-- Contact-section End -->


<?php get_footer(); ?>