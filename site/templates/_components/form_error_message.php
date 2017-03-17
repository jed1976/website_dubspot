<?php namespace DS\Components;

/**
 * An error message to be display in a form.
 *
 * @param string  $message  HTML or Text content.
 *
 * @return string Rendered HTML of the component.
 */

function form_error_message(string $message = '')
{
  return \DS\p(['class' => 'ds-red f6 fw7 lh-copy ma0'], $message);
};