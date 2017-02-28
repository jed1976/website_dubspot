<?php namespace DS\Components;

/**
 * An Image component that wraps the standard img
 * element, but adds lazy loading capabilities.
 *
 * @param string  $url    Image URL.
 * @param bool    $lazy   Lazy load the image.
 *
 * @return string Rendered HTML of the component.
 */

function image(string $url = '', string $radius = '0', bool $lazy = true)
{
  $valid_radii = ['0', '1', '2', '3', '4', '100', 'pill'];
  sort($valid_radii);

  if (in_array($radius, $valid_radii) === false) {
    trigger_error("Specified radius '{$radius}' is not valid. Please use one of the following: ".implode(',', $valid_radii), E_USER_ERROR);
  }

  switch ($radius)
  {
    case 'pill':
    case '100':
      $radius_prefix = '-';
    break;

    default:
      $radius_prefix = '';
  }

  $class = "h-100 w-100 br{$radius_prefix}{$radius}";
  $class .= $lazy ? ' b-lazy' : '';

  return \DS\img(['class' => $class, 'data-src' => $url, 'src' => 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==']);
};