<div class="pet-banner">

<?php
// The Query
$args = array('post_type' => 'espace');
$the_query = new WP_Query($args);

// The Loop
if ($the_query->have_posts()) {

  while ($the_query->have_posts()) {
    $the_query->the_post();
?><div class="banner-box">
      <a class="da-blk" style="color: <?php the_field('color-banner') ?>" href="<?php the_permalink( )?>">
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
  }
  echo '</ul>';
} else {
  // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();

?>
</div>
