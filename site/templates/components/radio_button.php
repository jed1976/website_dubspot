<?php
/**
 * A Radio Button allows people to select a single item
 * from a list of options.
 *
 * @param string  $group_name   Name of radio group.
 * @param string  $choice_value Value of the radio option.
 * @param string  $label_text   Label text content.
 * @param bool    $required     Field is required.
 * @param bool    $checked      Start off checked.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$radio_button = function(
  string  $name         = 'Radio',
  string  $choice_value = 'Radio',
  string  $label_text   = 'Radio',
  bool    $required     = false,
  bool    $checked      = false,
  array   $attributes   = [],
  string  $component    = 'radio_button')

use ($input, $label)
{
  if ($checked) {
    $attributes['checked'] = 'checked';
  }

  $attributes['value'] = $choice_value;

  return $label(
    $input($name, '', 'radio', $required, false, $attributes, $component)." {$label_text}"
  );
};