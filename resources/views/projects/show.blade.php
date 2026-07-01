@extends("layouts.projects")

@section("title")


@if ($previousProject)
<a  href="{{ route('projects.show', $previousProject) }}"
    class="btn btn-outline-secondary rounded-circle d-inline-flex align-items-center justify-content-center"
    style="width: 1.3rem; height: 1.8rem;">
    <i class="bi bi-arrow-left fs-5"></i>
</a>
@endif

     {{ Str::upper($project->name) }}

@if ($nextProject)
<a href="{{ route("projects.show", $nextProject) }}"
    class="btn btn-outline-secondary rounded-circle d-inline-flex align-items-center justify-content-center"
    style="width: 1.3rem; height: 1.8rem;">
    <i class="bi bi-arrow-right fs-5"></i>
</a>
@endif


@endsection

@section("content")


    <div class="mb-4">
        <img class="img-fluid w-50 my-3" src="{{ Vite::asset('resources/img/'.$project->image) }}" alt="{{ $project->image }}">

        <h3>{{$project->client}}</h3>

        <div>
            <small>{{$project->year}}</small>
            <span class="badge bg-secondary">{{ $project->type?->name ?? '' }}</span>
        </div>

        <div>
            @forelse ($project->technologies as $tec )
                <span class="badge" style="background-color: {{ $tec->color }}">{{ $tec->name }}</span>
            @empty
                <small class="text-muted">Nessuna tecnologia associata</small>
            @endforelse
        </div>

        <p>{{$project->description}}</p>
    </div>

    <div class="py-4">
        <a class="btn btn-outline-warning" href="{{ route("projects.edit", $project) }}">Modifica</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $project->id }}">
            Elimina
        </button>


        <a class="btn btn-outline-primary" href="{{ route("projects.index") }}">Torna alla lista</a>


    </div>

    <x-modal :data="$project" prefix="projects" />

@endsection
