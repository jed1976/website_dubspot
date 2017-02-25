<?php
// General
#error_reporting(0);
$settings = $pages->get('template=settings');

// Includes
include '_functions.php';
include '_elements.php';

// // Components
include '_components/media.php';
include '_components/map.php';

// Theme Components
include $settings->theme->directory.'hooks.php';
include $settings->theme->directory.'components.php';

// Page Variables
$page->title            = $page->meta_title ? $page->meta_title : $page->title;
$page->meta_description = $page->meta_description ? $page->meta_description : '';
$open_graph_title       = $page->open_graph_title && !$page->open_graph_title_same ? $page->open_graph_title : $page->title;
$open_graph_description = $page->open_graph_description && !$page->open_graph_description_same ? $page->open_graph_description : $page->meta_description;
