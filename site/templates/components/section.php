<?php
/**
 * A section is a layout element with a width of 100%,
 * so it expands across the full width of the browser window.
 *
 * It's perfect for full-screen background images, videos,
 * and other content.
 *
 * @param string $content     HTML or Text content.
 * @param string $class       CSS classnames.
 * @param string $id          HTML identifier.
 * @param array  $attributes  HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$section = function(string $content = '', string $class = '', string $id = '', array $attributes = []) use ($element)
{
  return $element('section', $content, $class, $id, $attributes);
};