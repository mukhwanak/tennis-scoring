<?php

namespace App\Http\Controllers;

use App\Http\Services\ResultsFinal;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function index()
    {

        return Inertia::render('Results/Index');
    }

    public function create()
    {
        return Inertia::render('Results/Create');
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'player1' => 'required|integer',
            'player2' => 'required|integer',
        ],
            [
                'player1.integer' => 'Score has to be a number',
                'player2.integer' => 'Score has to be a number',
            ]);

//        dd($attributes);
        $fina_results = (new ResultsFinal())->expectedResults($attributes);

        dd($fina_results);


//        return back()->with(['results' => $score]);
    }

}
