<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function hedgingCalculator()
    {
        return view('admin.calculator.hedging');
    }

    public function layBetCalculator()
    {
        return view('admin.calculator.lay_bet');
    }

    public function bettingCalculator()
    {
        return view('admin.calculator.betting');
    }
}
