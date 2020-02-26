<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Animopolis::Chat</title>
  <?php wp_head(); ?>
</head>
<?php
wp_body_open();
get_header();
?>
<div class="banner-box">
  <a class="da-blk" style="color: <?php the_field('color-banner') ?>" href="#">
    <div class="banner-content-box rltv">
      <div class="banner-content-title w-100 h-100 ablst">
        <div class="banner-box-sizer">
          <div class="banner-title mall-15">
            <?php the_post_thumbnail(); ?>
            <h2>Espace <?php the_title(); ?></h2>
          </div>
          <h3 class="mall-15 slog"><?php the_field('slogan'); ?></h3>
        </div>
      </div>
      <div class="banner-image">
        <?php
        $image = get_field('image');
        if (!empty($image)) : ?>
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
      </div>
    </div>
  </a>
</div>
<?php 
$espace_name = get_the_title();
$espace = $espace_name . '-besancon';

// Récupérer l'ID du tag en fonction du slug de l'esapce
$tag = get_term_by('name', lcfirst($espace_name), 'post_tag')->term_id;
//Animopolis/wp-json/wp/v2/posts appel API REST

$argument = array('post_type' => 'marque');
$query = new WP_Query($argument);
$cat = [];
$cat_ids = [];
if ($query->have_posts()) {
  while ($query->have_posts()) {
    $category = get_the_category();
    $query->the_post();
    for ($i = 0; $i < count($category); $i++) {
      array_push($cat, $category[$i]->cat_name);
      array_push($cat_ids, $category[$i]->cat_ID);
    };
  }
  echo '</ul>';
} else {
}
/* Restore original Post Data */
wp_reset_postdata();

$unik_cat = array_unique($cat);
$unik_cat = array_values($unik_cat);
$cat_ids = array_unique($cat_ids);
$cat_ids = array_values($cat_ids);

?>
<nav>
  <ul>
    <?php
    for ($i = 0; $i < count($unik_cat); $i++) {
    ?>
      <li>
        <p class="filter-button" data-tag="<?php echo $tag ?>" data-cat_id="<?php echo $cat_ids[$i]  ?>"><?php echo $unik_cat[$i] ?></p>
      </li>
    <?php
    }
    ?>
  </ul>
</nav>
<?php
$args = array('post_type' => 'marque', 'category_name' => 'marque', 'tag' => $espace);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
  echo '<ul id="marques">';
  while ($the_query->have_posts()) {
    $the_query->the_post();
    echo "<li>";
    the_title();
    the_post_thumbnail();
    echo "</li>";
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