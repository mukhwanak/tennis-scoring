<?php
/**
 * User: Kennedy Mukhwana Maikuma Lingo
 * Date: 06/05/2022
 * Time: 13:57
 */

namespace App\Traits;

trait ReadablesPointsStrings
{
    public function pointsStrings(int $score): string{
        return $this->pointsAssigned()[$score]?? $score;
    }

    //Assign readable string based on the points scored
    private function pointsAssigned(): array
    {
        return [
            0 => 'Love',
            1 => 'Fifteen',
            2 => 'Thirty',
            3 => 'Forty',
        ];
    }
}
