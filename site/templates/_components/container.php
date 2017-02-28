<?php namespace DS\Components;

/**
 * A Container component has a fixed maximum width
 * and is centered on the page.
 *
 * @param string  $content  HTML or Text content.
 *
 * @return string Rendered HTML of the component.
 */

function container(string $content = '')
{
  return \DS\div(['class' => 'center mw8'], $content);
};