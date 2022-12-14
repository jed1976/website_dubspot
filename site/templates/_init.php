<?php
// General
#error_reporting(0);
$settings = $pages->get('template=settings');

// Color Constants
foreach ($settings->palette as $palette) {
  define(strtoupper($palette->color_name), $palette->color_value);
}

// Includes
include '_functions.php';

// Components
include '_components/aspect_ratio.php';
include '_components/background_image.php';
include '_components/container.php';
include '_components/form_error_message.php';
include '_components/form_field_label.php';
include '_components/form_text_field.php';
include '_components/image.php';
include '_components/link_button.php';
include '_components/map.php';
include '_components/media.php';
include '_components/promotion.php';