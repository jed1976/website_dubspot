<?php
// Includes
include $urls->template.'functions.php';

// Settings
$settings = $pages->get('template=settings');

// Page Meta
$title = $page->meta_title ? $page->meta_title : $page->title;
$description = $page->meta_description ? $page->meta_description : '';
$open_graph_title = $page->open_graph_title && !$page->open_graph_title_same ? $page->open_graph_title : $title;
$open_graph_description = $page->open_graph_description && !$page->open_graph_description_same ? $page->open_graph_description : $description;
