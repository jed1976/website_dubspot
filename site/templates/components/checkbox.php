<?php
/**
 * A Checkbox allows you to add a clickable checkbox
 * to your form. Checkboxes allow multiple selections to
 * be made. You can also default a checkbox to be checked.
 *
 * @param string  $name         Field name.
 * @param string  $label_text   Label text content.
 * @param bool    $required     Field is required.
 * @param bool    $checked      Start off checked.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$checkbox = function(
  string  $name         = 'Checkbox',
  string  $label_text   = 'Checkbox',
  bool    $required     = false,
  bool    $checked      = false,
  array   $attributes   = [],
  string  $component    = 'checkbox')

use ($input, $label)
{
  if ($checked) {
    $attributes['checked'] = 'checked';
  }

  return $label(
    $input($name, '', 'checkbox', $required, false, $attributes, $component)." {$label_text}"
  );
};