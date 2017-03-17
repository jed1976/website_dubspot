<?php
namespace DS;
use DS\Components as cmp;

// Data
$featured_products = $pages->get('template=featured-products')->products;
$combination_programs = $pages->find('template=product, product_type=1, sort=sort');
$disciplines = $pages->find('template=discipline, sort=sort');
$dubspot_logo = $pages->get('template=image, title=Dubspot');

// Functions
function locations($item)
{
  return \DS\span(['class'=>'dib lh-title mb3'],
    rtrim($item->prices->each(function($price) {
      return '{location.abbreviation} / ';
    }), ' /'));
}

function image_block_for_product(\ProcessWire\Page $product, \ProcessWire\Page $watermark, int $size = 600)
{
  return
    div([
      'class'=>'bg-ds-gray grow-large h-100',
      'style'=>"background-image: url({$watermark->image->url}); background-position: center center; background-repeat: no-repeat; background-size: 50% 50%;"
      ],
      ($product->image ? cmp\background_image($product->image->width($size)->url) : '')
    );
}

print(

  div(['data-pw-id'=>'content'],
    h1(['class'=>'f1 lh-title ma0 mb2 mh3 mh4-l pb5 pt3'], $page->title).

   cmp\promotion().

   h2(['class'=>'f4-ns f5 fw7 ds-gray ma0 mb2 mh3 mh4-l'], 'Combination Programs').

   // Combination Program
    ($combination_programs === false ? '' :
      ol(['class'=>'list ma0 mb4 nowrap overflow-scrolling-touch overflow-x-auto pb4 ph3 ph4-l pt2'],
        $combination_programs->each(function($combination_program) use ($combination_programs, $dubspot_logo, $urls) {
          $locations = locations($combination_program);

          return
            li(['class'=>'dib w-90 w-60-m w-30-l '.($combination_program === $combination_programs->last() ? '' : 'mr3')],
              a(['class'=>'link white', 'href'=>'{url}'],
                h2(['class'=>'ds-yellow f3-l f4 fw7 lh-title ma0 mb1 truncate w-100'], '{title}').
                h5(['class'=>'f4-l f5 fw4 lh-title mb2 mt0'], $locations).
                div(['class'=>'overflow-hidden'],
                  cmp\aspect_ratio(
                    image_block_for_product($combination_program, $dubspot_logo)
                  )
                )
              )
            );
        })
      )
    ).

    h2(['class'=>'f4-ns f5 fw7 ds-gray mb2 mh3 mh4-l'], 'Programs / Courses / Workshops').

    // Disciplines
    ($disciplines === false ? '' :
      $disciplines->each(function($item) use ($dubspot_logo, $pages) {
        $programs = $pages->find("template=product, product_type>1, disciplines*={$item->title}, prices.count>0, sort=product_type, sort=sort");

        return
          header(['class'=>'mb2 mh3 mh4-l pv3'],
            div(['class'=>'b--ds-gray bb dt dt--fixed pb3'],
              div(['class'=>'dtc pr3 w2'],
                div(['class'=>'bg-white black br-100 h2 pa2 w2'],
                  svg_image_selector("title={$item->related_image->title}")
                )
              ).
              h2(['class'=>'dtc f3-ns f4 fw7 mt0 pl2 v-mid'], '{title}').
              div(['class'=>'dtc tr v-mid w3'],
                a(['class'=>'fw7 link text-link', 'href'=>$item->url, 'title'=>'See all {title} courses'], 'See All')
              )
            )
          ).
          // Programs/Courses
          ol(['class'=>'list ma0 mb3 nowrap overflow-scrolling-touch overflow-x-auto pb2 ph3 ph4-l'],
          ($programs === false ? '' :
            $programs->each(function($program) use ($dubspot_logo, $programs) {
              $locations = locations($program);

              return
                li(['class'=>'dib w-25-l w-two-thirds w-50-m '.($program === $programs->last() ? '' : 'mr3')],
                  a(['class'=>'link white', 'href'=>$program->url],
                    div(['class'=>'overflow-hidden'],
                      cmp\aspect_ratio(
                        image_block_for_product($program, $dubspot_logo)
                      )
                    ).
                    h3(['class'=>'f6 fw7 mb1 mt2 lh-title truncate w-100'], $program->title).
                    h6(['class'=>'f6 fw4 ds-gray lh-title mb0 mt0'], $locations)
                  )
                );
            })
          ));
      })
    )
  )

);