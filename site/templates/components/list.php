<?php
/**
 * A List gives you the ability to group elements or
 * content (like links in a navigation menu, or steps in a
 * recipe), to add helpful structure to your site.
 *
 * The List element acts as a container for your list. It
 * can contain List Item elements. You can also make the list
 * ordered (numbered) or unordered (bulleted), and toggle whether
 * or not bullets actually display.
 *
 * @param string  $content      HTML or Text content.
 * @param bool    $ordered      List type: ordered/unordered
 * @param bool    $bullets      Bullets: on/off
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$list = function(string $content = '', bool $ordered = false, bool $bullets = true, array $attributes = [], string $component = 'list') use ($element)
{
  if ($bullets == false) {
    $classes = ['class' => ' list pl0'];
    $attributes = array_merge($classes, $attributes);
  }

  // Ensure only List Item components or raw LI elements are used
  $dom = new DOMDocument();

  // Ensure no DTD/HTML elements are added automatically
  // TODO: Look into why we must pass in an empty element '<i>' in order for the parser to properly
  // recognize the first LI node.
  $dom->loadHTML('<i>'.$content, LIBXML_HTML_NODEFDTD | LIBXML_HTML_NOIMPLIED);

  foreach ($dom->documentElement->childNodes as $node) {
    if ($node->nodeName != 'li') {
      trigger_error("The List component can only contain List Item components or raw LI elements. {$node->nodeName} was given.", E_USER_ERROR);
    }
  }

  return $element($ordered ? 'ol' : 'ul', $content, $attributes, $component);
};