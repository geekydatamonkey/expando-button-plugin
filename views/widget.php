<a href="<?php echo esc_url( $instance['url'] ); ?>" class="expando-button-widget expando-button-widget-<?php echo sanitize_html_class( $instance['button_name'] ); ?>" target="_blank">
    <div class="expando-button-widget-header"><?php 
      echo sanitize_text_field( $instance['button_name'] );
    ?></div>
    <div class="expando-button-widget-body">
      <img src="<?php echo esc_url( $instance['img_url'] ); ?>" alt="<?php sanitize_text_field( $instance['button_name'] ); ?>">
      <div class="expando-button-widget-more-text"><?php 
      echo sanitize_text_field( $instance['more_text']);
      ?></div>
    </div>
</a>
