<?php
namespace DS;
use DS\Components as cmp;

print(
  div(['data-pw-id' => 'content'],
    div(['class' => 'bg-ds-yellow black dt min-vh-100 w-100'],
      div(['class' => 'dtc tc v-mid'],
        h1(['class' => 'f1 fw7'], $page->title)
      )
    )
  )
);