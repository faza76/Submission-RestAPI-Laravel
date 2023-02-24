<?php

function pattern_count($text, $pattern) {
  if (strlen($pattern) == 0) {
    return 0;
  }

  $count = 0;
  $len = strlen($text) - strlen($pattern) + 1;

  for ($i = 0; $i < $len; $i++) {
    $j = 0;
    while ($j < strlen($pattern) && $text[$i + $j] == $pattern[$j]) {
      $j++;
    }
    if ($j == strlen($pattern)) {
      $count++;
    }
  }

  return $count;
}

// Test Cases
$text1 = "palindrom";
$pattern1 = "ind";
echo pattern_count($text1, $pattern1); // Output: 1

$text2 = "abakadabra";
$pattern2 = "ab";
echo pattern_count($text2, $pattern2); // Output: 2

$text3 = "hello";
$pattern3 = "";
echo pattern_count($text3, $pattern3); // Output: 0

$text4 = "ababab";
$pattern4 = "aba";
echo pattern_count($text4, $pattern4); // Output: 2

$text5 = "aaaaaa";
$pattern5 = "aa";
echo pattern_count($text5, $pattern5); // Output: 5

$text6 = "hell";
$pattern6 = "hello";
echo pattern_count($text6, $pattern6); // Output: 0