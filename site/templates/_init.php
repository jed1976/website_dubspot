<?php
// General
#error_reporting(0);

// Includes
include $urls->template.'functions.php';

// Components
include $urls->template.'components/element.php';
include $urls->template.'components/text_link.php';
include $urls->template.'components/link_block.php';
include $urls->template.'components/block_quote.php';
include $urls->template.'components/button.php';
include $urls->template.'components/container.php';
include $urls->template.'components/heading.php';
include $urls->template.'components/image.php';
include $urls->template.'components/list.php';
include $urls->template.'components/list_item.php';
include $urls->template.'components/paragraph.php';
include $urls->template.'components/section.php';
include $urls->template.'components/text_block.php';
include $urls->template.'components/video.php';

// Settings
$settings = $pages->get('template=settings');

// Page Meta
$title = $page->meta_title ? $page->meta_title : $page->title;
$description = $page->meta_description ? $page->meta_description : '';
$open_graph_title = $page->open_graph_title && !$page->open_graph_title_same ? $page->open_graph_title : $title;
$open_graph_description = $page->open_graph_description && !$page->open_graph_description_same ? $page->open_graph_description : $description;
