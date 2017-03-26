<?php
namespace DS;
use DS\Components as cmp;

$body = str_replace('EMAIL', $session->get('email'), $page->body);

print(
  div(['data-pw-id' => 'content'],
    div(['class' => 'dt min-vh-100 v-mid w-100'],
      div(['class' => 'dtc tc v-mid'],
        div(['class' => 'center mw6-ns nt2 ph0-ns ph3'],
          div(['class' => 'center ds-yellow w4'],
            svg_image_selector('template=image, name=Glasses')
          ).
          div(['class' => 'f5 mt4'], $body)
        )
      )
    )
  )
);
