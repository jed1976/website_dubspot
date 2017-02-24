<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="copyright" content="Copyright <?= date('Y') ?> Dubspot, DS14, Inc. All logos and trademarks are property of their respective owners.">
    <meta name="revisit-after" content="<?= $settings->revisit_after_period ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta -->
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?= $open_graph_title ?>">
    <meta itemprop="description" content="<?= $open_graph_description ?>">
    <? if ($page->open_graph_image): ?><meta itemprop="image" content="<?= $page->open_graph_image->url ?>"><? endif ?>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@Dubspot">
    <meta name="twitter:title" content="<?= $open_graph_title ?>">
    <meta name="twitter:description" content="<?= $open_graph_description ?>">
    <meta name="twitter:url" content="<?= $page->httpUrl ?>">
    <? if ($page->open_graph_image): ?><meta property="twitter:image" content="<?= $page->open_graph_image->url ?>"><? endif ?>
    <meta property="twitter:account_id" content="<?= $settings->twitter_account_id ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?= $open_graph_title ?>">
    <meta property="og:url" content="<?= $page->httpUrl ?>">
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?= $open_graph_description ?>">
    <meta property="og:site_name" content="<?= $settings->website_name ?>">
    <? if ($page->open_graph_image): ?><meta property="og:image" content="<?= $page->open_graph_image->url ?>"><? endif ?>

    <? if ($config->debug == false): ?>
    <!-- Google Analytics -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?= $settings->google_analytics_id ?>', '<?= $config->httpHost ?>');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');
    </script>
    <? endif ?>

    <!-- Styles -->
    <link href="<?= $urls->templates ?>styles/main.css" rel="stylesheet">
    <link href="<?= $urls->templates ?>styles/tachyons/css/tachyons.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="shortcut icon" href="<?= $settings->favicon->url ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= $settings->webclip->url ?>">

    <!-- Links -->
    <link rel="canonical" href="<?= $page->httpUrl ?>">
  </head>
  <body class="helvetica">
    <nav>
      <a class="dib fixed right-1 right-2-ns top-1 top-2-ns w3 white z-999" href="/"><?= ds_svg('title=Dubspot Circle') ?></a>
    </nav>

    <main role="main">