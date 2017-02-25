<?=
$doctype().
$html(['lang' => 'en'],
  $head(
    // Meta
    $meta(['charset' => 'utf-8']).
    $meta(['name' => 'copyright', 'content' => str_replace('{YEAR}', date('Y'), $settings->copyright)]).
    $meta(['name' => 'revisit-after', 'content' => $settings->revisit_after_period]).
    $meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']).

    // SEO Meta
    $title($page->title).
    $meta(['name' => 'description', 'content' => $page->meta_description]).

    // Schema.org markup for Google+
    $meta(['itemprop' => 'name', 'content' => $open_graph_title]).
    $meta(['itemprop' => 'description', 'content' => $open_graph_description]).
    (! empty($page->open_graph_image) ? $meta(['itemprop' => 'image', 'content' => $page->open_graph_image->url]) : '').

    // Twitter Data card
    $meta(['name' => 'twitter:card', 'content' => 'summary']).
    $meta(['name' => 'twitter:site', 'content' => '@Dubspot']).
    $meta(['name' => 'twitter:title', 'content' => $open_graph_title]).
    $meta(['name' => 'twitter:description', 'content' => $open_graph_description]).
    $meta(['name' => 'twitter:url', 'content' => $page->httpUrl]).
    (! empty($page->open_graph_image) ? $meta(['name' => 'twitter:image', 'content' => $page->open_graph_image->url])  : '').
    $meta(['property' => 'twitter:acount_id', 'content' => $settings->twitter_account_id]).

    // Open Graph data
    $meta(['property' => 'og:title', 'content' => $open_graph_title]).
    $meta(['property' => 'og:url', 'content' => $page->httpUrl]).
    $meta(['property' => 'og:type', 'content' => 'website']).
    $meta(['property' => 'og:description', 'content' => $open_graph_description]).
    $meta(['property' => 'og:site_name', 'content' => $settings->website_name]).
    (! empty($page->open_graph_image) ? $meta(['property' => 'og:image', 'content' => $page->open_graph_image->url])  : '').

    // Google Analytics
    ($config->debug == false ? $script($settings->google_analytics_code) : '').

    // Styles
    $link(['href' => $urls->templates.'styles/main.css', 'rel' => 'stylesheet']).
    $link(['href' => $urls->templates.'styles/tachyons/css/tachyons.min.css', 'rel' => 'stylesheet']).

    // Icons
    $link(['rel' => 'shortcut icon', 'href' => $settings->favicon->url, 'type' => 'image/x-icon']).
    $link(['rel' => 'apple-touch-icon', 'href' => $settings->webclip->url]).

    // Links
    $link(['rel' => 'canonical', 'href' => $page->httpUrl])
  ).
  $body(['class' => 'helvetica'],
    $nav(
      $a(['class' => 'dib fixed right-1 right-2-ns top-1 top-2-ns w3 white z-999'], ds_svg('title=Dubspot Circle'))
    ).

    $main(['role' => 'main'],
        CONTENT
    ).

    // Scripts
    $script(['src' => $urls->templates.'scripts/main.js'])
  )
);