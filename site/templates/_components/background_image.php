<?php namespace DS\Components;

/**
 * A Background Image component that renders a div
 * element with an inline background image style,
 * and adds lazy loading capabilities.
 *
 * @param string  $url    Image URL.
 * @param bool    $lazy   Lazy load the image.
 *
 * @return string Rendered HTML of the component.
 */

function background_image(string $url = '', string $position = 'center', bool $lazy = true)
{
  $valid_positions = ['bottom', 'center', 'left', 'right', 'top'];
  sort($valid_positions);

  if (in_array($position, $valid_positions) === false) {
    trigger_error("Specified position '{$position}' is not valid. Please use one of the following: ".implode(',', $valid_positions), E_USER_ERROR);
  }

  $class = 'cover h-100 w-100 bg-'.$position;
  $class .= $lazy ? ' b-lazy' : '';

  return \DS\div(['class' => $class, 'data-src' => $url]);
};