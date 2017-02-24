<?php
/**
 * A Video element lets you embed a video hosted on a
 * third-party site (such as YouTube or Vimeo) via its URL.
 *
 * @param string  $url          Video URL.
 * @param array   $attributes   HTML attributes.
 * @param array   $component    Component name.
 *
 * @return string Rendered HTML of the component.
 */

$video = function(string $url, array $attributes = [], string $component = 'video') use ($element)
{
  // YouTube/Vimeo Parsing Code: https://github.com/ryancramerdesign/TextformatterVideoEmbed/blob/master/TextformatterVideoEmbed.module

  // Viddler

  // Vimeo
  if (strpos($url, '://vimeo.com/')) {
    if (!preg_match_all('#\s*(https?://vimeo.com/(\d+)).*?#', $url, $matches)) return;
    $source = "http://player.vimeo.com/video/{$matches[2][0]}?autoplay=0&byline=0&title=0";
  }

  // YouTube
	if (strpos($url, '://www.youtube.com/watch')
    || strpos($url, '://www.youtube.com/v/')
    || strpos($url, '://youtu.be/')) {
      $regex = '#\s*(https?://(?:www\.)?youtu(?:.be|be.com)+/(?:watch/?\?v=|v/)?([^\s&<\'"]+))(&[-_,.=&;a-zA-Z0-9]*)?.*?#';
	    if (!preg_match_all($regex, $url, $matches)) return;
      $source = "https://www.youtube.com/embed/{$matches[2][0]}?autoplay=0&fs=1&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0";
  }

  return $element('div',
    $element('iframe', '', [
      'allowFullScreen'       => '',
      'class'                 => 'aspect-ratio--object',
      'frameborder'           => 0,
      'mozallowfullscreen'    => '',
      'src'                   => $source,
      'webkitAllowFullScreen' => ''
    ]), ['class' => 'aspect-ratio aspect-ratio--16x9'], $component);
};