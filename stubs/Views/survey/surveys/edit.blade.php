@extends('survey.layouts.app')

@section('content')

<h2>Edit Survey</h2>

<form method="POST"
      action="/survey/{{ $survey->id }}">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Title</label>

        <input
            type="text"
            name="title"
            value="{{ $survey->title }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Description</label>

        <textarea
            name="description"
            class="form-control">{{ $survey->description }}</textarea>

    </div>

    <button class="btn btn-primary">
        Update Survey
    </button>

</form>

@endsection