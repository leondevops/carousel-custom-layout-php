<!doctype html>

<html>
<head>
  <meta charset="utf-8">
  <!-- Enable bootstrap -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>DevTheme page template</title>

  <!-- The file functions.php has already called in advance -->
  <!-- Load the custom css files for specific template -->
  <?php

  /** 1. Custom CSS & JS for page-custom-layout.php **/
  if(is_page_template('page-custom-layout.php')):
    // 1. Register custom CSS
    function page_custom_layout_style_enqueue(){
      wp_enqueue_style('page-custom-layout',
        get_template_directory_uri() . '/css/page-custom-layout.css',
        array(), '1.0', 'all');
    }
    add_action('wp_enqueue_scripts', 'page_custom_layout_style_enqueue');

    // 2. Register custom JS
    function page_custom_layout_script_enqueue() {
      wp_enqueue_script('page-custom-layout-js',
        get_template_directory_uri().'/js/page-custom-layout.js',
        array(), '1.0', true);
    }
    // Add action hook to include CSS & JS files
    add_action('wp_enqueue_scripts', 'page_custom_layout_script_enqueue');
  endif;

  /** 1. Custom CSS & JS for page-carousel-sample.php **/
  if(is_page_template('page-template/page-carousel-sample.php')):


    // 1. Register custom CSS
    function page_carousel_sample_style_enqueue(){
      wp_enqueue_style('page-carousel-sample',
        get_template_directory_uri() . '/css/page-carousel-sample.css',
        array(), '1.0', 'all');
    }
    add_action('wp_enqueue_scripts', 'page_carousel_sample_style_enqueue');

    // 2. Register custom JS
    function page_carousel_sample_script_enqueue() {
      wp_enqueue_script('page-carousel-sample-js',
        get_template_directory_uri().'/js/page-carousel-sample.js',
        array(), '1.0', true);
    }
    // Add action hook to include CSS & JS files
    add_action('wp_enqueue_scripts', 'page_carousel_sample_script_enqueue');
  endif;

  ?>

  <!-- Load the local CSS files -->
  <?php wp_head(); ?>

  <!-- check current page template -->
  <?php
  /* Debug information
    global $template;
    echo basename($template);
    echo var_dump(is_page_template('page-custom-layout.php'));
   * */
  ?>

</head>

<!-- Assign a custom class name for Home page only-->
<?php
if(is_home()):
  $devtheme_body_classNames = array('devtheme-className', 'custom-HomePage-className');
elseif(is_front_page()):
  $devtheme_body_classNames = array('devtheme-className', 'custom-FrontPage-className');
else:
  $devtheme_body_classNames = array('devtheme-general-className');
endif;
?>

<body <?php body_class($devtheme_body_classNames) ?> >
<header>

  <nav class="navbar navbar-expand navbar-light bg-light">
    <div class="container-fluid">
      <div class="navbar-header">
        <!-- Load custom logo -->
        <?php
        if ( function_exists( 'the_custom_logo' ) ) {
          the_custom_logo();
        }
        ?>
      </div>

      <div class="nav navbar-nav navbar-right vnlab-main-nav-menu">
        <!-- Load the navigation menu -->
        <!--wp_nav_menu() will grab the 1st item in menu list - alphabetical order  -->
        <!-- original method: wp_nav_menu(array('theme_location'=>'primary')); -->
        <?php
        wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             =>  2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'vnlab-main-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            =>  new wp_bootstrap_navwalker())
        );
        ?>

      </div>
    </div>
  </nav>

  <!-- No need to close file. The footer.php will close the file. -->

</header>


