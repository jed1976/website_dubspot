<?php
/**
 * Returns an image path from a selector.
 *
 * @param $selector string
 * @return mixed
 */
function ds_image_path($selector = '')
{
  return wire('pages')->get('template=image, '.$selector)->image->url;
}

/**
 * Returns inline SVG content from a selector.
 *
 * @param $selector string
 * @return mixed
 */
function ds_svg($selector = '')
{
    return file_get_contents(wire('config')->paths->root.wire('pages')->get('template=image, '.$selector)->image->url);
}

/**
 * The base element function.
 *
 * @param string  $tag          HTML tagname.
 * @param array   $attributes   HTML attributes.
 * @param string  $content      HTML or Text content.
 *
 * @return string Rendered HTML of the element.
 */

function element(string $tag = 'div', $attributes = [], $content = '')
{
  $opening_tag      = "<{$tag}";
  $attributes_f     = '';
  $hook             = "hook_{$tag}";

  switch ($tag)
  {
    case 'area':
    case 'base':
    case 'br':
    case 'col':
    case 'embed':
    case 'hr':
    case 'img':
    case 'input':
    case 'link':
    case 'meta':
    case 'param':
    case 'source':
    case 'track':
    case 'wbr':
      $closing_tag = '';
    break;

    default:
      $closing_tag = "</{$tag}>";
  }

  $args = func_get_args();

  if (is_string($args[1])) {
    $content = $args[1];
    $attributes = [];
  }

  if (is_array($attributes) == false) {
    trigger_error('Attributes must be an array.', E_USER_ERROR);
  }

  if (array_key_exists('class', $attributes)) {
    $values = explode(' ', trim($attributes['class']));
    $attributes['class'] = array_combine($values, $values);
  } else {
    $attributes['class'] = [];
  }

  if (function_exists($hook)) {
    $attributes['class'] = call_user_func($hook, $attributes['class']);
  }

  sort($attributes['class']);

  if (count($attributes['class']) == 0) {
    unset($attributes['class']);
  }

  ksort($attributes);

  if (array_key_exists('class', $attributes)) {
    $attributes['class'] = implode(' ', $attributes['class']);
  }

  foreach ($attributes as $attribute => $value) {
    $attributes_f .= ' '.$attribute.'="'.trim($value).'"';
  }

  return trim("{$opening_tag}{$attributes_f}>{$content}{$closing_tag}");
};