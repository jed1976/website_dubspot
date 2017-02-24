<?php
/**
 * A Block Quote lets you display and style a quotation,
 * usually from an external source, such as a book or article.
 *
 * @param string  $content     HTML or Text content.
 * @param string  $class       CSS classnames.
 * @param string  $id          HTML identifier.
 * @param array   $attributes  HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$block_quote = function(string $content = 'Block Quote', string $class = 'b b--gray bl bw3 mh0 pa3', string $id = '', array $attributes = []) use ($element)
{
  return $element('blockquote', $content, $class, $id, $attributes);
};