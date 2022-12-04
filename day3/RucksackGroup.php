<?php

require_once __DIR__ . '/Rucksack.php';

class RucksackGroup
{
    /**
     * @var string[]
     */
    private readonly array $rucksacks;

    public function __construct(array $rucksacks)
    {
        $this->rucksacks = $rucksacks;
    }

    public function getGroupBadgePriority(): int
    {
        $badge = current(
            array_intersect(...array_map(fn (string $rucksack) => str_split($rucksack), $this->rucksacks)),
        );
        if (!$badge) {
            return 0;
        }

        return (new ReflectionEnum(ItemPriorities::class))->getCase($badge)->getValue()->value;
    }
}