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