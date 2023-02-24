<?php

function get_scheme($html) {
  $pattern = '/<([a-z]+)\s+[^>]*(sc-[a-z]+)[^>]*>/i';
  preg_match_all($pattern, $html, $matches);
  return array_unique($matches[2]);
}

// Test Cases
$html1 = '<i sc-root>Hello</i>';
$schemes1 = get_scheme($html1);
print_r($schemes1); // Output: Array([0] => "root")

$html2 = '<div><div sc-rootbear title="Oh My">Hello <i sc-org>World</i></div></div>';
$schemes2 = get_scheme($html2);
print_r($schemes2); // Output: Array([0] => "rootbear", [1] => "org")