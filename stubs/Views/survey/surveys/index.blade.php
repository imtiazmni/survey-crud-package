@extends('survey.layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Survey List</h2>

    <a href="/survey/create"
       class="btn btn-primary">
        Add Survey
    </a>

</div>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

        @foreach($surveys as $survey)

        <tr>

            <td>{{ $survey->id }}</td>

            <td>{{ $survey->title }}</td>

            <td>
                {{ $survey->status ? 'Active' : 'Inactive' }}
            </td>

            <td>

                <a href="/survey/{{ $survey->id }}/edit"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>
                <form
                    action="/survey/{{ $survey->id }}"
                    method="POST"
                    style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Delete Survey?')">

                        Delete

                    </button>

                </form>


            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection