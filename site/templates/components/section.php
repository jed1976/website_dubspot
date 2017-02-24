<?php
/**
 * A section is a layout element with a width of 100%,
 * so it expands across the full width of the browser window.
 *
 * It's perfect for full-screen background images, videos,
 * and other content.
 *
 * @param string  $content     HTML or Text content.
 * @param array   $attributes  HTML attributes.
 * @param array   $component   Component name.
 *
 * @return string Rendered HTML of the component.
 */

$section = function(string $content = '', array $attributes = [], string $component = 'section') use ($element)
{
  return $element('section', $content, $attributes, $component);
};