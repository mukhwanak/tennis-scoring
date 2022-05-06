<?php

namespace App\Http\Controllers;

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
        ]);

        dd($attributes);

//        User::create($attributes);

//        return back()->with(['results' => $score]);
    }

}
