<?php
// General
#error_reporting(0);
$settings = $pages->get('template=settings');

// Includes
include 'functions.php';

// Components
include 'components/element.php';
include 'components/text_link.php';
include 'components/link_block.php';
include 'components/block_quote.php';
include 'components/button.php';
include 'components/container.php';
include 'components/heading.php';
include 'components/image.php';
include 'components/list.php';
include 'components/list_item.php';
include 'components/paragraph.php';
include 'components/section.php';
include 'components/text_block.php';
include 'components/video.php';

// Theme
include $settings->theme->directory.'hooks.php';
include $settings->theme->directory.'components.php';