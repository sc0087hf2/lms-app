<?php

function truncate($string, $length = 10)
{
  return mb_strlen($string) > $length ? mb_substr($string, 0, $length) . '...' : $string;
}
