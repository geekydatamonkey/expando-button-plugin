<?php

/**
* Plugin Name: Expando Button
* Plugin URI: http://james.mn/expando-button
* Description: Expando Button is a expanding button. On hover, the button expands showing more information such as an image and text. After a short time, the button hides the expanded information.
* Version: 1.0
* Author: James Johnson
* Author URI: http://james.mn
* License: GPL v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*
* Copyright 2013 James Johnson (james@james.mn)
*
**/

class ExpandoButton extends WP_Widget {

  function __construct() {

    // Language init
    add_action('init', array($this, 'widget_textdomain') );

    parent::__construct(
        'expando-button',
        __( 'Expando Button', 'expando-button-widget' ),
        array(
          'classname'     => 'expando-button',
          'description'   => __( 'A button that shows more information such as an image and text.', 'expando-button-widget' )
        )
    );

    // Register Stylesheets and Scripts
    add_action( 'admin_enqueue_scripts', array($this, 'register_admin_styles_and_scripts') );
    add_action( 'wp_enqueue_scripts', array($this, 'register_widget_styles_and_scripts') );

  }

  function form($instance){

    $instance = wp_parse_args(
      (array)$instance,
      array(
        'button_name'    =>   '',
        'url'            =>   '',
        'more_text'      =>   '',
        'img_url'            =>   '',
        'img_upload_button_id' => 'img-upload-button'
      )
    );

    include( plugin_dir_path( __FILE__ ) . 'views/admin.php' );
  }

  function update($new_instance, $old_instance) {



    $old_instance['button_name'] = strip_tags(stripslashes($new_instance['button_name']));
    $old_instance['url'] = strip_tags(stripslashes($new_instance['url']));
    $old_instance['more_text'] = strip_tags(stripslashes($new_instance['more_text']));
    $old_instance['img_url'] = strip_tags(stripslashes($new_instance['img_url']));

    return $old_instance;
  }

  function widget($args, $instance){

    include( plugin_dir_path(__FILE__) . 'views/widget.php');

  }

  function widget_textdomain() {
    load_plugin_textdomain( 'expando-button-widget', false, plugin_dir_path( __FILE__ ) . '/lang/');
  }

  function register_admin_styles_and_scripts() {
    // must be first for media js to work
    wp_enqueue_media();
    wp_enqueue_style('expando-button-widget-admin', plugins_url('expando-button-widget/css/admin.css') );
    wp_enqueue_script('expando-button-admin', plugins_url('expando-button-widget/js/dev/admin.js'), array('jquery'), '1.0', true );
  }

  function register_widget_styles_and_scripts() {
    wp_enqueue_style('expando-button-widget', plugins_url('expando-button-widget/css/widget.css') );
    wp_enqueue_script('expando-button-widget', plugins_url('expando-button-widget/js/widget.min.js'), array('jquery','jquery-ui'), '1.0', true );
    wp_enqueue_script('jquery-ui', plugins_url('exando-button-widget/js/libs/jquery-ui-1.8.18.min.js'), array('jquery'), true);

  }

}
add_action('widgets_init', create_function('', 'register_widget("ExpandoButton");'));