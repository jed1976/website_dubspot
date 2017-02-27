<?php namespace DS\Components;

/**
 * The Aspect Ratio component uses pre-defined Tachyons
 * aspect ratios to create a container for content that
 * is set to the specified aspect ratio. Useful for images
 * and videos.
 *
 * @param string  $content        HTML or Text content.
 * @param string  $aspect_ratio   Aspect ratio.
 *
 * @return string Rendered HTML of the component.
 */

function aspect_ratio(string $content = '', string $ratio = '16x9')
{
  $valid_aspect_ratios = ['16x9', '1x1', '3x4', '4x3', '4x6', '5x7', '5x8', '6x4', '7x5', '8x5', '9x16'];

  if (in_array($ratio, $valid_aspect_ratios) === false) {
    trigger_error("Specified ratio '{$ratio}' is not valid. Please use one of the following: ".implode(',', $valid_aspect_ratios), E_USER_ERROR);
  }

  return
    \DS\div(['class' => "aspect-ratio aspect-ratio--{$ratio}"],
      \DS\div(['class' => 'aspect-ratio--object'], $content)
    );
};