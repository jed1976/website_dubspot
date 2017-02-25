<?php

function hook_h1(array $attributes)
{
  return array_merge($attributes, ['bg-blue', 'f1', 'mb4', 'white']);
}