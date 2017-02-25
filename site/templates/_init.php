<?php
// General
#error_reporting(0);
$settings = $pages->get('template=settings');

// Includes
include 'functions.php';

// Components
include 'components/element.php';

  //-- Layout
  include 'components/section.php';
  include 'components/container.php';

  //-- Typography
  include 'components/heading.php';
  include 'components/paragraph.php';
  include 'components/text_link.php';
  include 'components/link_block.php';
  include 'components/list.php';
  include 'components/list_item.php';
  include 'components/button.php';
  include 'components/text_block.php';
  include 'components/block_quote.php';

  //-- Media
  include 'components/image.php';
  include 'components/media.php';
  include 'components/map.php';

  //-- Forms
  include 'components/label.php';
  include 'components/input.php';
  include 'components/checkbox.php';
  include 'components/radio_button.php';
  include 'components/text_area.php';




// Theme
include $settings->theme->directory.'hooks.php';
include $settings->theme->directory.'components.php';