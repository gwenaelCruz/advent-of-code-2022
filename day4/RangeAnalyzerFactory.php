<?php

require_once __DIR__ . '/RangeAnalyzer.php';

class RangeAnalyzerFactory
{
    /**
     * @param string[] $pairs Pairs are number ranges delimited by a comma. ex: 1-3,4-6
     * @return RangeAnalyzer[]
     */
    public static function createFromPairs(array $pairs): array
    {
        $createdAnalyzers = [];

        foreach ($pairs as $pair) {
            $createdAnalyzers []= self::createFromPair($pair);
        }

        return $createdAnalyzers;
    }

    private static function createFromPair(string $pair): RangeAnalyzer
    {
        [$firstPair, $secondPair] = explode(',', $pair);

        return new RangeAnalyzer($firstPair, $secondPair);
    }
}