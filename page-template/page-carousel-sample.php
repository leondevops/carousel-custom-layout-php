<?php
/**
Template Name: DevTheme Page Template - Carousel
 */

?>

<!-- Get header by loading the file header.php -->
<!--  <link rel="stylesheet" href="path/to/assets/yourcss.css" type="text/css"> -->

<?php
  get_template_part('page-template/header');  // include page-template/header.php
?>

<?php global $template; ?>
<p> The current page template : "<?php echo basename($template); ?>" </p>

<!-- I. Hero features - carousel -->
<h3> === Custom carousel === </h3>
<!-- php function to include HTML template: -->
<!-- get_template_part('page-template/layout','carousel-custom'); -->

<?php include_once("layout-carousel-custom.html"); ?>


<!-- II. The main content: the main loop & its sidebar -->
<div class="row">

  <!-- 1. The content of the page - the loop -->
  <div class="col-xs-12 col-sm-8">
    <?php
    if(have_posts()):
      while(have_posts()): the_post(); ?>
        <!-- Load the content  -->
        <?php
        get_template_part('page-template/content','meta');  // include content-meta.php
        ?>
        <?php
        get_template_part('page-template/content','body');  // include content-body.php
        ?>

      <?php
      endwhile;
    else:
      _e('Sorry no posts matched your criteria','devtheme');
    endif;   ?>
  </div>

  <!-- Sidebar - load the sidebar with id 'primary' -->
  <div class="col-xs-12 col-sm-4">
    <?php // get_sidebar() ?>
    <?php
      get_template_part('page-template/sidebar');  // include page-template/header.php
    ?>

  </div>

</div>

<!-- III. Featured contents in footer. -->
<h3>Bài viết nổi bật</h3>
<!-- Custom query - Display the last blog post -->
<div class="row">
  <?php

  /*
   *
   * Categories to filter
   * 4 - foreign language study
   * 10 - online study
   * 2 - personal healthcare
   *
   * */
  $categoriesList = array(
    'include' => '4, 10, 2'
  );

  $categories = get_categories($categoriesList);

  // Iterate through each dedicated category
  foreach ($categories as $category):
    $postArgs = array(
      'type'              => 'post',
      'posts_per_page'    =>  1,
      'category__in'      =>  $category->term_id,
      'category__not_in'  =>  array(1),
    );
    $lastPosts = new WP_Query($postArgs);

    if($lastPosts->have_posts()):
      // Iterate over the latest posts
      while($lastPosts->have_posts()): $lastPosts->the_post(); ?>

        <div class="col-xs-12 col-sm-4">
          <!-- Get the featured content from content-feature.php -->
          <?php get_template_part('content','featured'); ?>

        </div>

      <?php
      endwhile;
    else:
      _e('Sorry no posts matched your custom query','devtheme');
    endif;

    wp_reset_postdata();

  endforeach;
  /*
   * Get the first 3 posts in categories "Hoc Ngoai Ngu, Hoc Truc tuyen
   * */
  ?>
</div>

<!--
    This php function will return default sidebar for PHP: get_sidebar()
-->

<?php //get_footer() ?>
<?php
  get_template_part('page-template/footer');  // include page-template/header.php
?>
