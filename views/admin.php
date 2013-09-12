<div class="expando-button-widget-admin">

  <p>
    <label for="<?php echo $this->get_field_id( 'button_name' ); ?>">
      <?php _e('Button Name', 'expando-button-widget'); ?>:
    </label>
    <input type="text" id="<?php echo $this->get_field_id( 'button_name' ); ?>" name="<?php echo $this->get_field_name( 'button_name'); ?>" value="<?php echo esc_attr($instance['button_name']); ?>" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'url' ); ?>">
      <?php _e('Button Link URL', 'expando-button-widget'); ?>:
    </label>
    <input type="text" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url'); ?>" value="<?php echo esc_attr($instance['url']); ?>" />
  </p>
  <p class="expando-button-uploader">
    <label for="<?php echo $this->get_field_id( 'img_url' ); ?>">
      <?php _e('Image', 'expando-button-widget'); ?>:
    </label>
    <img class="img-thumbnail hidden">
    <input type="text" class="img-url" name="<?php echo $this->get_field_name( 'img_url'); ?>" id="<?php echo $this->get_field_id( 'img_url' ); ?>" value="<?php echo esc_url($instance['img_url']); ?>" /> 
    <a class="button img-upload-button" name="<?php echo $this->get_field_name( 'img_upload_button_id'); ?>" id="<?php echo $this->get_field_id( 'img_upload_button_id' ); ?>"><?php _e('Choose an image'); ?></a>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'more_text' ); ?>">
      <?php _e('More Text', 'expando-button-widget'); ?>:
    </label>
    <textarea id="<?php echo $this->get_field_id( 'more_text' ); ?>" name="<?php echo $this->get_field_name( 'more_text'); ?>"><?php 
        echo esc_textarea($instance['more_text']);
    ?></textarea>
  </p>



</div>