<?php 
    function safarihelps_enqueues(){


        //STYLES
        wp_register_style("style", get_template_directory_uri() . "/style.css", array(), '1.0.0');
        wp_register_style("custom_styles", get_template_directory_uri() . "/assets/css/style.css", array(), '1.0.0');
        wp_register_style("bootstrapcss", get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), '4.3.0');
        wp_register_style("fontawesome4", get_template_directory_uri() . "/assets/font-awesome/css/font-awesome.css", array(), '4.7.0');
        wp_register_style('owlcss',  get_template_directory_uri() . "/assets/css/owl.carousel.css", array(), '2.3.0');
        wp_register_style('responsiveslidescss',  get_template_directory_uri() . "/assets/css/responsiveslides.css", array(), '1.3.0');
        wp_register_style('themesrv',  get_template_directory_uri() . "/assets/css/themes-rv.css", array(), '1.0.0');
        wp_register_style('jscrollpanecss',  get_template_directory_uri() . "/assets/css/jquery.jscrollpane.css", array(), '1.0.0');


        wp_enqueue_style('style');
        wp_enqueue_style('custom_styles');
        wp_enqueue_style('bootstrapcss');
        wp_enqueue_style('owlcss');
        wp_enqueue_style('fontawesome4');
        wp_enqueue_style('themesrv');
        wp_enqueue_style('responsiveslidescss');
        wp_enqueue_style('jscrollpanecss');
 



        //SCRIPTS
        wp_register_script("bootstrapjs", get_template_directory_uri().'/assets/js/bootstrap.min.js' , array('jquery'), '4.3.0', true);
        wp_register_script("owl_js", get_template_directory_uri().'/assets/js/owl.carousel.js' , array('jquery'), '1.0.0', true);
        wp_register_script("cbpanijs", get_template_directory_uri().'/assets/js/cbpAnimatedHeader.js' , array('jquery'), '1.0.0', true);
        wp_register_script("classie", get_template_directory_uri().'/assets/js/classie.js' , array('jquery'), '1.0.0', true);
        wp_register_script("respjs", get_template_directory_uri().'/assets/js/responsiveslides.min.js' , array('jquery'), '1.0.0', true);
        wp_register_script("jscrollpanejs", get_template_directory_uri().'/assets/js/jquery.jscrollpane.min.js' , array('jquery'), '1.0.0', true);
        wp_register_script("mousewheeljs", get_template_directory_uri().'/assets/js/jquery.mousewheel.js' , array('jquery'), '1.0.0', true);
        wp_register_script("script", get_template_directory_uri().'/assets/js/script.js' , array('jquery'), '1.0.0', true);

        wp_enqueue_script('bootstrapjs');
        wp_enqueue_script('cbpanijs');
        wp_enqueue_script("owl_js");
        wp_enqueue_script("classie");
        wp_enqueue_script('respjs');
        wp_enqueue_script('jscrollpanejs');
        wp_enqueue_script('mousewheeljs');
        wp_enqueue_script('script');
        

    }
    add_action('wp_enqueue_scripts', 'safarihelps_enqueues');
?>