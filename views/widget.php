<?php
  // sanitize and cache variables
  $instance_button_name = esc_html($instance['button_name'] );
  $instance_url = esc_url( $instance['url'] ); 
  $instance_img_url = esc_url( $instance['img_url'] );
  $instance_more_text = esc_html( $instance['more_text']);

  $is_body_empty = !($instance_img_url || $instance_more_text);
?>

<a href="<?php echo $instance_url; ?>" class="expando-button-widget expando-button-widget-<?php echo sanitize_html_class( $instance['button_name'] ); ?> <?php 
    if ($is_body_empty) 
      echo "is-empty"; 
  ?>" target="_blank">
    <div class="expando-button-widget-header"><?php
      if ($instance_button_name) {
        echo $instance_button_name;
      } else {
        echo "Button";
      } 
    ?></div><?php
    if (! $is_body_empty ) {
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
