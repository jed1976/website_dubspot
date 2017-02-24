<?php
/**
 * A Text Block is a generic text container, best used for
 * text that isn't a Heading, Paragraph, or Link.
 *
 * @param string  $content     HTML or Text content.
 * @param array   $attributes  HTML attributes.
 * @param array   $component   Component name.
 *
 * @return string Rendered HTML of the component.
 */

$text_block = function(string $content = 'This is some text inside of a div block.', array $attributes = [], string $component = 'text_block') use ($element)
{
  return $element('div', $content, $attributes, $component);
};