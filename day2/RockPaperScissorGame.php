<?php

class RockPaperScissorGame
{
    private const PLAYER_SHOULD_LOOSE_SHAPE = 'X';
    private const PLAYER_SHOULD_DRAW_SHAPE = 'Y';
    private const PLAYER_SHOULD_WIN_SHAPE = 'Z';
    private const OPPONENT_ROCK_SHAPE = 'A';
    private const OPPONENT_PAPER_SHAPE = 'B';
    private const OPPONENT_SCISSOR_SHAPE = 'C';

    /**
     * @param array{opponentShape: string, playerOutcome: string}[] $rounds
     */
    public function __construct(private readonly array $rounds)
    {
    }

    /**
     * Process every round and return score
     * 
     * @return int
     */
    public function processGame(): int
    {
        $score = 0;
        foreach ($this->rounds as $shapes) {
            $score+= $this->getShapeScore($shapes['playerOutcome'], $shapes['opponentShape'])
                + $this->getOutcomeScore($shapes['playerOutcome']);
        }

        return $score;
    }

    private function getShapeScore(string $playerOutcome, string $opponentShape): int
    {
        return match (true) {
            $this->shouldPlayRock($playerOutcome, $opponentShape) => 1,
            $this->shouldPlayPaper($playerOutcome, $opponentShape) => 2,
            $this->shouldPlayScissor($playerOutcome, $opponentShape) => 3,
        };
    }

    private function getOutcomeScore(string $playerOutcome): int
    {
        return match($playerOutcome) {
            self::PLAYER_SHOULD_WIN_SHAPE => 6,
            self::PLAYER_SHOULD_LOOSE_SHAPE => 0,
            self::PLAYER_SHOULD_DRAW_SHAPE => 3,
        };
    }

    private function shouldPlayRock(string $playerOutcome, string $opponentShape): bool
    {
        return (self::PLAYER_SHOULD_LOOSE_SHAPE === $playerOutcome && self::OPPONENT_PAPER_SHAPE === $opponentShape)
            || (self::PLAYER_SHOULD_DRAW_SHAPE === $playerOutcome && self::OPPONENT_ROCK_SHAPE === $opponentShape)
            || (self::PLAYER_SHOULD_WIN_SHAPE === $playerOutcome && self::OPPONENT_SCISSOR_SHAPE === $opponentShape);
    }

    private function shouldPlayPaper(string $playerOutcome, string $opponentShape): bool
    {
        return (self::PLAYER_SHOULD_LOOSE_SHAPE === $playerOutcome && self::OPPONENT_SCISSOR_SHAPE === $opponentShape)
            || (self::PLAYER_SHOULD_DRAW_SHAPE === $playerOutcome && self::OPPONENT_PAPER_SHAPE === $opponentShape)
            || (self::PLAYER_SHOULD_WIN_SHAPE === $playerOutcome && self::OPPONENT_ROCK_SHAPE === $opponentShape);
    }

    private function shouldPlayScissor(string $playerOutcome, string $opponentShape): bool
    {
        return (self::PLAYER_SHOULD_LOOSE_SHAPE === $playerOutcome && self::OPPONENT_ROCK_SHAPE === $opponentShape)
            || (self::PLAYER_SHOULD_DRAW_SHAPE === $playerOutcome && self::OPPONENT_SCISSOR_SHAPE === $opponentShape)
            || (self::PLAYER_SHOULD_WIN_SHAPE === $playerOutcome && self::OPPONENT_PAPER_SHAPE === $opponentShape);
    }
}