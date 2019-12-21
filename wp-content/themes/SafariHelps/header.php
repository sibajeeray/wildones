<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="DC.title" content="Wildones">
    <link rel="canonical" href="http://www.safarihelps.com/">
    <meta name="description" content="">
    <?php wp_head(); ?>
	
	
	<!--Start of Zendesk Chat Script-->
	<script type="text/javascript">
// 	window.$zopim||(function(d,s){var z=$zopim=function(c){
// 	z._.push(c)},$=z.s=
// 	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
// 	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
// 	$.src='https://v2.zopim.com/?3GZqlVuB2coeKGGGpQ8zKru7TnsXBE1w';z.t=+new Date;$.
// 	type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
	</script>
	<!--End of Zendesk Chat Script-->
	
	<!-- styles needed by jScrollPane -->
	<link type="text/css" href="style/jquery.jscrollpane.css" rel="stylesheet" media="all" />

	<!-- latest jQuery direct from jQuery CDN -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js">
	</script>

	<!-- the mousewheel plugin - optional to provide mousewheel support -->
	<script type="text/javascript" src="script/jquery.mousewheel.js"></script>

	<!-- the jScrollPane script -->
	<script type="text/javascript" src="script/jquery.jscrollpane.min.js"></script>
	
	
	
</head>
<body <?php body_class(); ?>>
  
  
  <!-- Header Start -->
  <nav class="navbar-default fixed-top border-bottom">
    <div class="container position-relative">
      <div class="menu-block p-0 m-0">
        <div id="navigation">
            <div id="mobile-menu">
                <div class="logo">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" alt="">
                </div>
                <div class="menu-icon"></div>
            </div> <!-- Mobile menu logo and menu Icon -->

            <?php 
              $args = array(
                  'theme_location' => 'main-menu',
                  'container' => 'div',
                  'container_id' => 'nav-wrap',
                  'container_class' => 'text-center',
                  'menu_class' => 'sf-menu'
              );
              wp_nav_menu($args);
            ?>
        </div>
      </div>
    </div>
  </nav>

