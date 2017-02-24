<?php
/**
 * Images are graphics than can be displayed on the page.
 *
 * Tip: If you're using Retina/Hi-DPI images, set the hi_dpi
 * option.
 *
 * @param string  $source       Source path/url.
 * @param bool    $hi_dpi       Image is Retina/HiDPI.
 * @param string  $alt          Alternate text.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$image = function(string $source, bool $hi_dpi = false, string $alt = '', array $attributes = [], string $component = 'image') use ($element)
{
  $attributes['alt'] = $alt;
  $attributes['src'] = $source;

  // Handle path/url sources
  $url_scheme = parse_url($source, PHP_URL_SCHEME);

  if (empty($url_scheme)) {
    $source = wire('config')->paths->root.$source;
  }

  $path_parts = pathinfo($source);

  if ($hi_dpi && array_key_exists('width', $attributes) == false && $path_parts['extension'] != 'svg') {
      $size = getimagesize($source);
      $attributes['width'] = (int)($size[0] / 2);
  }

  return $element('img', '', $attributes, $component);
};