<?php
/**
 * A Label is a piece of text that typically describes
 * an Input component or other Form-relarted component.
 *
 * @param string  $content     HTML or Text content.
 * @param array   $attributes  HTML attributes.
 * @param array   $component   Component name.
 *
 * @return string Rendered HTML of the component.
 */

$label = function(string $content = '', array $attributes = [], string $component = 'label') use ($element)
{
  return $element('label', $content, $attributes, $component);
};