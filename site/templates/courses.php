<?php
namespace DS;
use DS\Components as cmp;

// Data
$featured_products = $pages->get('template=featured-products')->products;
$combination_programs = $pages->find('template=product, product_type=1, sort=sort');
$disciplines = $pages->find('template=discipline, sort=sort');

// Functions
function locations($item)
{
  return \DS\span(['class'=>'dib lh-title mb3'],
    rtrim($item->prices->each(function($price) {
      return '{location.abbreviation} / ';
    }), ' /'));
}

function image_block_for_product(\ProcessWire\Page $product, int $size = 600)
{
  return
    div(['class'=>'cover bg-ds-gray grow-large h-100'],
      cmp\background_image($product->image->width($size)->url, 'bottom')
    );
}

print(

  div(['data-pw-id'=>'content'],
    h1(['class'=>'f1 lh-title ma0 mb2 mh3 mh4-l pb5 pt3'], $page->title).

   #cmp\promotion().

   h2(['class'=>'f4-ns f5 fw7 ds-gray ma0 mb2 mh3 mh4-l'], 'Combination Programs').

   // Combination Program
    ($combination_programs === false ? '' :
      ol(['class'=>'list ma0 mb4 nowrap overflow-scrolling-touch overflow-x-auto pb4 ph3 ph4-l pt2'],
        $combination_programs->each(function($combination_program) use ($combination_programs, $urls) {
          $image      = cmp\aspect_ratio($combination_program->image == true ? image_block_for_product($combination_program) : div(['class'=>'bg-ds-gray h-100']));
          $locations  = locations($combination_program);

          return
            li(['class'=>'dib w-90 w-60-m w-30-l '.($combination_program === $combination_programs->last() ? '' : 'mr3')],
              a(['class'=>'link white', 'href'=>'{url}'],
                h2(['class'=>'ds-yellow f3-l f4 fw7 lh-title ma0 mb1 truncate w-100'], '{title}').
                h5(['class'=>'f4-l f5 fw3 lh-title mb2 mt0'], $locations).
                div(['class'=>'overflow-hidden'], $image)
              )
            );
        })
      )
    ).

    // // Featured Products
    // ($featured_products === false ? '' :
    //   ol(['class'=>'list ma0 nowrap overflow-scrolling-touch overflow-x-auto pb4 ph3 ph4-l'],
    //     $featured_products->each(function($featured_product) use ($featured_products, $urls) {
    //       $image = $featured_product->image == true ? image_block_for_product($featured_product) : div(['class'=>'bg-ds-gray h-100']);
    //       $locations  = locations($featured_product);

    //       return
    //         li(['class'=>'dib w-90 w-60-m w-30-l '.($featured_product === $featured_products->last() ? '' : 'mr3')],
    //           a(['class'=>'link white', 'href'=>'{url}'],
    //             h5(['class'=>'f7 fw4 ds-gray lh-title mb1 tracked ttu'], $featured_product->product_type->title).
    //             h2(['class'=>'ds-yellow f3-l f4 fw7 lh-title mb1 mt0 truncate w-100'], '{title}').
    //             h6(['class'=>'f4-l f5 fw3 lh-title mb2 mt0'], $locations).
    //             div(['class'=>'overflow-hidden'], $image)
    //           )
    //         );
    //     })
    //   )
    // ).

    h2(['class'=>'f4-ns f5 fw7 ds-gray mb2 mh3 mh4-l'], 'Programs / Courses / Workshops').

    // Disciplines
    ($disciplines === false ? '' :
      $disciplines->each(function($item) use ($pages) {
        $programs = $pages->find("template=product, product_type>1, disciplines*={$item->title}, prices.count>0, sort=product_type, sort=sort");

        return
          header(['class'=>'mb2 mh3 mh4-l pv3'],
            div(['class'=>'b--ds-gray bb dt dt--fixed pb3'],
              div(['class'=>'dtc pr3 w2'],
                div(['class'=>'bg-white black br-100 h2 pa2 w2'],
                  svg_image("title={$item->related_image->title}")
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
            $programs->each(function($program) use ($programs) {
              $image = cmp\aspect_ratio($program->image == true ? image_block_for_product($program) : div(['class'=>'bg-ds-gray h-100']));
              $locations = locations($program);

              return
                li(['class'=>'dib w-25-l w-two-thirds w-50-m '.($program === $programs->last() ? '' : 'mr3')],
                  a(['class'=>'link white', 'href'=>$program->url],
                    div(['class'=>'overflow-hidden'], $image).
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