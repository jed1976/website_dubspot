<?php
namespace DS;
use DS\Components as cmp;

$signout_url = $pages->get('template=script, name=signout')->url;

print(
  div(['data-pw-id' => 'content'],
    div(['class' => 'dt min-vh-100 w-100'],
      div(['class' => 'dtc tc v-mid'],
        h1($page->title).
        a(['class' => 'ds-yellow text-link', 'href' => $signout_url], 'Sign Out')
      )
    )
  )
);
