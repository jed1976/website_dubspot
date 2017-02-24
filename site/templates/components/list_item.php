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
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$list_item = function(string $content = 'List Item', array $attributes = [], string $component = 'list_item') use ($element)
{
  return $element('li', $content, $attributes, $component);
};