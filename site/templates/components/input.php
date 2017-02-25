<?php
/**
 * An input is a single-line, text entry field you can use
 * to collect information from visitors -- such as
 * names, email addresses, etc.
 *
 * @param string  $name         Field name.
 * @param string  $placeholder  Field placeholder text.
 * @param string  $type         Input type.
 * @param bool    $required     Field is required.
 * @param bool    $autofocus    Autofocus field.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$input = function(
  string  $name         = 'Field',
  string  $placeholder  = 'Example Text',
  string  $type         = 'text',
  bool    $required     = false,
  bool    $autofocus    = false,
  array   $attributes   = [],
  string  $component    = 'input')

use ($element)
{
  $content      = '';
  $element_type = 'input';

  if (array_key_exists('content', $attributes)) {
    $element_type = 'textarea';
    $content = $attributes['content'];
    unset($attributes['content']);
  } else {
    $types = ['checkbox', 'email', 'password', 'radio', 'text'];

    sort($types);

    if (in_array($type, $types, true) == false) {
      trigger_error('Type property must be one of the following: '.implode(', ', $types), E_USER_ERROR);
    }

    $attributes['type'] = $type;
  }

  if ($autofocus) {
    $attributes['autofocus'] = 'autofocus';
  }

  $attributes['name'] = strtolower($name);

  if (empty($placeholder) == false) {
    $attributes['placeholder'] = $placeholder;
  }

  if ($required) {
    $attributes['required'] = 'required';
  }

  return $element($element_type, $content, $attributes, $component);
};