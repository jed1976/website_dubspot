<?php
/**
 * A block-level link element that can contain other content.
 *
 * @param string  $content          HTML or Text content.
 * @param string  $link_settings    Link settings: url/new_tab, section, email/subject, tel
 * @param array   $attributes       HTML attributes.
 * @param array   $component        Component name.
 *
 * @return string Rendered HTML of the component.
 */

$link_block = function(string $content = '', array $link_settings = [], array $attributes = [], string $component = 'link_block') use ($text_link)
{
  $classes = ['class' => ' dib'];
  $attributes = array_merge($classes, $attributes);

  return $text_link($content, $link_settings, $attributes, $component);
};