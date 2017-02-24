<?php
/**
 * An element component used to house other content.
 *
 * @param string  $tag          HTML tagname.
 * @param string  $content      HTML or Text content.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$element = function(string $tag = 'div', string $content = '', array $attributes = [], string $component = 'component')
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
    trigger_error('Tag property must be one of the following: '.implode(', ', $tags), E_USER_ERROR);
  }

  $opening_tag      = "<{$tag}";
  $flat_attributes  = '';
  $closing_tag      = "</{$tag}>";
  $hook             = "hook_{$component}";

  if (array_key_exists('class', $attributes)) {
    $values = explode(' ', trim($attributes['class']));
    $attributes['class'] = array_combine($values, $values);
  } else {
    $attributes['class'] = [];
  }

  if (function_exists($hook)) {
    $attributes = call_user_func($hook, $attributes);
  }

  sort($attributes['class']);

  if (array_key_exists('class', $attributes)) {
    $attributes['class'] = implode(' ', $attributes['class']);
  }

  foreach ($attributes as $attribute => $value) {
    $flat_attributes .= ' '.$attribute.'="'.trim($value).'"';
  }

  if ($tag == 'img') {
      $closing_tag = '';
  }

  return trim("{$opening_tag}{$flat_attributes}>{$content}{$closing_tag}");
};