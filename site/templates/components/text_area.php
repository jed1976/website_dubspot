<?php
/**
 * A Text Area is a form field for collecting longer, multi-line
 * text entries from users -- for example, a message in a "contact us" form.
 *
 * @param string  $content      Field text content.
 * @param string  $name         Field name.
 * @param string  $placeholder  Field placeholder text.
 * @param bool    $required     Field is required.
 * @param bool    $autofocus    Autofocus field.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$text_area = function(
  string  $content      = 'Example Text',
  string  $name         = 'Field',
  string  $placeholder  = 'Example Text',
  bool    $required     = false,
  bool    $autofocus    = false,
  array   $attributes   = [],
  string  $component    = 'text_area')

use ($input)
{
  $attributes['content'] = htmlspecialchars($content);

  return $input($name, $placeholder, 'textarea', $required, $autofocus, $attributes, $component);
};