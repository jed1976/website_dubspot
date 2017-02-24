<?php
/**
 * A Text Block is a generic text container, best used for
 * text that isn't a Heading, Paragraph, or Link.
 *
 * @param string $content     HTML or Text content.
 * @param string $class       CSS classnames.
 * @param string $id          HTML identifier.
 * @param array  $attributes  HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$text_block = function(string $content = 'This is some text inside of a div block.', string $class = '', string $id = '', array $attributes = []) use ($element)
{
  return $element('div', $content, $class, $id, $attributes);
};