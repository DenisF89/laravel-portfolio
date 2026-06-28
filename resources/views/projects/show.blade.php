@extends("layouts.projects")

@section("title", Str::upper($project->name))

@section("content")


    <div class="mb-4">
        <img src="{{ Vite::asset('resources/img/'.$project->image) }}" alt="{{ $project->image }}">
        <h3>{{$project->client}}</h3>
        <small>{{$project->year}}</small>
        <p>{{$project->description}}</p>
    </div>

    <div class="py-4">
        <a class="btn btn-outline-warning" href="{{ route("projects.edit", $project) }}">Modifica</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Elimina
        </button>

    </div>

    <x-modal :project="$project" />

@endsection
