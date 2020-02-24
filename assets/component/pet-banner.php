<?php 
// The Query
$args = array('post_type' => 'espace');
$the_query = new WP_Query($args);

// The Loop
if ($the_query->have_posts()) {
  echo '<ul>';
  while ($the_query->have_posts()) {
    $the_query->the_post();
?><div class="banner-box">
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
  }
  echo '</ul>';
} else {
  // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();