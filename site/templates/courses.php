<?php
namespace DS;
use DS\Components as cmp;

// Data
$featured_products = $pages->get('template=featured-products')->products;
$disciplines = $pages->find('template=discipline, sort=sort');

// Functions
function locations($item)
{
  return \DS\span(['class'=>'dib lh-title mb3'],
    rtrim($item->prices->each(function($price) {
      return '{location.abbreviation} / ';
    }), ' /'));
}

print(

  div(['class'=>'pb4', 'data-pw-id'=>'content'],
    h1(['class'=>'b--gray bb f1 lh-title mb3 mb4-l mh3 mh4-ns mt5 pb2'], $page->title).

    // Featured Products
    ($featured_products === false ? '' :
      ol(['class'=>'list ma0 nowrap overflow-scrolling-touch overflow-x-auto pb4 ph3 ph4-ns'],
        $featured_products->each(function($featured_product) use ($featured_products, $urls) {
          $locations = locations($featured_product);

          return
            li(['class'=>'dib w-90 w-60-m w-third-l '.($featured_product === $featured_products->last() ? '' : 'mr3')],
              a(['class'=>'link white', 'href'=>'{url}'],
                h5(['class'=>'ds-yellow f7 fw3 lh-title mb1 tracked ttu'], $featured_product->product_type->title).
                h2(['class'=>'f3-ns f4 fw4 lh-title mb1 mt0 truncate w-100'], '{title}').
                h6(['class'=>'f3-ns f4 fw4 gray lh-title mb2 mt0'], $locations).
                cmp\aspect_ratio(div(['class'=>'bg-gray h-100']))
              )
            );
        })
      )
    ).

    // Disciplines
    ($disciplines === false ? '' :
      $disciplines->each(function($item) use ($pages) {
        $programs = $pages->find("template=product, product_type>0, disciplines*={$item->title}, sort=product_type, sort=sort");

        return
          header(['class'=>'mb2 mh3 mh4-ns pv3'],
            div(['class'=>'b--gray bb dt dt--fixed pb2'],
              div(['class'=>'dtc pr3 w2'],
                div(['class'=>'bg-white black br-100 h2 pa2 w2'],
                  svg_image("title={$item->related_image->title}")
                )
              ).
              h2(['class'=>'dtc f3-ns f4 fw7 mt0 pl2 v-mid'], '{title}').
              div(['class'=>'dtc tr v-mid w3'],
                a(['class'=>'ds-yellow link', 'href'=>$item->url, 'title'=>'See all {title} courses'], 'See All')
              )
            )
          ).
          // Programs/Courses
          ol(['class'=>'list ma0 mb3 nowrap overflow-scrolling-touch overflow-x-auto pb2 ph3 ph4-ns'],
          ($programs === false ? '' :
            $programs->each(function($program) use ($programs) {
              $locations = locations($program);

              return
                li(['class'=>'dib w5 '.($program === $programs->last() ? '' : 'mr3')],
                  a(['class'=>'link white', 'href'=>$program->url],
                    cmp\aspect_ratio(
                      div(['class'=>'bg-gray grow h-100'])
                    ).
                    h3(['class'=>'f6 fw4 mb1 mt2 lh-title truncate w-100'], $program->title).
                    h6(['class'=>'f6 fw4 gray lh-title mb0 mt0'], $locations)
                  )
                );
            })
          ));
      })
    )
  )

);