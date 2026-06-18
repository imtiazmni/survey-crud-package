@extends('survey.layouts.app')

@section('content')

<h2>Create Survey</h2>

<form method="POST" action="/survey">

    @csrf

    <div class="mb-3">

        <label>Title</label>

        <input
            type="text"
            name="title"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Description</label>

        <textarea
            name="description"
            class="form-control"></textarea>

    </div>

    <button class="btn btn-success">
        Save Survey
    </button>

</form>

@endsection