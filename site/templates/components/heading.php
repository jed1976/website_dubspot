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
 * @param string  $class       CSS classnames.
 * @param string  $id          HTML identifier.
 * @param array   $attributes  HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$heading = function(string $content = 'Heading', int $headingType = 1, string $class = '', string $id = '', array $attributes = []) use ($element)
{
  return $element("h{$headingType}", $content, $class, $id, $attributes);
};