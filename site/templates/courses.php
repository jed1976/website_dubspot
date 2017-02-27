<?php
namespace DS;
use DS\Components as cmp;

// Data
$combination_programs = $pages->find('template=product, product_type=1, sort=sort');

print(

  div(['data-pw-id'=>'content'],
    h1(['class'=>'b--gray bb f1 lh-title mb4 mh3 mh4-ns mt3 mt4-ns pb3'], $page->title).

    // Combination Programs
    ($combination_programs === false ? '' :
      ol(['class'=>'list ma0 nowrap overflow-scrolling-touch overflow-x-auto pb4 ph3 ph4-ns'],
        $combination_programs->each(function($item) use ($combination_programs) {
          return
            li(['class'=>'dib w-90 w-60-m w-33-l '.($item === $combination_programs->last() ? '' : 'mr3')],
              a(['class'=>'link white', 'href'=>'{url}'],
                h4(['class'=>'ds-yellow f7 fw3 lh-title mb1 tracked ttu'], 'Combination Program').
                h2(['class'=>'f4 fw4 lh-title mb1 mt0 truncate w-100'], '{title}').
                h3(['class'=>'f4 fw4 gray lh-title mb3 mt0'], 'NYC / LA').
                cmp\aspect_ratio(div(['class' => 'bg-gray h-100']))
              )
            );
        })
      )
    )

  )

);