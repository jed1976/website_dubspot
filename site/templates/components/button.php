<?php
/**
 * Buttons are pre-styled Link Blocks that your site visitors
 * can click to go to another website, scroll to a different
 * section of your page, send an email, or call a phone number.
 *
 * You can change the text, style, and link destination of a Button,
 * but you can't add any other content elements to them.
 *
 * @param string  $content          HTML or Text content.
 * @param string  $link_settings    Link settings: url/new_tab, section, email/subject, tel
 * @param array   $attributes       HTML attributes.
 * @param array   $component        Component name.
 *
 * @return string Rendered HTML of the component.
 */

$button = function(string $content = 'Button Text', array $link_settings = [], array $attributes = [], string $component = 'button') use ($link_block)
{
  $classes = ['class' => ' bg-blue link ph3 pv2 pointer white'];
  $attributes = array_merge($classes, $attributes);

  return $link_block($content, $link_settings, $attributes, $component);
};