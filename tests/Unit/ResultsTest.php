<?php

/**
 * User: Kennedy Mukhwana Maikuma Lingo
 * Date: 06/05/2022
 * Time: 15:11
 */

namespace Tests\Unit;

use function Pest\Laravel\get;
use function Pest\Laravel\json;

use App\Http\Services\ResultsFinal;

test('it has a home page', function () {
    get('/')->assertStatus(200);
});

test('It hits the post endpoint', function() {
    json('POST', '/results', ['player1' => 2, 'player2' => 3])->assertStatus(302);
});

test('Ensures that the Only Numbers are input', function() {
    json('POST', '/results', ['player1' => 2, 'player2' => 'frgdg'])->assertInvalid(['player2' => "Score has to be a number"]);
});


test('Expected Results', function ($scoresArray, $outcome) {
    $tennisScore = (new ResultsFinal())->expectedResults($scoresArray);
    expect($tennisScore)->toBe($outcome);
})->with([
    [['player1' => 0, 'player2' => 0], 'Love All'],
    [['player1' => 8, 'player2' => 6], 'Player 1 wins'],
    [['player1' => 1, 'player2' => 0], 'Fifteen : Love'],
    [['player1' => 1, 'player2' => 1], 'Fifteen All'],
    [['player1' => 2, 'player2' => 0], 'Thirty : Love'],
    [['player1' => 2, 'player2' => 2], 'Thirty All'],
    [['player1' => 3, 'player2' => 0], 'Forty : Love'],
    [['player1' => 3, 'player2' => 3], 'Deuce'],
    [['player1' => 3, 'player2' => 4], 'Advantage: Player 2'],
    [['player1' => 4, 'player2' => 3], 'Advantage: Player 1'],
    [['player1' => 4, 'player2' => 4], 'Deuce'],
    [['player1' => 5, 'player2' => 5], 'Deuce'],
    [['player1' => 10, 'player2' => 8], 'Player 1 wins'],
    [['player1' => 6, 'player2' => 8], 'Player 2 wins'],
]);
