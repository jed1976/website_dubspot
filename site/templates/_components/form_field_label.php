<?php namespace DS\Components;

/**
 * A Form field label component.
 *
 * @param string  $text         Label text.
 * @param string  $for          Element ID to bind to.
 * @param array   $attributes   HTML Attributes.
 *
 * @return string Rendered HTML of the component.
 */

function form_field_label($text = 'Field Label', $for = '', array $attributes = [])
{
  $class = 'ds-gray fw7';

  if (array_key_exists('class', $attributes)) {
    $attributes['class'] .= $class;
  } else {
    $attributes['class'] = $class;
  }

  $attributes['for'] = $for;

  return
    \DS\label($attributes, $text);
};