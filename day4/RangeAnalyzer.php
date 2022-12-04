<?php

class RangeAnalyzer
{
    public function __construct(private readonly string $firstPair, private readonly string $secondPair)
    {
    }

    public function doesOnePairFullyContainsOther(): bool
    {
        [$firstPairRange, $secondPairRange] = $this->getPairRanges();

        return $this->checkPairRanges($firstPairRange, $secondPairRange)
            || $this->checkPairRanges($secondPairRange, $firstPairRange);
    }

    public function doPairsOverlap(): bool
    {
        [$firstPairRange, $secondPairRange] = $this->getPairRanges();

        return 0 < count(array_intersect($firstPairRange, $secondPairRange));
    }

    /**
     * @return int[][]
     */
    public function getPairRanges(): array
    {
        [$firstPairStart, $firstPairEnd] = explode('-', $this->firstPair);
        [$secondPairStart, $secondPairEnd] = explode('-', $this->secondPair);

        return [
            range($firstPairStart, $firstPairEnd),
            range($secondPairStart, $secondPairEnd),
        ];
    }

    /**
     * @param int[] $containerRange
     * @param int[] $rangeToCheck
     * @return bool
     */
    private function checkPairRanges(array $containerRange, array $rangeToCheck): bool
    {
        $matchingNumbers = array_intersect($containerRange, $rangeToCheck);

        return count($matchingNumbers) === count($rangeToCheck);
    }
}