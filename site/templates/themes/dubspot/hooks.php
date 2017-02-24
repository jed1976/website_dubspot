<?php
function hook_heading($attributes)
{
  unset($attributes['class']['lh-title']);
  $attributes['class'][] = 'lh-copy';
  $attributes['class'][] = 'bg-red';

  return $attributes;
};

function hook_button($attributes)
{
  unset($attributes['class']['bg-blue']);
  unset($attributes['class']['white']);

  $attributes['class'][] = 'bg-yellow';
  $attributes['class'][] = 'black';

  return $attributes;
};

function hook_paragraph($attributes)
{
  $attributes['class'][] = 'bg-blue pa3';

  return $attributes;
};
