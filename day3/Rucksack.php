<?php

require_once __DIR__ . '/ItemPriorities.php';

class Rucksack
{
    public function __construct(private readonly string $firstCompartment, private readonly string $secondCompartment)
    {
    }

    public function getDuplicateItemPriority(): int
    {
        $duplicateItem = $this->getDuplicateItem();
        if (!$duplicateItem) {
            return 0;
        }
        return (new ReflectionEnum(ItemPriorities::class))->getCase($duplicateItem)->getValue()->value;
    }

    private function getDuplicateItem(): ?string
    {
        return current(
            array_intersect(
                str_split($this->firstCompartment),
                str_split($this->secondCompartment),
            )
        ) ?: null;
    }
}