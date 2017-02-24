<?php
/**
 * A Container is a layout element with a with a
 * 940px width on larger displays that keeps your
 * content centered relative to the browser window. On
 * smaller devices (like phones and tablets), they
 * extend across the full width of the screen.
 *
 * @param string $content     HTML or Text content.
 * @param string $tag         HTML tagname.
 * @param string $class       CSS classnames.
 * @param string $id          HTML identifier.
 * @param array  $attributes  HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$container = function(string $content = '', string $tag = 'div', string $class = '', string $id = '', array $attributes = []) use ($element)
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
    trigger_error('$tag property must be any of these: '.implode(', ', $tags), E_USER_ERROR);
  }

  $class .= ' center mw8 bg-gray';

  return $element($tag, $content, $class, $id, $attributes);
};