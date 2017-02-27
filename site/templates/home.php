<?php
namespace DS;
use DS\Components as cmp;

print(

  div(['data-pw-id' => 'content'],
    cmp\container(
      h1(['class' => 'yellow fw3 ttu'], 'Hello.').

      img(['src' => $urls->assets.'files/1059/dan-freeman.jpg', 'title' => 'Dan Freeman']).

      cmp\aspect_ratio('16x9',
        cmp\media('https://www.youtube.com/watch?v=APiSNBkyD5Y')
      )
    )
  )

);