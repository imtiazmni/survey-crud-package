@extends('survey.layouts.app')

@section('content')

<h1 class="mb-4">
    Survey Dashboard
</h1>

<div class="card">
    <div class="card-body">

        <h3>
            Total Surveys
        </h3>

        <h1>
            {{ $totalSurveys }}
        </h1>

    </div>
</div>

@endsection