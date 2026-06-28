@extends("layouts.projects")

@section("title", "Tutti i progetti")

@section("content")

   <a href="{{ route("projects.create") }}" class="btn btn-outline-primary mt-3">Aggiungi un progetto</a>

<table class="table w-75 my-3">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Cliente</th>
            <th>Anno</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project )
        <tr>
            <td>{{ ucfirst($project->name) }}</td>
            <td>{{$project->client}}</td>
            <td>{{$project->year}}</td>
            <td><a href={{ route("projects.show",$project)}} class="btn btn-outline-primary">Visualizza</a></td>
            <td><a href={{ route("projects.edit",$project)}} class="btn btn-outline-warning">Modifica</a></td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $project->id }}">
                    Elimina
                </button>
                <x-modal :project="$project" />
            </td>
        </tr>
        @endforeach
    </tbody>
</table>




@endsection
