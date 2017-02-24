<?php
/**
 * A block-level link element that can contain other content.
 *
 * @param string $content         HTML or Text content.
 * @param string $link_settings   Link settings: url/new_tab, section, email/subject, tel
 * @param string $class           CSS classnames.
 * @param string $id              HTML identifier.
 * @param array  $attributes      HTML attributes.
 *
 * @return string Rendered HTML of the component.
 */

$link_block = function(string $content = '', array $link_settings = [], string $class = '', string $id = '', array $attributes = []) use ($text_link)
{
  $class .= ' dib';

  return $text_link($content, $link_settings, $class, $id, $attributes);
};