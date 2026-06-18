<?php

namespace App\Http\Controllers;

use App\Models\Survey;

class DashboardController extends Controller
{
    public function index()
    {
        return view('survey.dashboard', [
            'totalSurveys' => Survey::count(),
            'activeSurveys' => Survey::where('status',1)->count(),
            'inactiveSurveys' => Survey::where('status',0)->count(),
        ]);
    }
}