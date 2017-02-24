<?php
/**
 * An element component used to house other content.
 *
 * @param string $tag         HTML tagname.
 * @param string $content     HTML or Text content.
 * @param string $class       CSS classnames.
 * @param string $id          HTML identifier.
 * @param array  $attributes  HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$element = function(string $tag, string $content = '', string $class = '', string $id = '', array $attributes = [])
{
  $tags = [
    'a', 'address', 'article', 'aside', 'audio',
    'blockquote',
    'div',
    'figure', 'footer',
    'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'header',
    'iframe', 'img',
    'li',
    'main',
    'nav',
    'ol',
    'p',
    'section',
    'ul',
    'video',
  ];

  sort($tags);

  if (in_array($tag, $tags, true) == false) {
    trigger_error('$tag property must be any of these: '.implode(', ', $tags), E_USER_ERROR);
  }

  $html = "<{$tag}";

  if (empty($class) == false) {
    $attributes['class'] = trim($class);
  }

  if (empty($id) == false) {
    $attributes['id'] = $id;
  }

  ksort($attributes);

  foreach ($attributes as $attribute => $value) {
    $html .= ' '.$attribute.'="'.(string)$value.'"';
  }

  $html .= ">{$content}";

  switch ($tag)
  {
    case 'img':
    break;

    default:
      $html .= "</{$tag}>";
  }

  return trim($html);
};