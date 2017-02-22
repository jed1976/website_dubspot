<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="<?= $settings->twitter_account_id ?>" property="twitter:account_id" >
    <meta content="<?= $settings->revisit_after_period ?>" name="revisit-after">
    <meta content="Copyright <?= date('Y') ?> Dubspot, DS14, Inc. All logos and trademarks are property of their respective owners." name="copyright">

    <!-- SEO Meta -->
    <title><?= $title ?></title>
    <meta content="<?= $description ?>" name="description">
    <link href="<?= $page->httpUrl ?>" rel="canonical">

    <!-- Open Graph Data -->
    <meta property="og:title" content="<?= $open_graph_title ?>">
    <meta name="og:url" content="<?= $page->httpUrl ?>">
    <meta name="og:type" content="website">
    <meta property="og:description" content="<?= $open_graph_description ?>">
    <? if ($page->open_graph_image): ?><meta property="og:image" content="<?= $page->open_graph_image->url ?>"><? endif ?>

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= $open_graph_title ?>">
    <meta name="twitter:description" content="<?= $open_graph_description ?>">
    <meta name="twitter:url" content="<?= $page->httpUrl ?>">
    <? if ($page->open_graph_image): ?><meta property="twitter:image" content="<?= $page->open_graph_image->url ?>"><? endif ?>

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
    <link href="<?= $urls->templates ?>styles/tachyons.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="<?= $settings->favicon->url ?>" rel="icon">
    <link href="<?= $settings->webclip->url ?>" rel="apple-touch-icon">
  </head>
  <body class="bg-black helvetica white">
    <nav>
      <a class="dib fixed right-1 right-2-ns top-1 top-2-ns w3 white z-999" href="/"><?= ds_svg('title=Dubspot Circle') ?></a>
    </nav>

    <main class="mv5">