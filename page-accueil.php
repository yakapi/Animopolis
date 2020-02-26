<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Animopolis::Accueil</title>
  <?php wp_head(); ?>
</head>
  <?php
    wp_body_open();
    get_header();
    ?>
    <div class="carousel-news rltv ovh">
      <?php get_template_part('assets/component/carousel');?>
    </div>
    <?php
    get_template_part('assets/component/about');
    include('assets/component/pet-banner.php');
    get_template_part('assets/component/satisfaction', get_post_format());
    get_footer();
    wp_footer();
  ?>
</body>
</html>
