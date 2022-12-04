<?php

require_once __DIR__ . '/Rucksack.php';

class RucksackFactory
{
    /**
     * @param string[] $rucksacks
     * @return Rucksack[]
     */
    public static function createFromRucksacks(array $rucksacks): array
    {
        $createdRucksacks = [];

        foreach ($rucksacks as $rucksack) {
            $createdRucksacks []= self::createFromRucksack($rucksack);
        }

        return $createdRucksacks;
    }

    private static function createFromRucksack(string $rucksack): Rucksack
    {
        [$firstCompartment, $secondCompartment] = str_split($rucksack, strlen($rucksack) / 2);

        return new Rucksack($firstCompartment, $secondCompartment);
    }
}