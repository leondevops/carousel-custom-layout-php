
  <h2> <?php the_title(); ?> </h2>
  <div class="thumbnail-image"> <?php the_post_thumbnail('large'); ?> </div>
  <p> Post format: <?php echo get_post_format(); ?> </p>
  <small> Posted date : <?php the_time('F j, Y - g:i a'); ?> <br></br></small>
  <small> Category: <?php the_category(); ?>  <br></br></small>
