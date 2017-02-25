<?php
define('CONTENT',
  $h1('Hello').

  $h2('Hello 2').

  $img(['class' => 'w5', 'src' => $urls->assets.'files/1059/dan-freeman.jpg', 'title' => 'Dan Freeman']).

  $comment('Hello!')

  // $div(['class' => 'aspect-ratio aspect-ratio--16x9'],
  //   $div(['class' => 'aspect-ratio--object'],
  //     $media('https://vimeo.com/147170777')
  //   )
  // )
);

include '_main.php';