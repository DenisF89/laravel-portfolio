@extends("layouts.projects")

@section("title", Str::upper($project->name))

@section("content")

        <img src="{{ Vite::asset('resources/img/'.$project->image) }}" alt="{{ $project->image }}">
        <h3>{{$project->client}}</h3>
        <small>{{$project->year}}</small>
        <p>{{$project->description}}</p>

@endsection
