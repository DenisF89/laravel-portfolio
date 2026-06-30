@extends("layouts.projects")

@section("title", "Tutti i progetti")

@section("content")

<div class="d-flex align-items-center gap-2 mt-3">
   <a href="{{ route("projects.create") }}" class="btn btn-outline-primary">Aggiungi un progetto</a>

   <form class="d-flex" action="{{ route("projects.index") }}" method="GET" >
        <div class="input-group">
            <select class="form-select d-inline" name="type_id" id="type_id">
                <option value="" selected>Tutte le tipologie</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ request("type_id") == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            <input type="submit" class="btn btn-outline-primary d-inline" value="Filtra" />
        </div>
    </form>
</div>

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
                <x-modal :data="$project" prefix="projects" />
            </td>
        </tr>
        @endforeach
    </tbody>
</table>




@endsection
