<?php
namespace DS;
use DS\Components as cmp;

// Functions
function locations($item)
{
  return \DS\span(['class'=>'dib lh-title'],
    rtrim($item->prices->each(function($price) {
      return '{location.abbreviation} / ';
    }), ' /'));
}

function product_video_url($page)
{
  if ($page->video_url != '') return $page->video_url;
  if ($page->disciplines->first->video_url != '') return $page->disciplines->first->video_url;
  return '';
}

print(
  div(['data-pw-id'=>'content'],
    article(
      div(['class'=>'relative vh-100'],
        div(['class'=>'cover h-100','style'=>"background: linear-gradient(-55deg, #99cd3f 20%, #fff35f 50%, #fff35f 50%, #6bbdf0 80%), url({$page->image->url}) center center no-repeat; background-blend-mode: multiply;"]).
        #cmp\background_image($page->image ? $page->image->width(1500)->url : '').

        header(['class'=>'absolute bg-black bottom-3 mb4 mb0-m pa3 pa4-ns left-0 program-title z-99'],
          h1(['class'=>'ds-yellow f2-l f3 fw7 lh-title ma0 mb1'], $page->title)
          #h5(['class'=>'f3-ns f4 fw4 ma0'], locations($page))
        )
      )
    ).
    div(['class'=>'center mw8 ph4 ph5-m pv5'],
      ($page->summary === false ? '' :
        div(['class'=>'b--ds-gray bb ds-gray f3-l f4 fw4 mb4 pb5'],
          $page->summary.
          (product_video_url($page) === '' ? '' :
            cmp\aspect_ratio(
              cmp\media(product_video_url($page))
            )
          )
        )
      ).
      div(['class'=>'cf'],
        div(['class'=>'fl pr3-ns w-50-l'], $page->body).
        div(['class'=>'fl w-50-l'], '')
      )
    )
  )
);