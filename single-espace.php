<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Animopolis::Chat</title>
  <?php wp_head(); ?>
</head>
 <h1>hello</h1>
  <?php
    wp_body_open();
    get_header();
    ?>
    <div class="banner-box">
      <a class="da-blk" href="#">
        <div class="banner-content-box">
          <div class="banner-image">
            <?php
            $image = get_field('image');
            if (!empty($image)) : ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
          </div>
          <div class="banner-content-title">
            <?php the_post_thumbnail(); ?>
            <h2>Espace <?php the_title(); ?></h2>
            <h3><?php the_field('slogan'); ?></h3>
          </div>
        </div>
      </a>
      <?php $espace = get_the_title().'-besancon';
        //Animopolis/wp-json/wp/v2/posts appel API REST 
      ?>
    </div>
    <?php
    $args = array('post_type' => 'marque', 'category_name' => 'marque', 'tag' => $espace);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
      while ($the_query->have_posts()) {
        $the_query->the_post();
        echo the_title();
    ?>
        <?php
  }
  echo '</ul>';
} else {
  // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

    get_footer();
    wp_footer();

  ?>
</body>
</html>
