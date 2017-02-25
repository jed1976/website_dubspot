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
    $list_item('Joe', ['class' => 'mb3']).
    $list_item('Content', ['class' => 'mb3']).
    $list_item()
  ).


  $input('name').
  $input('password', 'Enter your password', 'password').
  $input('email').

  $text_area('Hello! And welcome!', 'message', 'Type your message.', true).

  $checkbox('CheckIt', 'I agree to these terms', true, true).

  $radio_button('radio', 'food', 'Food', false, true).
  $radio_button('radio', 'programming', 'Programming')


  // $element('div',
  //   $element('div',
  //     $map('AIzaSyBLp93l6U1QBpEbHEHEK4ACYIGLEMmG7DQ'),
  //   ['class' => 'aspect-ratio--object']),
  // ['class' => 'aspect-ratio aspect-ratio--16x9'])



  #$media('http://www.viddler.com/v/6f2fd7dc')
  #$media('https://soundcloud.com/thetimeripper/its-ok')

  // $element('div',
  //   $element('div',
  //     $element('div',
  //       $media('https://vimeo.com/147170777'),
  //     ['class' => 'aspect-ratio--object']),
  //   ['class' => 'aspect-ratio aspect-ratio--16x9']),
  // ['class' => 'w-50']).

  // $image($urls->assets.'files/1059/dan-freeman.jpg', true, 'Dan Freeman').
  // $image('http://be2.php.net/images/logos/php-logo.svg', true, 'Dan Freeman').
  // $image('https://i1.sndcdn.com/avatars-000004652340-2h8t1y-t500x500.jpg')
);

include "partials/foot.php";
