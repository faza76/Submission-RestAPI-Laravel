<?php

function sum_deep($tree, $char) {
    $queue = [];
    $level = 0;
    $sum = 0;

    array_push($queue, [$tree, $level]);

    while (!empty($queue)) {
        list($node, $level) = array_shift($queue);

        if (is_string($node) && strpos($node, $char) !== false) {
            $sum += $level;
        } elseif (is_array($node)) {
            foreach ($node as $child) {
                array_push($queue, [$child, $level + 1]);
            }
        }
    }

    return $sum;
}

// Test Cases
$tree = ["AB", ["XY"], ["YP"]];
$char = 'Y';
echo sum_deep($tree, $char).PHP_EOL;  // Output: 4

$tree = ["", ["", ["XXXXX"]]];
$char = 'X';
echo sum_deep($tree, $char).PHP_EOL;;  // Output: 3

$tree = ["X"];
$char = 'X';
echo sum_deep($tree, $char).PHP_EOL;;  // Output: 1

$tree = [""];
$char = 'X';
echo sum_deep($tree, $char).PHP_EOL;;  // Output: 0

$tree = ["X", ["", ["", ["Y"], ["X"]]], ["X", ["", ["Y"], ["Z"]]]];
$char = 'X';
echo sum_deep($tree, $char).PHP_EOL;;  // Output: 7

$tree = ["X", [""], ["X"], ["X"], ["Y", [""],], ["X"]];
$char = 'X';
echo sum_deep($tree, $char).PHP_EOL;;  // Output: 7