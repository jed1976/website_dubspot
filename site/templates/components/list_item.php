<?php
/**
 * The List Item element lets you add more items to
 * existing List elements. You can then add any content
 * you would like to them, including links, images, etc.
 *
 * Tip: By default, List Items stack. If you want them
 * to sit side-by-side, add a class and change their
 * Display property to inline-block (dib).
 *
 * @param string  $content      HTML or Text content.
 * @param string  $class        CSS classnames.
 * @param string  $id           HTML identifier.
 * @param array   $attributes   HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$list_item = function(string $content = 'List Item', string $class = '', string $id = '', array $attributes = []) use ($element)
{
  return $element('li', $content, $class, $id, $attributes);
};