<?php
/**
 * A Block Quote lets you display and style a quotation,
 * usually from an external source, such as a book or article.
 *
 * @param string  $content      HTML or Text content.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$block_quote = function(string $content = 'Block Quote', array $attributes = [], string $component = 'block_quote') use ($element)
{
  $classes = ['class' => ' b b--gray bl bw3 mh0 pa3'];
  $attributes = array_merge($classes, $attributes);

  return $element('blockquote', $content, $attributes, $component);
};