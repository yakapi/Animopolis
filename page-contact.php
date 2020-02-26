<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Animopolis::Contact</title>
  <?php wp_head(); ?>
</head>
<body>
<?php
wp_body_open();
get_header();?>
<div class="flex">
<?php echo do_shortcode( '[contact-form-7 id="5" title="Formulaire de contact 1"]' ); ?>
<div style="width: 720px"><iframe width="720" height="550" src="https://maps.google.com/maps?width=720&amp;height=550&amp;hl=en&amp;q=ZA%20des%20pr%C3%A8s%20chalots%2C%20Rue%20des%20Pr%C3%A9s%20Chalots%2C%2025220%20Roche-lez-Beaupr%C3%A9+(Animopolis)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/coordinates.html">latitude longitude finder</a></iframe></div><br /></body>
</div>
<?php
get_footer();
wp_footer();
?>
</body>
</html>
