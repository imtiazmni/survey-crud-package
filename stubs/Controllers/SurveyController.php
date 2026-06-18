<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::latest()->get();

        return view('survey.surveys.index', compact('surveys'));
    }

    public function create()
    {
        return view('survey.surveys.create');
    }

    public function store(Request $request)
    {
        Survey::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 1
        ]);

        return redirect('/survey');
    }

    public function edit($id)
    {
        $survey = Survey::findOrFail($id);

        return view(
            'survey.surveys.edit',
            compact('survey')
        );
    }

    public function update(Request $request, $id)
    {
        $survey = Survey::findOrFail($id);

        $survey->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('/survey');
    }

    public function destroy($id)
    {
        Survey::destroy($id);

        return redirect('/survey');
    }
}