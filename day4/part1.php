<?php

require_once __DIR__ . '/RangeAnalyzerFactory.php';

$content = file_get_contents(__DIR__ . '/input.txt');

$pairs = array_filter(explode("\n", $content));

$totalOverlappingPairs = 0;

foreach (RangeAnalyzerFactory::createFromPairs($pairs) as $rangeAnalyzer) {
    $totalOverlappingPairs += $rangeAnalyzer->doesOnePairFullyContainsOther() ? 1 : 0;
}

echo $totalOverlappingPairs;