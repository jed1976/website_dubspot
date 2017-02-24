<?
include "partials/head.php";

echo $container(
  $link_block('apple.com', ['url' => 'apple.com' , 'new_tab' => true]).
  $text_link('Google', ['url' => 'google.com']).
  $button('Hello!', ['section' => 'intro']).
  $heading('Heading 1').
  $heading('Heading 2', 2).
  $heading('Heading 3', 3).
  $heading('Heading 4', 4).
  $heading('Heading 5', 5).
  $heading('Heading 6', 6).
  $paragraph().
  $text_block().
  $block_quote().
  $list(
    $list_item('Item', ['class' => 'mb3']).
    $list_item('Content', ['class' => 'mb3']).
    $list_item()
  )

  #$image($urls->assets.'files/1059/dan-freeman.jpg', true, 'Dan Freeman').
  #$image('http://be2.php.net/images/logos/php-logo.svg', true, 'Dan Freeman').
  #$image('https://i1.sndcdn.com/avatars-000004652340-2h8t1y-t500x500.jpg').
  #$video('https://youtu.be/Ssu9PE20RvE').
  #$video('https://vimeo.com/147170777')
);

include "partials/foot.php";
