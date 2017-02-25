<?php
/**
 * The Map component lets you add an interactive map
 * to your site via Google Maps. You can specify the
 * location to highlight, and various display options.
 *
 * @param string  $api_key      Google Maps API key.
 * @param array   $center       Latitude/Longitude.
 * @param int     $zoom         Map zoom level.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$map = function(
  string $api_key = '',
  array $center = ['36.2095764', '-113.7289461'],
  int $zoom = 4,
  string $map_type = 'roadmap',
  bool $disable_scrolling = false,
  array $attributes = [],
  string $component = 'map') use ($iframe)
{
  $map_types = ['roadmap', 'satellite'];
  sort($map_types);

  if (in_array($map_type, $map_types, true) == false) {
    trigger_error('Map type property must one of the following: '.implode(', ', $map_types), E_USER_ERROR);
  }

  $center = implode(',', $center);

  if ($disable_scrolling) {
    $classes = ['class' => ' pointer-events-none'];
    $attributes = array_merge($classes, $attributes);
  }

  $attributes['allowfullscreen'] = '';
  $attributes['frameborder'] = 0;
  $attributes['src'] = "//www.google.com/maps/embed/v1/view?center={$center}&key={$api_key}&maptype={$map_type}&zoom={$zoom}";

  return $iframe($attributes);
};