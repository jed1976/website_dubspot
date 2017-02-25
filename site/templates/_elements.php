<?php

// https://www.w3schools.com/tags/
foreach ([
  'a', 'abbr', 'address', 'area', 'article', 'aside', 'audio',
  'b', 'base', 'bdi', 'bdo', 'blockquote', 'body', 'br', 'button',
  'canvas', 'caption', 'cite', 'code', 'col', 'colgroup',
  'datalist', 'dd', 'del', 'details', 'dfn', 'dialog', 'div', 'dl', 'dt',
  'em', 'embed',
  'fieldset', 'figcaption', 'figure', 'footer',
  'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hr', 'html',
  'i', 'iframe', 'img', 'input', 'ins',
  'kbd', 'keygen',
  'label', 'legend', 'li', 'link',
  'main', 'map', 'mark', 'menu', 'menuitem', 'meta', 'meter',
  'nav', 'noscript',
  'object', 'ol', 'optgroup', 'option', 'output',
  'p', 'param', 'picture', 'pre', 'progress',
  'q',
  's',  'samp', 'script', 'section', 'select', 'small', 'source', 'span', 'strong', 'style', 'sub', 'summary', 'sup',
  'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'track',
  'ul', 'ul',
  'var', 'video',
  'wbr',
] as $el) {
  $$el = create_function('$attributes = [], $content = ""', '
    global $el;
    return element("'.$el.'", $attributes, $content);
  ');
}


/**
 * Create an HTML5 doctype.
 */
$doctype = function()
{
  return '<!DOCTYPE html>';
};

/**
 * HTML Comment.
 *
 * @param   string  $comment  HTML Comment.
 * @return  string  HTML output.
 */
$comment = function(string $comment = '')
{
  return "<!-- {$comment} -->";
};