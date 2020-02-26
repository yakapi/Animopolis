<section id="satisfaction" class="satisfaction">
  <div class="sat-box flx-ac">
    <div class="satisfaction-bar rltv">
      <h3 class="mall-15">Satisfaction client</h3>
      <div class="result-progress ablst flx-ac">
        <p id="nb-progress">1%</p>
      </div>
      <div id="myProgress" class="bgc-un">
        <div id="myBar"></div>
      </div>
    </div>
  </div>
  <div class="sat-box flx-ac">
    <div class="validate-box">
      <div class="validate-ligne">
        <div class="encard-check mall-5">
          <?php
          $image = get_field('check-icon1');
          if( !empty( $image ) ): ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
        </div>
        <h4 class="txt-sat"><?php the_field('text-satisfaction1'); ?></h4>
      </div>
      <div class="validate-ligne middle-ligne">
        <div class="encard-check mall-5">
          <?php
          $image = get_field('check-icon2');
          if( !empty( $image ) ): ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
        </div>
        <h4 class="txt-sat"><?php the_field('text-satisfaction2'); ?></h4>
      </div>
      <div class="validate-ligne">
        <div class="encard-check mall-5">
          <?php
          $image = get_field('check-icon1');
          if( !empty( $image ) ): ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
        </div>
        <h4 class="txt-sat"><?php the_field('text-satisfaction3'); ?></h4>
      </div>
    </div>
  </div>
</section>
