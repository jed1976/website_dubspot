<?php
/**
 * A Paragraph element is a container for multiple-sentence
 * text content.
 *
 * @param string  $content     HTML or Text content.
 * @param string  $class       CSS classnames.
 * @param string  $id          HTML identifier.
 * @param array   $attributes  HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$paragraph = function(string $content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere.', string $class = '', string $id = '', array $attributes = []) use ($element)
{
  return $element('p', $content, $class, $id, $attributes);
};