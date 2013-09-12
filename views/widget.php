<?php
  // sanitize and cache variables
  $instance_button_name = sanitize_text_field( $instance['button_name'] );
  $instance_url = esc_url( $instance['url'] ); 
  $instance_img_url = esc_url( $instance['img_url'] );
  $instance_more_text = sanitize_text_field( $instance['more_text']);
?>

<a href="<?php echo esc_url( $instance['url'] ); ?>" class="expando-button-widget expando-button-widget-<?php echo sanitize_html_class( $instance['button_name'] ); ?>" target="_blank">
    <div class="expando-button-widget-header"><?php
      if ($instance_button_name) {
        echo $instance_button_name;
      } else {
        echo "Button";
      } 
    ?></div><?php
    if ($instance_img_url || $instance_more_text ) {
      ?><div class="expando-button-widget-body">
        <?php if ($instance_img_url) { ?>
          <img src="<?php echo $instance_img_url; ?>" alt="<?php echo $instance_button_name; ?>">
        <?php } 
        if ($instance_more_text) { ?>
          <div class="expando-button-widget-more-text"><?php 
          echo $instance_more_text;
          ?></div><?php 
        } ?>
      </div><?php
    } // end expando-button-widget-body ?>
</a>
