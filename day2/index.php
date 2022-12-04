<?php

require_once __DIR__ . '/RockPaperScissorGame.php';

$content = file_get_contents(__DIR__ . '/input.txt');

$rounds = array_filter(explode("\n", $content));
array_walk($rounds, function (string $shapes, int $index) use (&$rounds) {
    [$opponentShape, $playerOutcome] = explode(' ', $shapes);
    if (null === $playerOutcome) {
        return;
    }
    $rounds[$index] = ['opponentShape' => $opponentShape, 'playerOutcome' => $playerOutcome];
});

echo (new RockPaperScissorGame($rounds))->processGame();