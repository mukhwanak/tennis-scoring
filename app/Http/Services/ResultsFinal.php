<?php
/**
 * User: Kennedy Mukhwana Maikuma Lingo
 * Date: 06/05/2022
 * Time: 13:21
 */

namespace App\Http\Services;

use App\Traits\ReadablesPointsStrings;

class ResultsFinal
{
    use ReadablesPointsStrings;

    protected int $player1;
    protected int $player2;

    public function expectedResults(array $scores): string
    {

        $this->player1 = $scores['player1'];
        $this->player2 = $scores['player2'];

        //If at least three points have been scored by both players, and the score is equal, then the score is
        if ($this->player1 >= 3 && $this->player2 >= 3 && $this->sameResults()) {
            return 'Deuce';
        }

        //Check player as won or if one player is less than 3 point to avoid the error of displaying the number instead of the points string

        if (($this->player1 >= 4 && $this->player2 >= 4 && abs($this->player1 - $this->player2) >= 2)||(($this->player2 < 3 ||$this->player1 < 3 ))) {
            return $this->isLead() . ' wins';
        }

        //If at least three points have been scored by both players but one player has one more point than the other, then the score for the player ahead is "Advantage".
        if ($this->player1 >= 3 && $this->player2 >= 3 && $this->player1 !== $this->player2) {
            return 'Advantage: ' . $this->isLead();
        }

        return $this->arePlayersLessThree() && ($this->sameResults())
            ? $this->pointsStrings($this->player1) . ' All' // If both players have the same score below three points ("Forty") then the score is suffixed with "All" (Example: "Thirty All").
            : $this->pointsStrings($this->player1) . ' : ' . $this->pointsStrings($this->player2);

    }

    /**
     * Check of players have the same results
     * @return bool
     */
    private function sameResults(): bool
    {
        return $this->player1 === $this->player2;
    }

    //Get the playeer that its ahead
    private function isLead(): string
    {
        return $this->player1 > $this->player2 ? 'Player 1' : 'Player 2';
    }

    /**
     * Check if Players have Less than 3 points
     * @return bool
     */
    private function arePlayersLessThree(): bool
    {
        return ($this->player1 < 3 && $this->player2 < 3);
    }




}
