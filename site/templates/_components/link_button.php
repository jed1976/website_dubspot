<?php namespace DS\Components;

/**
 * A Link Button is just what it says on the tin.
 *
 * @param string  $text     HTML or Text content.
 * @param string  $url      URL.
 * @param string  $class    CSS class.
 * @param string  $title    Title attribute.
 *
 * @return string Rendered HTML of the component.
 */

function link_button($text = '', $url = '', $class = '', $title = '')
{
  return
    \DS\a([
    'class' => "b--ds-yellow ba bg-ds-yellow black f5-ns f6 fw7 dib dim link mv2 overflow-hidden ph4 pointer pv2 pv3 tc ttu {$class}",
    'href'  => $url,
    'title' => $title
    ], $text);
};