<?php
/**
 * A Heading can act as a title, section heading, and/or
 * subheading. You can give each Heading a relative
 * level of importance, from H1 to H6.
 *
 * Tip: Search engines (and people!) use Headings to determine
 * the most important themes and topics of your content.
 *
 * @param string  $content     HTML or Text content.
 * @param integer $headingType HTML heading level.
 * @param array   $attributes  HTML attributes.
 * @param array   $component   Component name.
 *
 * @return string Rendered HTML of the component.
 */

$heading = function(string $content = 'Heading', int $headingType = 1, array $attributes = [], string $component = 'heading') use ($element)
{
  $class = ['class' => ' lh-title'];
  $attributes = array_merge($class, $attributes);

  return $element("h{$headingType}", $content, $attributes, $component);
};