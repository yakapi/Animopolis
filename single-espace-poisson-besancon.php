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
    </div>
        <?php

    get_footer();
    wp_footer();

  ?>
</body>
</html>
