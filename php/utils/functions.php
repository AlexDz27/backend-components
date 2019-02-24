<?php

function stringContainsString($string, $substring) {
  return strpos($string, $substring) !== false ? true: false;
}

function removeTrailingSlash($string) {
  $explodedString = explode('/', $string);
  if (empty(end($explodedString))) {
    array_pop($explodedString);
  }

  return end($explodedString);
}

