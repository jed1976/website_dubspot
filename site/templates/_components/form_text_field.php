<?php namespace DS\Components;

/**
 * An error message to be display in a form.
 *
 * @param string  $attributes  HTML Attributes.
 *
 * @return string Rendered HTML of the component.
 */

function form_text_field($attributes = [])
{
  $class = 'b--ds-gray bg-black bb bl-0 br-0 bt-0 db f3-ns f4 fw4 focus-ds-yellow input-reset mb4 pv3 w-100 white';

  if (array_key_exists('class', $attributes)) {
    $attributes['class'] .= $class;
  } else {
    $attributes['class'] = $class;
  }

  return
    \DS\input($attributes);
};