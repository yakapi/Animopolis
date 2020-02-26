<footer>
  <div class="footer-logo">
    <?php the_custom_logo(); ?>
  </div>
  <div class="micro-menu">
    <?php wp_nav_menu(array('menu' => 'micro-menu',)); ?>
  </div>
  <div class="social-media-f">
    <?php wp_nav_menu(array('menu' => 'social-media',)); ?>
  </div>
  <div class="footer-newsletter">
    <form class="" action="index.html" method="post">
      <label for="newsletter-mail">
        <h4>Inscrits toi a la Newsletter !</h4>
      </label>
      <input id="newsletter-mail" type="email" name="newsletter" value="" placeholder="exemple@exemple.com">
      <input type="submit" name="submit" value="Inscription">
    </form>
  </div>
  <div class="adress-widget">
    <?php get_sidebar( 'Footer_Widgets');?>
  </div>
</footer>
