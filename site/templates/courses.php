<? include "partials/head.php" ?>
<?
$combination_programs = $pages->find('template=combination-program, sort=sort');
?>

<h1 class="b--gray bb f1 lh-title mb0 mh3 mh4-ns pb2 pb3-ns"><?= $page->title ?></h1>

<? if ($combination_programs): ?>
<!--<h2 class="b f3 mb3 mh3 mh4-ns">Combination Programs</h2>-->

<ol class="list ma0 nowrap overflow-x-auto ph3 ph4-ns touch-scroll">
  <? foreach ($combination_programs as $key => $item): ?>
  <li class="dib w-100 w-60-m w-33-l <? if ($key != $combination_programs->count - 1): ?> mr3<? endif ?>">
    <a class="link white" href="<?= $item->url ?>">
      <h3 class="ds-yellow f6 fw4 mb0 tracked ttu">Combination Program</h3>
      <h2 class="b f4 f3-l mv3 ws-normal"><?= $item->title ?></h2>
      <div class="bg-gray h5"></div>
    </a>
  </li>
  <? endforeach ?>
</ol>
<? endif ?>

<? include "partials/foot.php" ?>