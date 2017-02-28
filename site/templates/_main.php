<?php namespace DS;

// Data
$seo_title              = $page->meta_title ? $page->meta_title : $page->title;
$seo_meta_description   = $page->meta_description ? $page->meta_description : '';
$open_graph_title       = $page->open_graph_title && !$page->open_graph_title_same ? $page->open_graph_title : $seo_title;
$open_graph_description = $page->open_graph_description && !$page->open_graph_description_same ? $page->open_graph_description : $seo_meta_description;

$locations    = $pages->find('template=location, street_address!=""');
$admissions   = $pages->get('template=email, title=Admissions');
$copyright    = '&copy; '.date('Y').' '.$locations[0]->title;
$social_links = $pages->find('template=social-link, sort=sort');

print(

    doctype().
    html(['lang'=>'en'],
      head(['data-pw-id'=>'html-head'],

        // Meta
        meta(['charset'=>'utf-8']).
        meta(['name'=>'copyright', 'content'=>str_replace('{YEAR}', date('Y'), $settings->copyright)]).
        meta(['name'=>'revisit-after', 'content'=>$settings->revisit_after_period]).
        meta(['name'=>'viewport', 'content'=>'width=device-width, initial-scale=1']).

        // SEO Meta
        title($seo_title).
        meta(['name'=>'description', 'content'=>$seo_meta_description]).

        // Schema.org markup for Google+
        meta(['itemprop'=>'name', 'content'=>$open_graph_title]).
        meta(['itemprop'=>'description', 'content'=>$open_graph_description]).
        (! empty($page->open_graph_image) ? meta(['itemprop'=>'image', 'content'=>$page->open_graph_image->url]) : '').

        // Twitter Data card
        meta(['name'=>'twitter:card', 'content'=>'summary']).
        meta(['name'=>'twitter:site', 'content'=>'@Dubspot']).
        meta(['name'=>'twitter:title', 'content'=>$open_graph_title]).
        meta(['name'=>'twitter:description', 'content'=>$open_graph_description]).
        meta(['name'=>'twitter:url', 'content'=>$page->httpUrl]).
        (! empty($page->open_graph_image) ? meta(['name'=>'twitter:image', 'content'=>$page->open_graph_image->url])  : '').
        meta(['property'=>'twitter:acount_id', 'content'=>$settings->twitter_account_id]).

        // Open Graph data
        meta(['property'=>'og:title', 'content'=>$open_graph_title]).
        meta(['property'=>'og:url', 'content'=>$page->httpUrl]).
        meta(['property'=>'og:type', 'content'=>'website']).
        meta(['property'=>'og:description', 'content'=>$open_graph_description]).
        meta(['property'=>'og:site_name', 'content'=>$settings->website_name]).
        (! empty($page->open_graph_image) ? meta(['property'=>'og:image', 'content'=>$page->open_graph_image->url])  : '').

        // Google Analytics
        ($config->debug == false ? script($settings->google_analytics_code) : '').

        // Styles
        link(['href'=>$urls->templates.'styles/main.css', 'rel'=>'stylesheet']).
        link(['href'=>$urls->templates.'styles/tachyons/css/tachyons.min.css', 'rel'=>'stylesheet']).
        style(['id'=>'style-block']).

        // Icons
        link(['rel'=>'shortcut icon', 'href'=>$settings->favicon->url, 'type'=>'image/x-icon']).
        link(['rel'=>'apple-touch-icon', 'href'=>$settings->webclip->url]).

        // Links
        link(['rel'=>'canonical', 'href'=>$page->httpUrl])
      ).
      body(['class'=>'bg-black helvetica white', 'data-pw-id'=>'html-body'],
        nav(
          a(['class'=>'dib fixed right-1 right-2-ns top-1 top-2-ns w3 white z-999', 'href'=>'/'],
            svg_image('title=Dubspot Circle')
          )
        ).

        main(['data-pw-id'=>'content', 'role'=>'main']).

        footer(['class'=>'bg-white-10 pa3 pa4-l'],
          div(['class'=>'cf mb4-l'],
            h6(['class'=>'f6 fw4 fl gray pv0 mb4 tracked ttu w-100'], 'Locations').
            $locations->each(function($location) {
              return
                article(['class'=>'dib-ns fl mb4 mr4-m mr5-l pr0-ns pr2 w-auto-ns w-50'],
                  h4(['class'=>'f4-l f5 fw6'], $location->abbreviation).
                  span(['class'=>'db f6-l f7 lh-copy'], $location->street_address).
                  span(['class'=>'db f6-l f7 lh-copy'], "{$location->city}, {$location->state->value} $location->zip_code").
                  a(['class'=>'db dim ds-yellow f6 fw6 link pv3', 'href'=>"tel:+{$location->phone_number}", 'title'=>''], "+{$location->phone_number}")
                );
            })
          ).
          section(['class'=>'cf mb5'],
            div(['class'=>'fr mb0-ns mb4 w-50-l w-100'],
              a(['class'=>'dib dim ds-yellow f2-ns f3 fw6 link mb0-l mb4 mt2 pv3 tl', 'href'=>"mailto:{$admissions->email}"], "{$admissions->email}")
            ).
            div(['class'=>'fl mb0-ns mb4 w-50-l w-100'],
              p(['class'=>'f6 fw4 gray lh-copy mb2 measure mt0'], 'Subscribe to our newsletter for the latest music courses, events and current school updates.').
              input(['class'=>'bg-black bn border-box br0 f5 input-reset mw-100 pa3 w-100 w5-ns white', 'placeholder'=>'Email Address']).
              input(['class'=>'bg-ds-yellow black bn br0 f5 input-reset ph4 pointer pv2 pv3-ns w-100 w-auto-ns', 'type'=>'submit', 'value'=>'Sign Up'])
            )
          ).
          div(['class'=>'dt dt--fixed w-100'],
            div(['class'=>'db dtc-ns pb3 pb0-ns tc tl-ns v-mid2'],
              $social_links->each(function($social_link) {
                return
                  a(['class'=>'dib dim gray h2 link mh2 v-mid w2', 'href'=>$social_link->url_address, 'title'=>"Visit our {$social_link->title} page."],
                    span(['class'=>'di v-btm lh-copy'], svg_image("title={$social_link->title}"))
                  );
              })
            ).
            div(['class'=>'db dtc-ns tc tr-ns v-mid'],
              p(['class'=>'dib f6 gray mb3 pr3'], $copyright)
            )
          )
        ).

        // Scripts
        script(['src'=>$urls->templates.'scripts/blazy/blazy.min.js']).
        script(['src'=>$urls->templates.'scripts/main.js']).
        script(['id'=>'script-block'])
      )
    )

);