<?php
/**
 * Text Links are pieces of text that your site visitors can
 * click to go to another website, scroll to another section
 * of your page, send an email, or call a phone number.
 *
 * @param string  $content          HTML or Text content.
 * @param string  $link_settings    Link settings: url/new_tab, section, email/subject, tel
 * @param array   $attributes       HTML attributes.
 * @param array   $component        Component name.
 *
 * @return string Rendered HTML of the component.
 */

$text_link = function(string $content = '', array $link_settings = [], array $attributes = [], string $component = 'text_link') use ($element)
{
  if (array_key_exists('url', $link_settings)) {
    $attributes['href'] = $link_settings['url'];

    if (array_key_exists('new_tab', $link_settings) && $link_settings['new_tab'] === true) {
      $attributes['rel'] = 'noopener noreferrer'; // See https://www.jitbit.com/alexblog/256-targetblank---the-most-underestimated-vulnerability-ever/
      $attributes['target'] = '_blank';
    }
  } elseif (array_key_exists('section', $link_settings)) {
    if (strpos($link_settings['section'], '#') === 0) {
      trigger_error('Section name does not need the # symbol because the link block provides it for you. Please remove it.', E_USER_ERROR);
    }
    $attributes['href'] = "#{$link_settings['section']}";
  } elseif (array_key_exists('email', $link_settings) && array_key_exists('subject', $link_settings)) {
    $attributes['href'] = "mailto:{$link_settings['email']}?subject={$link_settings['subject']}";
  } elseif (array_key_exists('phone', $link_settings)) {
    $attributes['href'] = "tel:{$link_settings['phone']}";
  }

  return $element('a', $content, $attributes, $component);
};