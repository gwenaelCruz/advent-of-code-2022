<?php

require_once __DIR__ . '/RucksackGroup.php';

$content = file_get_contents(__DIR__ . '/input.txt');

$rucksacks = array_filter(explode("\n", $content));

$totalPriorities = 0;
$group = [];

foreach ($rucksacks as $rucksack) {
    $group []= $rucksack;
    $groupLength = count($group);
    if (0 !== $groupLength && 0 === $groupLength % 3) {
        $totalPriorities += (new RucksackGroup($group))->getGroupBadgePriority();
        $group = [];
    }
}

echo $totalPriorities;