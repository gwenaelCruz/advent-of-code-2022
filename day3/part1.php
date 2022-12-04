<?php

require_once __DIR__ . '/RucksackFactory.php';

$content = file_get_contents(__DIR__ . '/input.txt');

$rucksacks = array_filter(explode("\n", $content));

$totalPriorities = 0;

foreach (RucksackFactory::createFromRucksacks($rucksacks) as $rucksack) {
    $totalPriorities += $rucksack->getDuplicateItemPriority();
}

echo $totalPriorities;