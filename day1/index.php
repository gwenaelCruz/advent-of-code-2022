<?php

$content = file_get_contents(__DIR__ . '/input.txt', true);

$rows = explode("\n", $content);
$batches = [];
$tempCalories = 0;

foreach ($rows as $row) {
    if (0 === strlen($row)) {
        $batches[]= $tempCalories;
        $tempCalories = 0;

        continue;
    }
    $tempCalories += (int) $row;
}

arsort($batches);
$batches = array_values($batches);

$total = 0;

for ($maxCounts = 0; $maxCounts < 3; $maxCounts++) {
    $total+= $batches[$maxCounts];
}

echo $total;