<?php
// General
#error_reporting(0);
$settings = $pages->get('template=settings');

// Includes
include '_functions.php';

// Components
include '_components/aspect_ratio.php';
include '_components/container.php';
include '_components/map.php';
include '_components/media.php';

// Theme
include $settings->theme->directory.'components.php';