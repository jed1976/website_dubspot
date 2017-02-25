<?php
/**
 * A Container is a layout element with a with a
 * 940px width on larger displays that keeps your
 * content centered relative to the browser window. On
 * smaller devices (like phones and tablets), they
 * extend across the full width of the screen.
 *
 * @param string  $content     HTML or Text content.
 * @param string  $tag         HTML tagname.
 * @param array   $attributes  HTML attributes.
 * @param array   $component   Component name.
 *
 * @return string Rendered HTML of the component.
 */

$container = function(string $content = '', string $tag = 'div', array $attributes = [], string $component = 'container') use ($element)
{
  $tags = [
    'address', 'article', 'aside',
    'div',
    'figure', 'footer',
    'header',
    'main',
    'nav',
    'section',
  ];

  sort($tags);

  if (in_array($tag, $tags, true) == false) {
    trigger_error('Tag property must be one of the following: '.implode(', ', $tags), E_USER_ERROR);
  }

  $classes = ['class' => ' center mw8'];
  $attributes = array_merge($classes, $attributes);

  return $element($tag, $content, $attributes, $component);
};